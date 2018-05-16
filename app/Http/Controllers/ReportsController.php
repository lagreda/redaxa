<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Program;
use App\WorkHistory;

class ReportsController extends Controller
{
    public function mobility()
    {
        //get all active programs
        $programs = Program::where('status', '=', '1')
                    ->get();

        return view('reports/mobility', compact('programs'));
    }

    public function finalEfficiency()
    {
        return view('reports/final_efficiency');
    }

    public function beforeEspaeJobPosition(Request $request)
    {
        return view('reports.reportview');

        if(false)
        {
            $program_id = $request->program_id;
            if($program_id == "")
                $program_id = "%%";
            $program_group = $request->program_group;
            if($program_group == "")
                $program_group = "%%";

            $students = Student::where('program_id', 'LIKE', $program_id)
                                ->where('program_group', 'LIKE', $program_group)
                                //->whereNotNull('espae_start_date')
                                ->get();

            //dd($students);

            $job_positions = array();

            foreach($students as $student)
            {
                //get student espae start date
                $espae_start_date = $student->espae_start_date;
                //get student work history from before starting espae
                $work_history = WorkHistory::with('jobPosition')
                                ->where('student_id', '=', $student->id)
                                //->where('start_date', '<', $espae_start_date)
                                ->first();

                dd($work_history);

                if(count($work_history) > 0)
                {
                    $job_position_id = $work_history->job_position_id;
                    if(isset($job_positions[$job_position_id]))
                        $job_positions[$job_position_id]['count'] += 1;
                    else
                        $job_positions[$job_position_id] = array(
                            'name' => $work_history->jobPosition->name,
                            'count' => 1
                        );
                }
            }
        }
    }

    public function hadPromotionAfterEspae(Request $request) 
    {
        // initial report ---
        $program_id = $request->program_id;
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->program_group;
        if($program_group == "")
            $program_group = "%%";
        $students = Student::where('program_id', 'LIKE', $program_id)
                    ->where('program_group', 'LIKE', $program_group)
                    ->get();
        $yes = 0;
        $no = 0;
        foreach($students as $student)
        {
            if($student->had_promotion_after_espae == 1)
                $yes++;
            if($student->had_promotion_after_espae == 2)
                $no++;
        }
        $g1 = array(
            "yes" => $yes,
            "no" => $no,
        );
        // end initial report ---

        $g2 = null;
        $g3 = null;

        // first comparative  ---
        $program_id_c_1 = $request->program_id_c_1;
        $program_group_c_1 = $request->program_group_c_1;
        if($program_id_c_1 != "" && $program_group_c_1 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
            $yes = 0;
            $no = 0;
            foreach($students as $student)
            {
                if($student->had_promotion_after_espae == 1)
                    $yes++;
                if($student->had_promotion_after_espae == 2)
                    $no++;
            }
            $g2 = array(
                "yes" => $yes,
                "no" => $no,
            );
        }
        // end first comparative ---

        // second comparative  ---
        $program_id_c_2 = $request->program_id_c_2;
        $program_group_c_2 = $request->program_group_c_2;
        if($program_id_c_2 != "" && $program_group_c_2 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_2)
                    ->where('program_group', 'LIKE', $program_group_c_2)
                    ->get();
            $yes = 0;
            $no = 0;
            foreach($students as $student)
            {
                if($student->had_promotion_after_espae == 1)
                    $yes++;
                if($student->had_promotion_after_espae == 2)
                    $no++;
            }
            $g3 = array(
                "yes" => $yes,
                "no" => $no,
            );
        }
        // end second comparative ---

        $response = array(
            'g1' => $g1,
            'g2' => $g2,
            'g3' => $g3,
        );

        $data = array(
            'code' => '2',
            'type' => 'pie',
            'response' => $response
        );
        
        return view('reports.reportview', compact('data'));
    }

    public function hadIncomesIncrease(Request $request)
    {
        // initial report ---
        $program_id = $request->program_id;
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->program_group;
        if($program_group == "")
            $program_group = "%%";
        $students = Student::where('program_id', 'LIKE', $program_id)
                    ->where('program_group', 'LIKE', $program_group)
                    ->get();
        $yes = 0;
        $no = 0;
        foreach($students as $student)
        {
            if($student->had_incomes_increase == 1)
                $yes++;
            if($student->had_incomes_increase == 2)
                $no++;
        }
        $g1 = array(
            "yes" => $yes,
            "no" => $no,
        );
        // end initial report ---

        $g2 = null;
        $g3 = null;

        // first comparative  ---
        $program_id_c_1 = $request->program_id_c_1;
        $program_group_c_1 = $request->program_group_c_1;
        if($program_id_c_1 != "" && $program_group_c_1 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
            $yes = 0;
            $no = 0;
            foreach($students as $student)
            {
                if($student->had_incomes_increase == 1)
                    $yes++;
                if($student->had_incomes_increase == 2)
                    $no++;
            }
            $g2 = array(
                "yes" => $yes,
                "no" => $no,
            );
        }
        // end first comparative ---

        // second comparative  ---
        $program_id_c_2 = $request->program_id_c_2;
        $program_group_c_2 = $request->program_group_c_2;
        if($program_id_c_2 != "" && $program_group_c_2 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_2)
                    ->where('program_group', 'LIKE', $program_group_c_2)
                    ->get();
            $yes = 0;
            $no = 0;
            foreach($students as $student)
            {
                if($student->had_incomes_increase == 1)
                    $yes++;
                if($student->had_incomes_increase == 2)
                    $no++;
            }
            $g3 = array(
                "yes" => $yes,
                "no" => $no,
            );
        }
        // end second comparative ---

        $response = array(
            'g1' => $g1,
            'g2' => $g2,
            'g3' => $g3,
        );

        $data = array(
            'code' => '3',
            'type' => 'pie',
            'response' => $response
        );
        
        return view('reports.reportview', compact('data'));
    }

    public function hadResponsabilitiesIncrease(Request $request)
    {
        // initial report ---
        $program_id = $request->program_id;
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->program_group;
        if($program_group == "")
            $program_group = "%%";
        $students = Student::where('program_id', 'LIKE', $program_id)
                    ->where('program_group', 'LIKE', $program_group)
                    ->get();
        $yes = 0;
        $no = 0;
        foreach($students as $student)
        {
            if($student->had_responsabilities_increase == 1)
                $yes++;
            if($student->had_responsabilities_increase == 2)
                $no++;
        }
        $g1 = array(
            "yes" => $yes,
            "no" => $no,
        );
        // end initial report ---

        $g2 = null;
        $g3 = null;

        // first comparative  ---
        $program_id_c_1 = $request->program_id_c_1;
        $program_group_c_1 = $request->program_group_c_1;
        if($program_id_c_1 != "" && $program_group_c_1 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
            $yes = 0;
            $no = 0;
            foreach($students as $student)
            {
                if($student->had_responsabilities_increase == 1)
                    $yes++;
                if($student->had_responsabilities_increase == 2)
                    $no++;
            }
            $g2 = array(
                "yes" => $yes,
                "no" => $no,
            );
        }
        // end first comparative ---

        // second comparative  ---
        $program_id_c_2 = $request->program_id_c_2;
        $program_group_c_2 = $request->program_group_c_2;
        if($program_id_c_2 != "" && $program_group_c_2 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_2)
                    ->where('program_group', 'LIKE', $program_group_c_2)
                    ->get();
            $yes = 0;
            $no = 0;
            foreach($students as $student)
            {
                if($student->had_responsabilities_increase == 1)
                    $yes++;
                if($student->had_responsabilities_increase == 2)
                    $no++;
            }
            $g3 = array(
                "yes" => $yes,
                "no" => $no,
            );
        }
        // end second comparative ---

        $response = array(
            'g1' => $g1,
            'g2' => $g2,
            'g3' => $g3,
        );

        $data = array(
            'code' => '4',
            'type' => 'pie',
            'response' => $response
        );
        
        return view('reports.reportview', compact('data'));
    }

    public function realityVsExpectative(Request $request)
    {
        // initial report ---
        $program_id = $request->program_id;
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->program_group;
        if($program_group == "")
            $program_group = "%%";
        $students = Student::where('program_id', 'LIKE', $program_id)
                    ->where('program_group', 'LIKE', $program_group)
                    ->get();
        $rve1 = 0;
        $rve2 = 0;
        $rve3 = 0;
        $rve4 = 0;
        foreach($students as $student)
        {
            if($student->reality_vs_expectative == 1)
                $rve1++;
            if($student->reality_vs_expectative == 2)
                $rve2++;
            if($student->reality_vs_expectative == 3)
                $rve3++;
            if($student->reality_vs_expectative == 4)
                $rve4++;
        }
        $g1 = array(
            "rve1" => $rve1,
            "rve2" => $rve2,
            "rve3" => $rve3,
            "rve4" => $rve4,
        );
        // end initial report ---

        $g2 = null;
        $g3 = null;

        // first comparative  ---
        $program_id_c_1 = $request->program_id_c_1;
        $program_group_c_1 = $request->program_group_c_1;
        if($program_id_c_1 != "" && $program_group_c_1 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
            $rve1 = 0;
            $rve2 = 0;
            $rve3 = 0;
            $rve4 = 0;
            foreach($students as $student)
            {
                if($student->reality_vs_expectative == 1)
                    $rve1++;
                if($student->reality_vs_expectative == 2)
                    $rve2++;
                if($student->reality_vs_expectative == 3)
                    $rve3++;
                if($student->reality_vs_expectative == 4)
                    $rve4++;
            }
            $g2 = array(
                "rve1" => $rve1,
                "rve2" => $rve2,
                "rve3" => $rve3,
                "rve4" => $rve4,
            );
        }
        // end first comparative ---

        // second comparative  ---
        $program_id_c_2 = $request->program_id_c_2;
        $program_group_c_2 = $request->program_group_c_2;
        if($program_id_c_2 != "" && $program_group_c_2 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
            $rve1 = 0;
            $rve2 = 0;
            $rve3 = 0;
            $rve4 = 0;
            foreach($students as $student)
            {
                if($student->reality_vs_expectative == 1)
                    $rve1++;
                if($student->reality_vs_expectative == 2)
                    $rve2++;
                if($student->reality_vs_expectative == 3)
                    $rve3++;
                if($student->reality_vs_expectative == 4)
                    $rve4++;
            }
            $g3 = array(
                "rve1" => $rve1,
                "rve2" => $rve2,
                "rve3" => $rve3,
                "rve4" => $rve4,
            );
        }
        // end second comparative ---

        $response = array(
            'g1' => $g1,
            'g2' => $g2,
            'g3' => $g3,
        );

        //dd($response);

        $data = array(
            'code' => '5',
            'type' => 'bar',
            'response' => $response
        );
        
        return view('reports.reportview', compact('data'));
    }

    public function belongLevelEspae(Request $request)
    {
        // initial report ---
        $program_id = $request->program_id;
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->program_group;
        if($program_group == "")
            $program_group = "%%";
        $students = Student::where('program_id', 'LIKE', $program_id)
                    ->where('program_group', 'LIKE', $program_group)
                    ->get();
        $rve1 = 0;
        $rve2 = 0;
        $rve3 = 0;
        $rve4 = 0;
        $rve5 = 0;
        foreach($students as $student)
        {
            if($student->belong_level_espae == 1)
                $rve1++;
            if($student->belong_level_espae == 2)
                $rve2++;
            if($student->belong_level_espae == 3)
                $rve3++;
            if($student->belong_level_espae == 4)
                $rve4++;
            if($student->belong_level_espae == 5)
                $rve5++;
        }
        $g1 = array(
            "rve1" => $rve1,
            "rve2" => $rve2,
            "rve3" => $rve3,
            "rve4" => $rve4,
            "rve5" => $rve5,
        );
        // end initial report ---

        $g2 = null;
        $g3 = null;

        // first comparative  ---
        $program_id_c_1 = $request->program_id_c_1;
        $program_group_c_1 = $request->program_group_c_1;
        if($program_id_c_1 != "" && $program_group_c_1 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
                    $rve1 = 0;
                    $rve2 = 0;
                    $rve3 = 0;
                    $rve4 = 0;
                    $rve5 = 0;
                    foreach($students as $student)
                    {
                        if($student->belong_level_espae == 1)
                            $rve1++;
                        if($student->belong_level_espae == 2)
                            $rve2++;
                        if($student->belong_level_espae == 3)
                            $rve3++;
                        if($student->belong_level_espae == 4)
                            $rve4++;
                        if($student->belong_level_espae == 5)
                            $rve5++;
                    }
                    $g2 = array(
                        "rve1" => $rve1,
                        "rve2" => $rve2,
                        "rve3" => $rve3,
                        "rve4" => $rve4,
                        "rve5" => $rve5,
                    );
        }
        // end first comparative ---

        // second comparative  ---
        $program_id_c_2 = $request->program_id_c_2;
        $program_group_c_2 = $request->program_group_c_2;
        if($program_id_c_2 != "" && $program_group_c_2 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
                    $rve1 = 0;
                    $rve2 = 0;
                    $rve3 = 0;
                    $rve4 = 0;
                    $rve5 = 0;
                    foreach($students as $student)
                    {
                        if($student->belong_level_espae == 1)
                            $rve1++;
                        if($student->belong_level_espae == 2)
                            $rve2++;
                        if($student->belong_level_espae == 3)
                            $rve3++;
                        if($student->belong_level_espae == 4)
                            $rve4++;
                        if($student->belong_level_espae == 5)
                            $rve5++;
                    }
                    $g3 = array(
                        "rve1" => $rve1,
                        "rve2" => $rve2,
                        "rve3" => $rve3,
                        "rve4" => $rve4,
                        "rve5" => $rve5,
                    );
        }
        // end second comparative ---

        $response = array(
            'g1' => $g1,
            'g2' => $g2,
            'g3' => $g3,
        );

        //dd($response);

        $data = array(
            'code' => '6',
            'type' => 'bar',
            'response' => $response
        );
        
        return view('reports.reportview', compact('data'));
    }

    function workKnowledgeValue(Request $request)
    {
        // initial report ---
        $program_id = $request->program_id;
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->program_group;
        if($program_group == "")
            $program_group = "%%";
        $students = Student::where('program_id', 'LIKE', $program_id)
                    ->where('program_group', 'LIKE', $program_group)
                    ->get();
        $rve1 = 0;
        $rve2 = 0;
        $rve3 = 0;
        $rve4 = 0;
        $rve5 = 0;
        foreach($students as $student)
        {
            if($student->work_knowledge_value == 1)
                $rve1++;
            if($student->work_knowledge_value == 2)
                $rve2++;
            if($student->work_knowledge_value == 3)
                $rve3++;
            if($student->work_knowledge_value == 4)
                $rve4++;
            if($student->work_knowledge_value == 5)
                $rve5++;
        }
        $g1 = array(
            "rve1" => $rve1,
            "rve2" => $rve2,
            "rve3" => $rve3,
            "rve4" => $rve4,
            "rve5" => $rve5,
        );
        // end initial report ---

        $g2 = null;
        $g3 = null;

        // first comparative  ---
        $program_id_c_1 = $request->program_id_c_1;
        $program_group_c_1 = $request->program_group_c_1;
        if($program_id_c_1 != "" && $program_group_c_1 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
                    $rve1 = 0;
                    $rve2 = 0;
                    $rve3 = 0;
                    $rve4 = 0;
                    $rve5 = 0;
                    foreach($students as $student)
                    {
                        if($student->work_knowledge_value == 1)
                            $rve1++;
                        if($student->work_knowledge_value == 2)
                            $rve2++;
                        if($student->work_knowledge_value == 3)
                            $rve3++;
                        if($student->work_knowledge_value == 4)
                            $rve4++;
                        if($student->work_knowledge_value == 5)
                            $rve5++;
                    }
                    $g2 = array(
                        "rve1" => $rve1,
                        "rve2" => $rve2,
                        "rve3" => $rve3,
                        "rve4" => $rve4,
                        "rve5" => $rve5,
                    );
        }
        // end first comparative ---

        // second comparative  ---
        $program_id_c_2 = $request->program_id_c_2;
        $program_group_c_2 = $request->program_group_c_2;
        if($program_id_c_2 != "" && $program_group_c_2 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
                    $rve1 = 0;
                    $rve2 = 0;
                    $rve3 = 0;
                    $rve4 = 0;
                    $rve5 = 0;
                    foreach($students as $student)
                    {
                        if($student->work_knowledge_value == 1)
                            $rve1++;
                        if($student->work_knowledge_value == 2)
                            $rve2++;
                        if($student->work_knowledge_value == 3)
                            $rve3++;
                        if($student->work_knowledge_value == 4)
                            $rve4++;
                        if($student->work_knowledge_value == 5)
                            $rve5++;
                    }
                    $g3 = array(
                        "rve1" => $rve1,
                        "rve2" => $rve2,
                        "rve3" => $rve3,
                        "rve4" => $rve4,
                        "rve5" => $rve5,
                    );
        }
        // end second comparative ---

        $response = array(
            'g1' => $g1,
            'g2' => $g2,
            'g3' => $g3,
        );

        //dd($response);

        $data = array(
            'code' => '7',
            'type' => 'bar',
            'response' => $response
        );
        
        return view('reports.reportview', compact('data'));
    }

    function lifeKnowledgeValue(Request $request)
    {
        // initial report ---
        $program_id = $request->program_id;
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->program_group;
        if($program_group == "")
            $program_group = "%%";
        $students = Student::where('program_id', 'LIKE', $program_id)
                    ->where('program_group', 'LIKE', $program_group)
                    ->get();
        $rve1 = 0;
        $rve2 = 0;
        $rve3 = 0;
        $rve4 = 0;
        $rve5 = 0;
        foreach($students as $student)
        {
            if($student->life_knowledge_value == 1)
                $rve1++;
            if($student->life_knowledge_value == 2)
                $rve2++;
            if($student->life_knowledge_value == 3)
                $rve3++;
            if($student->life_knowledge_value == 4)
                $rve4++;
            if($student->life_knowledge_value == 5)
                $rve5++;
        }
        $g1 = array(
            "rve1" => $rve1,
            "rve2" => $rve2,
            "rve3" => $rve3,
            "rve4" => $rve4,
            "rve5" => $rve5,
        );
        // end initial report ---

        $g2 = null;
        $g3 = null;

        // first comparative  ---
        $program_id_c_1 = $request->program_id_c_1;
        $program_group_c_1 = $request->program_group_c_1;
        if($program_id_c_1 != "" && $program_group_c_1 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
                    $rve1 = 0;
                    $rve2 = 0;
                    $rve3 = 0;
                    $rve4 = 0;
                    $rve5 = 0;
                    foreach($students as $student)
                    {
                        if($student->life_knowledge_value == 1)
                            $rve1++;
                        if($student->life_knowledge_value == 2)
                            $rve2++;
                        if($student->life_knowledge_value == 3)
                            $rve3++;
                        if($student->life_knowledge_value == 4)
                            $rve4++;
                        if($student->life_knowledge_value == 5)
                            $rve5++;
                    }
                    $g2 = array(
                        "rve1" => $rve1,
                        "rve2" => $rve2,
                        "rve3" => $rve3,
                        "rve4" => $rve4,
                        "rve5" => $rve5,
                    );
        }
        // end first comparative ---

        // second comparative  ---
        $program_id_c_2 = $request->program_id_c_2;
        $program_group_c_2 = $request->program_group_c_2;
        if($program_id_c_2 != "" && $program_group_c_2 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
                    $rve1 = 0;
                    $rve2 = 0;
                    $rve3 = 0;
                    $rve4 = 0;
                    $rve5 = 0;
                    foreach($students as $student)
                    {
                        if($student->life_knowledge_value == 1)
                            $rve1++;
                        if($student->life_knowledge_value == 2)
                            $rve2++;
                        if($student->life_knowledge_value == 3)
                            $rve3++;
                        if($student->life_knowledge_value == 4)
                            $rve4++;
                        if($student->life_knowledge_value == 5)
                            $rve5++;
                    }
                    $g3 = array(
                        "rve1" => $rve1,
                        "rve2" => $rve2,
                        "rve3" => $rve3,
                        "rve4" => $rve4,
                        "rve5" => $rve5,
                    );
        }
        // end second comparative ---

        $response = array(
            'g1' => $g1,
            'g2' => $g2,
            'g3' => $g3,
        );

        //dd($response);

        $data = array(
            'code' => '8',
            'type' => 'bar',
            'response' => $response
        );
        
        return view('reports.reportview', compact('data'));
    }

    public function satisfactionLevelEspae(Request $request)
    {
        // initial report ---
        $program_id = $request->program_id;
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->program_group;
        if($program_group == "")
            $program_group = "%%";
        $students = Student::where('program_id', 'LIKE', $program_id)
                    ->where('program_group', 'LIKE', $program_group)
                    ->get();
        $rve1 = 0;
        $rve2 = 0;
        $rve3 = 0;
        $rve4 = 0;
        $rve5 = 0;
        foreach($students as $student)
        {
            if($student->satisfaction_level_espae == 1)
                $rve1++;
            if($student->satisfaction_level_espae == 2)
                $rve2++;
            if($student->satisfaction_level_espae == 3)
                $rve3++;
            if($student->satisfaction_level_espae == 4)
                $rve4++;
            if($student->satisfaction_level_espae == 5)
                $rve5++;
        }
        $g1 = array(
            "rve1" => $rve1,
            "rve2" => $rve2,
            "rve3" => $rve3,
            "rve4" => $rve4,
            "rve5" => $rve5,
        );
        // end initial report ---

        $g2 = null;
        $g3 = null;

        // first comparative  ---
        $program_id_c_1 = $request->program_id_c_1;
        $program_group_c_1 = $request->program_group_c_1;
        if($program_id_c_1 != "" && $program_group_c_1 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
                    $rve1 = 0;
                    $rve2 = 0;
                    $rve3 = 0;
                    $rve4 = 0;
                    $rve5 = 0;
                    foreach($students as $student)
                    {
                        if($student->satisfaction_level_espae == 1)
                            $rve1++;
                        if($student->satisfaction_level_espae == 2)
                            $rve2++;
                        if($student->satisfaction_level_espae == 3)
                            $rve3++;
                        if($student->satisfaction_level_espae == 4)
                            $rve4++;
                        if($student->satisfaction_level_espae == 5)
                            $rve5++;
                    }
                    $g2 = array(
                        "rve1" => $rve1,
                        "rve2" => $rve2,
                        "rve3" => $rve3,
                        "rve4" => $rve4,
                        "rve5" => $rve5,
                    );
        }
        // end first comparative ---

        // second comparative  ---
        $program_id_c_2 = $request->program_id_c_2;
        $program_group_c_2 = $request->program_group_c_2;
        if($program_id_c_2 != "" && $program_group_c_2 != "")
        {
            $students = Student::where('program_id', 'LIKE', $program_id_c_1)
                    ->where('program_group', 'LIKE', $program_group_c_1)
                    ->get();
                    $rve1 = 0;
                    $rve2 = 0;
                    $rve3 = 0;
                    $rve4 = 0;
                    $rve5 = 0;
                    foreach($students as $student)
                    {
                        if($student->satisfaction_level_espae == 1)
                            $rve1++;
                        if($student->satisfaction_level_espae == 2)
                            $rve2++;
                        if($student->satisfaction_level_espae == 3)
                            $rve3++;
                        if($student->satisfaction_level_espae == 4)
                            $rve4++;
                        if($student->satisfaction_level_espae == 5)
                            $rve5++;
                    }
                    $g3 = array(
                        "rve1" => $rve1,
                        "rve2" => $rve2,
                        "rve3" => $rve3,
                        "rve4" => $rve4,
                        "rve5" => $rve5,
                    );
        }
        // end second comparative ---

        $response = array(
            'g1' => $g1,
            'g2' => $g2,
            'g3' => $g3,
        );

        //dd($response);

        $data = array(
            'code' => '9',
            'type' => 'bar',
            'response' => $response
        );
        
        return view('reports.reportview', compact('data'));
    }
}
