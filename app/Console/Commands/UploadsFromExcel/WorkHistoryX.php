<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\WorkHistory;
use App\Student;

class WorkHistoryX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:workhistory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload work history data from excel file';

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
        $file = public_path()."/excel/whUpdate.xlsx";

        if(is_file($file)) //verify file existence
        {
            $excel = App::make('excel');
            $excel->load($file, function($reader) {
                $elements = $reader->toArray();
                $bar = $this->output->createProgressBar(count($elements));

                foreach($elements as $element) 
                {
                    $legal_id = substr($element['legal_id'], 1);
                    //get student
                    $student = Student::where('legal_id', '=', $legal_id)->first();
                    if(count($student) > 0) {
                        $wh = WorkHistory::where('student_id', '=', $student->id)->first();
                        if(count($wh) > 0) {
                            $wh->job_position_id = $element['job_position_id'];
                            $wh->address_1 = substr($element['dir'], 1);
                            $wh->save();
                        }
                    }

                    $bar->advance();
                }

                $bar->finish();
            });
        }
        else
            $this->info('Error: there is no whUpdate.xlsx file.');
    }
}
