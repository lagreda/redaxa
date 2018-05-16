<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\Student;
use App\AcademicHistory;
use App\WorkHistory;

class StudentEvelyn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:studentevelyn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload students data from excel file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = public_path()."/excel/StudentEvelyn.xlsx";

        if(is_file($file)) //verify file existence
        {
            $excel = App::make('excel');
            $excel->load($file, function($reader)
            {
                $elements = $reader->toArray();
                $bar = $this->output->createProgressBar(count($elements));

                foreach($elements as $element) 
                {
                    //prepare data
                    $program = $element['program_group'];
                    $program = explode(" ", $program);
                    $textual_program = $program[0];
                    $program_id = "";
                    if($textual_program == "EMAE")
                        $program_id = "2";
                    if($textual_program == "MAE")
                        $program_id = "9";
                    if($textual_program == "MAS")
                        $program_id = "143";
                    if($textual_program == "METRI")
                        $program_id = "157";
                    if($textual_program == "MGH")
                        $program_id = "14";
                    if($textual_program == "MGP")
                        $program_id = "14";
                    $program_group = $program[1];

                    $gender_id = "";
                    $gender = $element['gender'];
                    if($gender == "Masculino")
                        $gender_id = "1";
                    if($gender == "Femenino")
                        $gender_id = "2";
                    
                    $src_name = $element['name'];
                    $src_name = explode(" ", $src_name);
                    $n1 = isset($src_name[0]) ? $src_name[0] : '';
                    $n2 = isset($src_name[1]) ? $src_name[1] : '';
                    $n3 = isset($src_name[2]) ? $src_name[2] : '';
                    $n4 = isset($src_name[3]) ? $src_name[3] : '';

                    $surname = $n1." ".$n2;
                    $name = $n3." ".$n4;

                    $srcbirthdate = $element['birth_date'];
                    $srcbirthdate = explode("/", $srcbirthdate);
                    $birthdate = "";
                    if(count($srcbirthdate) == 3)
                    {
                        $year = $srcbirthdate[2];
                        $month = $srcbirthdate[0];
                        $day = $srcbirthdate[1];
                        if($month <= 12)
                            $birthdate = $year."-".$month."-".$day;
                    }
                    
                    $student = new Student;
                    $student->legal_id = $element['legal_id'];
                    $student->program_group = $program_group;
                    $student->name = $name;
                    $student->surname = $surname;
                    $student->main_email = $element['main_email'];
                    $student->mobile_number = $element['mobile_number'];
                    if($gender_id != '')
                        $student->gender_id = $gender_id;
                    $student->home_number = $element['home_number'];
                    $student->work_number = $element['work_number'];
                    if($birthdate != '' && $birthdate != '--')
                        $student->birth_date = $birthdate;
                    $student->home_address_1 = $element['home_address_1'];
                    $student->program_id = $program_id;
                    $student->country_id_birth = $element['country_id_birth'];
                    $student->country_id_residence = $element['country_id_residence'];
                    $student->ec_city_id_birth = $element['ec_city_id_birth'];
                    $student->ec_city_id_residence = $element['ec_city_id_residence'];
                    $student->external_token = md5(uniqid(rand(), true));
                    $student->save();

                    //store academic history
                    if($element['pregrade'] != '') 
                    {
                        $ah = new AcademicHistory();
                        $ah->title = $element['pregrade'];
                        if($element['university'] != '')
                            $ah->institution = $element['university'];
                        $ah->academic_level_id = 2;
                        $ah->student_id = $student->id;
                        $ah->save();
                    }

                    //store working history
                    if($element['company'])
                    {
                        $wh = new WorkHistory();
                        $wh->company = $element['company'];
                        $wh->student_id = $student->id;
                        $wh->save();
                    }

                    $bar->advance();
                }

                $bar->finish();
            });
        }
        else
            $this->info('Error: there is no StudentEvelyn.xlsx file.');
    }
}
