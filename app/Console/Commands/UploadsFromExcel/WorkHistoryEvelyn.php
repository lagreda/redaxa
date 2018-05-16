<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\Student;
use App\WorkHistory;

class WorkHistoryEvelyn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:workhistoryevelyn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update work history';

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
        $file = public_path()."/excel/whEvelynUpdate.xlsx";

        if(is_file($file)) //verify file existence
        {
            $excel = App::make('excel');
            $excel->load($file, function($reader) {
                $elements = $reader->toArray();
                $bar = $this->output->createProgressBar(count($elements));

                foreach($elements as $element) 
                {
                    $legal_id = $element['legal_id'];
                    //get student
                    $student = Student::where('legal_id', '=', $legal_id)->first();
                    if(count($student) > 0) {
                        $wh = WorkHistory::where('student_id', '=', $student->id)->first();
                        if(count($wh) > 0) {
                            $wh->job_position_id = $element['job'];
                            $wh->address_1 = $element['address'];
                            $wh->save();
                        }
                    }

                    $bar->advance();
                }

                $bar->finish();
            });
        }
        else
            $this->info('Error: there is no whEvelynUpdate.xlsx file.');
    }
}
