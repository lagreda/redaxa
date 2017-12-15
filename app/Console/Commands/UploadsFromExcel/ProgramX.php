<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\Program;

class ProgramX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:program';

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
        $file = public_path()."/excel/Program.xlsx";       
        
        if(is_file($file)) //verify file existence
        {            
            $excel = App::make('excel');
            $excel->load($file, function($reader) {
                $elements = $reader->toArray();                       
                $bar = $this->output->createProgressBar(count($elements));
                
                foreach($elements as $element) 
                {
                    $program = new Program;
                    $program->id = $element['id'];
                    $program->name = $element['name'];                    
                    $program->program_type_id = $element['program_type_id'];          
                    $program->save();
                    $bar->advance();
                }

                $bar->finish();
            });            
        }
        else     
            $this->info('Error: there is no Program.xlsx file.');
    }
}
