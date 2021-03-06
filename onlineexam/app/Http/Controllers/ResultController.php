<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Answer;
use App\user;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        header('Content-Type: application/json');

        $getId=auth()->user()->id;
         $getExamCode='PHP5';
        $getCourseName='PHP LARAVEL';
       

        $total=json_encode($getResult=Student::where(
            ['student_id'=>$getId,
             'uniqueid'=>$getExamCode
        ])->value('total'));


        $score=json_encode($getResult=Student::where(
            ['student_id'=>$getId,
             'uniqueid'=>$getExamCode
        ])->value('score'));

        $wrong_ans=json_encode($getResult=Student::where(
            ['student_id'=>$getId,
             'uniqueid'=>$getExamCode
        ])->value('wrong_ans'));
		
		$not_attended=($total-($score+$wrong_ans));

         $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('doughnut')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Right Answers', 'Wrong Answers','Not Attended'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB','#808080'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#808080'],
                'data' => [$score, $wrong_ans,$not_attended]
            ]
        ])
        ->options([]);
          $StdName=user::where('id',$getId)->value('name');
         return view('result.chart', compact('chartjs'))->with('studentId',$getId)->with('total',$total)->with('getScore',$score)->with('course',$getCourseName)->with('name',$StdName);
          


        
        
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         {
        //
        $getId=auth()->user()->id;
        $getExamCode='PHP5';
        $getCourseName='PHP LARAVEL';
        $getScore=Student::where(
            ['student_id'=>$getId,
             'uniqueid'=>$getExamCode
        ])->value('score');
        $findStudentIdForAnswerSheet=Student::where(
            ['student_id'=>$getId,
             'uniqueid'=>$getExamCode
        ])->value('id');
        $answeredQuestion=Answer::where('stu_id',$findStudentIdForAnswerSheet)->get();
        $StdName=user::where('id',$getId)->value('name');
        return view('result.show')->with('answeredQuestion',$answeredQuestion)->with('getScore',$getScore)->with('studentId',$getId)->with('course',$getCourseName)->with('name',$StdName);
    }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
