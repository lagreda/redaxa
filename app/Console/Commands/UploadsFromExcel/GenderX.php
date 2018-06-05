<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\Gender;

class GenderX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:gender';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload gender data from excel file';

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
        $file = public_path()."/excel/Gender.xlsx";       
        
        if(is_file($file)) //verify file existence
        {            
            $excel = App::make('excel');
            $excel->load($file, function($reader) {
                $elements = $reader->toArray();                       
                $bar = $this->output->createProgressBar(count($elements));
                
                foreach($elements as $element) 
                {
                    $gender = new Gender;
                    $gender->id = $element['id'];
                    $gender->name = $element['name'];
                    $gender->textual_id = $element['textual_id'];
                    $gender->save();
                    $bar->advance();
                }

                $bar->finish();
            });            
        }
        else     
            $this->info('Error: there is no Gender.xlsx file.');  
    }
}
