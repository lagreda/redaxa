<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\Student;

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
    protected $description = 'Upload program data from excel file';

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
                    $student = new Student;
                    $student->legal_id = $element['legal_id'];
                    $student->program_group = $element['program_group'];
                    $student->name = $element['name'];
                    $student->surname = $element['surname'];
                    $student->main_email = $element['main_email'];
                    $student->program_id = $element['program_id'];
                    $student->save();
                    $bar->advance();
                }

                $bar->finish();
            });
        }
        else
            $this->info('Error: there is no Student.xlsx file.');
    }
}
