<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\CivilStatus;

class CivilStatusX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:civilstatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload civil status data from excel file';

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
        $file = public_path()."/excel/CivilStatus.xlsx";       
        
        if(is_file($file)) //verify file existence
        {            
            $excel = App::make('excel');
            $excel->load($file, function($reader) {
                $elements = $reader->toArray();                       
                $bar = $this->output->createProgressBar(count($elements));
                
                foreach($elements as $element) 
                {
                    $civil_status = new CivilStatus;
                    $civil_status->id = $element['id'];
                    $civil_status->name = $element['name'];
                    $civil_status->save();
                    $bar->advance();
                }

                $bar->finish();
            });            
        }
        else     
            $this->info('Error: there is no CivilStatus.xlsx file.');    
    }
}
