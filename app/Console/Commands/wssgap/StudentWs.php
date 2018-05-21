<?php

namespace App\Console\Commands\wssgap;
require 'vendor/autoload.php';

use Illuminate\Console\Command;
use GuzzleHttp;
use App\Student;
use App\Program;
use App\AcademicLevel;
use App\AcademicHistory;

class StudentWs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wssgap:student';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Integration with SGAP web service: students';

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
        $response = $client->request('GET', 'Estudiantes', [
            'headers' => ['Token' => env('SGAP_API_TOKEN')]
        ]);
        if($response->getStatusCode() == 200)
        {
            $content = $response->getBody()->getContents();
            $json_content = json_decode($content);
            
            if(count($json_content) > 0)
            {
                foreach($json_content as $key => $item)
                {
                    //dd($item);
                    // get program information
                    $program_name = $item->nombre_programa;
                    $program = Program::where('name', '=', $program_name)->first();

                    // get student name and surname
                    $full_name = $item->estudiante;
                    $full_name = explode(" ", $full_name);
                    $name = "";
                    $surname = "";
                    if(isset($full_name[0]))
                        $surname = $full_name[0];
                    if(isset($full_name[1]))
                        $surname = " ".$full_name[1];
                    if(isset($full_name[2]))
                        $name = $full_name[2];
                    if(isset($full_name[3]))
                        $name = " ".$full_name[3];

                    $student = Student::updateOrCreate(['legal_id' => $item->identificacion], [
                        'program_id' => $program->id,
                        'program_group' => $item->promocion,
                        'name' => $name,
                        'surname' => $surname,
                        'main_email' => $item->email,
                    ]);

                    // store academic history info
                    foreach($item->historial as $ah)
                    {
                        // get academic level
                        $level = $ah->tipo;
                        $academic_level = AcademicLevel::where('name', '=', $level)->first();
                        $academic_history = new AcademicHistory();
                        $academic_history->title = $ah->titulo;
                        $academic_history->institution = $ah->institucion;
                        $academic_history->academic_level_id = $academic_level->id;
                        $academic_history->student_id = $student->id;
                        $academic_history->save();
                    }
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
