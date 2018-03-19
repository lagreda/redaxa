<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class StudentsFormatter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'formatter:students';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Format students file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function romanToArabic($roman)
    {
        $romans = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        );
        
        //$roman = 'MMMCMXCIX';
        $result = 0;
        
        foreach ($romans as $key => $value) {
            while (strpos($roman, $key) === 0) {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }
        return $result;
    }

    public function formattDate($input_date)
    {
        $output_date = "";

        $input_date = explode('/', $input_date);
        if(count($input_date) == 1)
            $input_date = explode('-', $input_date[0]);

        $year = "";
        $month = "";
        $day = "";
        if(count($input_date) > 1)
        {
            if(strlen($input_date[0]) == 4)
            {
                $year = $input_date[0];
                $day = $input_date[2];
            }
            else
            {
                $year = $input_date[2];
                $day = $input_date[0];
            }
            $month = $input_date[1];
        }
        
        $output_date = $year."-".$month."-".$day;

        return $output_date;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        $file_name = public_path()."/excel/Student.xlsx";

        if(is_file($file_name)) //verify file existence
        {
            $new_data = array();
            $excel = App::make('excel');
            $excel->load($file_name, function($file) use(&$new_data) {
                $elements = $file->toArray();
                $bar = $this->output->createProgressBar(count($elements));

                foreach($elements as $row_item)
                {
                    //edit here data
                    $row = array();
                    //legal_id
                    $row['legal_id'] = substr($row_item['legal_id'], 1);
                    //program_group
                    $program_group = substr($row_item['program_group'], 1);
                    $program_group = $this->romanToArabic($program_group);
                    $row['program_group'] = $program_group;
                    //name
                    $row['name'] = substr($row_item['name'], 1);
                    //surname
                    $row['surname'] = substr($row_item['surname'], 1);
                    //main_email
                    $row['main_email'] = substr($row_item['main_email'], 1);
                    //mobile_number
                    $row['mobile_number'] = substr($row_item['mobile_number'], 1);
                    //home_number
                    $row['home_number'] = substr($row_item['home_number'], 1);
                    //work_number
                    $row['work_number'] = substr($row_item['work_number'], 1);
                    //birth_date
                    $birth_date = substr($row_item['birth_date'], 1);
                    $birth_date = $this->formattDate($birth_date);
                    $row['birth_date'] = $birth_date;
                    //home_address_1
                    $row['home_address_1'] = substr($row_item['home_address_1'], 1);                    
                    //program
                    $row['program'] = substr($row_item['program_id'], 1);
                    //country_id_birth
                    $row['country_id_birth'] = substr($row_item['country_id_birth'], 1);
                    //country_id_residence
                    $row['country_id_residence'] = substr($row_item['country_id_residence'], 1);
                    //ec_city_id_birth
                    $row['ec_city_id_birth'] = substr($row_item['ec_city_id_birth'], 1);
                    //ec_city_id_residence
                    $row['ec_city_id_residence'] = substr($row_item['ec_city_id_residence'], 1);
                    //pregrade
                    $row['pregrade'] = substr($row_item['pregrade'], 1);
                    //university
                    $row['university'] = substr($row_item['university'], 1);
                    //company
                    $row['company'] = substr($row_item['company'], 1);
                    $new_data[] = $row;
                    $bar->advance();
                }

                $bar->finish();
            });

            $excel = App::make('excel');
            $excel->create('Curado', function($file) use($new_data) {
                $file->sheet('data', function($sheet) use($new_data) {
                    $sheet->fromArray($new_data);
                });
            })->store('xlsx');
        }
        else
            $this->info('Error: there is no Student.xlsx file.');
    }
}
