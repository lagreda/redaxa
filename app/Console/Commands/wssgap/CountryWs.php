<?php

namespace App\Console\Commands\wssgap;
require 'vendor/autoload.php';

use Illuminate\Console\Command;
use GuzzleHttp;
use App\Country;

class CountryWs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wssgap:country';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Integration with SGAP web service: countries';

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
        $response = $client->request('GET', 'Paises', [
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
                    $country = new Country();
                    $country->id = $item->id;
                    $country->name = $item->nombre;
                    $country->save();
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
