<?php

namespace App\Console\Commands\wssgap;
require 'vendor/autoload.php';

use Illuminate\Console\Command;
use GuzzleHttp;
use App\EcCity;

class EcCityWs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wssgap:eccity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Integration with SGAP web service: ecuador cities';

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
        $client = new GuzzleHttp\Client(['base_uri' => env('SGAP_API_URI')]);
        $response = $client->request('GET', 'Cantones', [
            'headers' => ['Token' => env('SGAP_API_TOKEN')]
        ]);
        if($response->getStatusCode() == 200)
        {
            $content = $response->getBody()->getContents();
            $json_content = json_decode($content);
            //dd($json_content);
            if(count($json_content) > 0)
            {
                foreach($json_content as $key => $item)
                {
                    $no_province_id = $item->idprovincia;
                    if($no_province_id == 90)
                        $no_province_id = 932;
                    $ecCity = new EcCity();
                    $ecCity->id = $item->id;
                    $ecCity->name = $item->nombre;
                    $ecCity->ec_province_id = $no_province_id;
                    $ecCity->save();
                }
                $this->info('SGAP API request finished succesfully');
            }
            else
                $this->info('SGAP API request finished with no results');
        }
        else
            $this->error("Couldn't retrieve contents, got this http code: ".$response->getStatusCode());
    }
}
