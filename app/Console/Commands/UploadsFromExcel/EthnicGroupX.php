<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\EthnicGroup;

class EthnicGroupX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:ethnicgroup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload ethnic group data from excel file';

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
        $file = public_path()."/excel/EthnicGroup.xlsx";       
        
        if(is_file($file)) //verify file existence
        {            
            $excel = App::make('excel');
            $excel->load($file, function($reader) {
                $elements = $reader->toArray();                       
                $bar = $this->output->createProgressBar(count($elements));
                
                foreach($elements as $element) 
                {
                    $ethnic_group = new EthnicGroup;
                    $ethnic_group->id = $element['id'];
                    $ethnic_group->name = $element['name'];
                    $ethnic_group->textual_id = $element['textual_id'];
                    $ethnic_group->save();
                    $bar->advance();
                }

                $bar->finish();
            });            
        }
        else     
            $this->info('Error: there is no EthnicGroup.xlsx file.');  
    }
}
