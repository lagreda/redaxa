<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\Student;
use App\AcademicHistory;
use App\WorkHistory;

class StudentX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:student';

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
        $file = public_path()."/excel/Student.xlsx";
        
        if(is_file($file)) //verify file existence
        {
            $excel = App::make('excel');
            $excel->load($file, function($reader) {
                $elements = $reader->toArray();
                $bar = $this->output->createProgressBar(count($elements));
                
                foreach($elements as $element) 
                {
                    if($element['legal_id'] == '' || $element['program_group'] == '' || $element['program_id'] == '')
                        continue;

                    // skip some records
                    if(
                        ($element['program_id'] == '2' && $element['program_group'] > 10) ||
                        ($element['program_id'] == '9' && $element['program_group'] > 24) ||
                        ($element['program_id'] == '143') ||
                        false
                    )
                    continue;

                    $student = new Student;
                    $student->legal_id = $element['legal_id'];
                    $student->program_group = $element['program_group'];
                    $student->name = $element['name'];
                    $student->surname = $element['surname'];
                    $student->main_email = $element['main_email'];
                    $student->mobile_number = $element['mobile_number'];
                    $student->gender_id = $element['gender'];
                    $student->home_number = $element['home_number'];
                    $student->work_number = $element['work_number'];
                    if($element['birth_date'] != '' && $element['birth_date'] != '--')
                        $student->birth_date = $element['birth_date'];
                    $student->home_address_1 = $element['home_address_1'];
                    $student->program_id = $element['program_id'];
                    $student->country_id_birth = $element['country_id_birth'];
                    $student->country_id_residence = $element['country_id_residence'];
                    $student->ec_city_id_birth = $element['ec_city_id_birth'];
                    $student->ec_city_id_residence = $element['ec_city_id_residence'];
                    $student->external_token = md5(uniqid(rand(), true));
                    $student->save();

                    //store academic history
                    if($element['pregrade_ok'] != '') 
                    {
                        $ah = new AcademicHistory();
                        $ah->title = $element['pregrade_ok'];
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
            $this->info('Error: there is no Student.xlsx file.');
    }
}
