<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\WorkHistory;
use App\Program;
use App\JobStatus;
use App\BusinessArea;
use App\JobPosition;
use App\WorkingArea;
use App\MonthlyIncome;
use App\Country;
use App\EcCity;
use App\CivilStatus;
use App\BloodType;
use App\Gender;
use App\EthnicGroup;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        $surname = $request->input('surname', '');
        $legal_id = $request->input('legal_id', '');
        $program_id = $request->input('program_id', '');
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->input('program_group', '');
        if($program_group == "")
            $program_group_query = "%%";
        else
            $program_group_query = $program_group;
        $graduated_from_espae = $request->input('graduated_from_espae', '');
        $starred = $request->input('starred', '');

        $students = Student::where('program_id', 'LIKE', $program_id)
                ->where('program_group', 'LIKE', $program_group_query)
                ->where('name', 'LIKE', '%'.$name.'%')
                ->where('surname', 'LIKE', '%'.$surname.'%')
                ->where('legal_id', 'LIKE', '%'.$legal_id.'%')
                ->where('graduated_from_espae', 'LIKE', '%'.$graduated_from_espae.'%')
                ->where('starred', 'LIKE', '%'.$starred.'%')
                ->paginate(20);

        $programs = Program::where('status', '=', '1')->get();

        return view('students.index', compact(
            'name',
            'surname',
            'legal_id',
            'students',
            'programs',
            'program_id',
            'program_group',
            'graduated_from_espae',
            'starred'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        
        //get student academic history
        $academic_history = $student->academicHistory()->get();

        //get last working history
        $working_history = WorkHistory::where('student_id', '=', $student->id)
                            ->orderBy('created_at', 'DESC')
                            ->first();

        return view('students.show', compact(
            'student',
            'academic_history',
            'working_history'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        // get last work history of student
        $work_history = array();
        if(count($student) > 0) 
        {
            $work_history = WorkHistory::where('student_id', '=', $student->id)
                            ->orderBy('created_at', 'DESC')
                            ->first();
        }
        // get all ESPAE programs
        $programs = Program::all();
        //get all job status
        $job_status = JobStatus::where('status', '=', '1')->get();
        //get all business areas
        $business_areas = BusinessArea::where('status', '=', '1')->get();
        //get all job positions
        $job_positions = JobPosition::where('status', '=', '1')->get();
        //get all working areas
        $working_areas = WorkingArea::where('status', '=', '1')->get();
        //get all monthly incomes
        $monthly_incomes = MonthlyIncome::where('status', '=', '1')->get();
        //get all countries
        $countries = Country::where('status', '=', '1')->get();
        //get all ecuador cities
        $cities = EcCity::where('status', '=', '1')->get();
        //get all civil status
        $civil_status = CivilStatus::where('status', '=', '1')->get();
        //get all blood types
        $blood_types = BloodType::where('status', '=', '1')->get();
        //get all genders
        $genders = Gender::where('status', '=', '1')->get();
        //get all ethnic groups
        $ethnic_groups = EthnicGroup::where('status', '=', '1')->get();

        //reality vs expectatives 
        $real_vs_expect = array(
            "1" => "Mejor de lo que me esperaba",
            "2" => "Igual a lo que me esperaba",
            "3" => "Peor de lo que me esperaba",
            "4" => "No tenía ninguna expectativa",
        );

        //programs after espae
        $programs_af_espae = array(
            "1" => "Cursos de actualización de conocimientos (Educación Ejecutiva)",
            "2" => "Otra maestría",
            "3" => "Ninguno",
        );

        //espae graduate services
        $espae_graduate_services = array(
            "1" => "Acceso al directorio de graduados",
            "2" => "Aplicación móvil para graduados",
            "3" => "Carnet de graduados con beneficios",
            "4" => "Encuentro laboral anual",
            "5" => "Eventos de networking",
            "6" => "Mentorías a alumnos o graduados",
            "7" => "Ser conferencista en un evento de ESPAE",
            "8" => "Oportunidad de recibir asesoría y orientación",
            "9" => "Oportunidades profesionales / Bolsa de trabajo",
            "10" => "Voluntariado para eventos",
        );

        return view('students.edit', compact(
            'student',
            'work_history',
            'programs',
            'job_status',
            'business_areas',
            'job_positions',
            'working_areas',
            'monthly_incomes',
            'countries',
            'cities',
            'civil_status',
            'blood_types',
            'genders',
            'ethnic_groups',
            'ext_token',
            'real_vs_expect',
            'programs_af_espae',
            'espae_graduate_services'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        DB::transaction(function() use($student, $request) {
            $student->name = $request->name;
            $student->surname = $request->surname;
            $student->main_email = $request->main_email;
            $student->personal_url = $request->personal_url;
            $student->mobile_number = $request->mobile_number;
            $student->home_number = $request->home_number;
            $student->birth_date = $request->birth_date;
            $student->home_address_1 = $request->home_address_1;
            $student->linkedin_url = $request->linkedin_url;
            $student->facebook_url = $request->facebook_url;
            $student->twitter_url = $request->twitter_url;
            $student->zip_code = $request->zip_code;
            $student->graduated_from_espae = $request->graduated_from_espae;
            $student->starred = $request->starred;
            $student->comments = $request->comments;
            $student->country_id_birth = $request->country_id_birth;
            $student->ec_city_id_birth = $request->ec_city_id_birth;
            $student->country_id_residence = $request->country_id_residence;
            $student->ec_city_id_residence = $request->ec_city_id_residence;
            $student->civil_status_id = $request->civil_status_id;
            $student->blood_type_id = $request->blood_type_id;
            $student->gender_id = $request->gender_id;
            $student->ethnic_group_id = $request->ethnic_group_id;
            $student->program_id = $request->program_id;
            $student->program_group = $request->program_group;
            $student->job_status_id = $request->job_status_id;
            $student->work_number = $request->work_number;
            $student->had_promotion_after_espae = $request->had_promotion_after_espae;
            $student->had_incomes_increase = $request->had_incomes_increase;
            $student->had_responsabilities_increase = $request->had_responsabilities_increase;
            $student->life_plan_after_espae = $request->life_plan_after_espae;
            $student->reality_vs_expectative = $request->reality_vs_expectative;
            $student->belong_level_espae = $request->belong_level_espae;
            $student->work_knowledge_value = $request->work_knowledge_value;
            $student->life_knowledge_value = $request->life_knowledge_value;
            $student->satisfaction_level_espae = $request->satisfaction_level_espae;
            $student->would_recomend_espae = $request->would_recomend_espae;
            $student->graduate_services_wish = $request->graduate_services_wish;
            $student->other_programs_espae_in_future = $request->other_programs_espae_in_future;
            $student->planning_to_open_company = $request->planning_to_open_company;
            $student->main_obstacle_create_company = $request->main_obstacle_create_company;
            $student->save();

            if($request->company != "") 
            {
                // update working history
                $work_history = WorkHistory::where('student_id', '=', $student->id)
                ->where('company', '=', $request->company)
                ->first();

                if(count($work_history) == 0)
                $work_history = new WorkHistory();

                $work_history->company = $request->company;
                $work_history->phone = $request->work_number;
                $work_history->start_date = $request->start_date;
                $work_history->curret_job = 1;
                $work_history->business_area_id = $request->business_area_id;
                $work_history->job_position_id = $request->job_position_id;
                $work_history->monthly_income_id = $request->monthly_income_id;
                $work_history->student_id = $student->id;
                $work_history->working_area_id = $request->working_area_id;
                $work_history->save();
            }
        });

        return redirect('student')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function externalForm($ext_token)
    {
        // get student info
        $student = Student::where('external_token', '=', $ext_token)->first();
        // get last work history of student
        $work_history = array();
        if(count($student) > 0) 
        {
            $work_history = WorkHistory::where('student_id', '=', $student->id)
                            ->orderBy('created_at', 'DESC')
                            ->first();
        }
        // get all ESPAE programs
        $programs = Program::all();
        //get all job status
        $job_status = JobStatus::where('status', '=', '1')->get();
        //get all business areas
        $business_areas = BusinessArea::where('status', '=', '1')->get();
        //get all job positions
        $job_positions = JobPosition::where('status', '=', '1')->get();
        //get all working areas
        $working_areas = WorkingArea::where('status', '=', '1')->get();
        //get all monthly incomes
        $monthly_incomes = MonthlyIncome::where('status', '=', '1')->get();
        //get all countries
        $countries = Country::where('status', '=', '1')->get();
        //get all ecuador cities
        $cities = EcCity::where('status', '=', '1')->get();
        //get all civil status
        $civil_status = CivilStatus::where('status', '=', '1')->get();
        //get all blood types
        $blood_types = BloodType::where('status', '=', '1')->get();
        //get all genders
        $genders = Gender::where('status', '=', '1')->get();
        //get all ethnic groups
        $ethnic_groups = EthnicGroup::where('status', '=', '1')->get();

        //reality vs expectatives 
        $real_vs_expect = array(
            "1" => "Mejor de lo que me esperaba",
            "2" => "Igual a lo que me esperaba",
            "3" => "Peor de lo que me esperaba",
            "4" => "No tenía ninguna expectativa",
        );

        //programs after espae
        $programs_af_espae = array(
            "1" => "Cursos de actualización de conocimientos (Educación Ejecutiva)",
            "2" => "Otra maestría",
            "3" => "Ninguno",
        );

        //espae graduate services
        $espae_graduate_services = array(
            "1" => "Acceso al directorio de graduados",
            "2" => "Aplicación móvil para graduados",
            "3" => "Carnet de graduados con beneficios",
            "4" => "Encuentro laboral anual",
            "5" => "Eventos de networking",
            "6" => "Mentorías a alumnos o graduados",
            "7" => "Ser conferencista en un evento de ESPAE",
            "8" => "Oportunidad de recibir asesoría y orientación",
            "9" => "Oportunidades profesionales / Bolsa de trabajo",
            "10" => "Voluntariado para eventos",
        );

        return view('externalform', compact(
            'student',
            'work_history',
            'programs',
            'job_status',
            'business_areas',
            'job_positions',
            'working_areas',
            'monthly_incomes',
            'countries',
            'cities',
            'civil_status',
            'blood_types',
            'genders',
            'ethnic_groups',
            'ext_token',
            'real_vs_expect',
            'programs_af_espae',
            'espae_graduate_services'
        ));
    }

    public function storeExternalForm(Request $request)
    {
        $ext_token = $request->input('ext_token');
        $form_section = $request->input('form_section');

        $student = Student::where('external_token', '=', $ext_token)->first();

        //update student
        if(count($student) > 0)
        {
            $student->name = $request->name;
            $student->surname = $request->surname;
            $student->main_email = $request->main_email;
            $student->personal_url = $request->personal_url;
            $student->mobile_number = $request->mobile_number;
            $student->home_number = $request->home_number;
            $student->birth_date = $request->birth_date;
            $student->home_address_1 = $request->home_address_1;
            $student->linkedin_url = $request->linkedin_url;
            $student->facebook_url = $request->facebook_url;
            $student->twitter_url = $request->twitter_url;
            $student->zip_code = $request->zip_code;
            $student->country_id_birth = $request->country_id_birth;
            $student->ec_city_id_birth = $request->ec_city_id_birth;
            $student->country_id_residence = $request->country_id_residence;
            $student->ec_city_id_residence = $request->ec_city_id_residence;
            $student->civil_status_id = $request->civil_status_id;
            $student->blood_type_id = $request->blood_type_id;
            $student->gender_id = $request->gender_id;
            $student->ethnic_group_id = $request->ethnic_group_id;
            $student->program_id = $request->program_id;
            $student->program_group = $request->program_group;
            $student->job_status_id = $request->job_status_id;
            $student->work_number = $request->work_number;
            $student->had_promotion_after_espae = $request->had_promotion_after_espae;
            $student->had_incomes_increase = $request->had_incomes_increase;
            $student->had_responsabilities_increase = $request->had_responsabilities_increase;
            $student->life_plan_after_espae = $request->life_plan_after_espae;
            $student->reality_vs_expectative = $request->reality_vs_expectative;
            $student->belong_level_espae = $request->belong_level_espae;
            $student->work_knowledge_value = $request->work_knowledge_value;
            $student->life_knowledge_value = $request->life_knowledge_value;
            $student->satisfaction_level_espae = $request->satisfaction_level_espae;
            $student->would_recomend_espae = $request->would_recomend_espae;
            $student->graduate_services_wish = $request->graduate_services_wish;
            $student->other_programs_espae_in_future = $request->other_programs_espae_in_future;
            $student->planning_to_open_company = $request->planning_to_open_company;
            $student->main_obstacle_create_company = $request->main_obstacle_create_company;
            $student->save();

            if($form_section == "4" && $request->company != "") 
            {
                // update working history
                $work_history = WorkHistory::where('student_id', '=', $student->id)
                ->where('company', '=', $request->company)
                ->first();

                if(count($work_history) == 0)
                $work_history = new WorkHistory();

                $work_history->company = $request->company;
                $work_history->phone = $request->work_number;
                $work_history->start_date = $request->start_date;
                $work_history->curret_job = 1;
                $work_history->business_area_id = $request->business_area_id;
                $work_history->job_position_id = $request->job_position;
                $work_history->monthly_income_id = $request->monthly_income_id;
                $work_history->student_id = $student->id;
                $work_history->working_area_id = $request->working_area_id;
                $work_history->save();
            }

            $response = array(
                'status' => '1'
            );
        }
        else
            $response = array(
                'status' => '0'
            );
        
        return $response;
    }

    public function excel(Request $request)
    {
        $name = $request->input('name', '');
        $surname = $request->input('surname', '');
        $legal_id = $request->input('legal_id', '');
        $program_id = $request->input('program_id', '');
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->input('program_group', '');
        if($program_group == "")
            $program_group_query = "%%";
        else
            $program_group_query = $program_group;

        $students = Student::where('program_id', 'LIKE', $program_id)
                ->where('program_group', 'LIKE', $program_group_query)
                ->where('name', 'LIKE', '%'.$name.'%')
                ->where('surname', 'LIKE', '%'.$surname.'%')
                ->where('legal_id', 'LIKE', '%'.$legal_id.'%')
                ->get();

        //dd($students);

        $filename = "students".date('YmdHis');
        $excel = App::make('excel');
        $excel->create($filename, function($excel) use($students ) {
            $excel->sheet('Visitantes', function($sheet) use($students ) {
                $sheet->loadView('students.excel', array('students' => $students));
            });
        })->download('xlsx');
    }
}
