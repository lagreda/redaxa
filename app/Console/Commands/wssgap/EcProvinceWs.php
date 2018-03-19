<?php

namespace App\Console\Commands\wssgap;
require 'vendor/autoload.php';

use Illuminate\Console\Command;
use GuzzleHttp;
use App\EcProvince;

class EcProvinceWs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wssgap:ecprovince';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Integration with SGAP web service: ecuador provinces';

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
        $response = $client->request('GET', 'Provincias', [
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
                    $ecProvince = new EcProvince();
                    $ecProvince->id = $item->id;
                    $ecProvince->name = $item->nombre;
                    $ecProvince->save();
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
