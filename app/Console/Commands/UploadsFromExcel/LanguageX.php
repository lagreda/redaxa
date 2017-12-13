<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\Language;

class LanguageX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:language';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload language data from excel file';

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
        $file = public_path()."/excel/Language.xlsx";       
        
        if(is_file($file)) //verify file existence
        {            
            $excel = App::make('excel');
            $excel->load($file, function($reader) {
                $elements = $reader->toArray();                       
                $bar = $this->output->createProgressBar(count($elements));
                
                foreach($elements as $element) 
                {
                    $language = new Language;
                    $language->id = $element['id'];
                    $language->name = $element['name'];
                    $language->save();
                    $bar->advance();
                }

                $bar->finish();
            });            
        }
        else     
            $this->info('Error: there is no Language.xlsx file.');
    }
}
