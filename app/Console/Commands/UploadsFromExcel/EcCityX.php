<?php

namespace App\Console\Commands\UploadsFromExcel;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use App\EcCity;
use App\EcProvince;

class EcCityX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upexcel:eccity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload Ecuador cities data from excel file';

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
        $file = public_path()."/excel/EcCity.xlsx";
        
        if(is_file($file)) //verify file existence
        {
            $excel = App::make('excel');
            $excel->load($file, function($reader) {
                $elements = $reader->toArray();                       
                $bar = $this->output->createProgressBar(count($elements));
                
                foreach($elements as $element) 
                {
                    $province = EcProvince::findOrFail($element['ec_province_id']);

                    $ec_city = new EcCity;
                    $ec_city->id = $element['id'];
                    $ec_city->name = $element['name'];
                    $ec_city->ec_province_id = $province->id;
                    $ec_city->save();
                    $bar->advance();
                }

                $bar->finish();
            });            
        }
        else     
            $this->info('Error: there is no EcCity.xlsx file.');   
    }
}
