<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Question;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student= new Student;
        $sIdForValidate=auth()->user()->id;
        $examCodeForValidate='PHP5';
        $initialScore=0;
        $initialTotal=0;
        $initialWrong=0;
        $checker=Student::where('student_id','=',$sIdForValidate)->where('uniqueid','=',$examCodeForValidate)->count();
        if ($checker>0) {
            return "YOU ALREADY DONE THIS EXAM";
        }else{
			$id=11;
			$questions=Question::where('quiz_id',$id)->get();
			$questionsCount = $questions->count();
            $student = Student::create([
            'student_id' => $sIdForValidate,
            'uniqueid' => $examCodeForValidate,
            'score' =>$initialScore,
            'total'=>$questionsCount,
            'wrong_ans'=>$initialWrong
            ]);

            $findtime='5';
            
            $course='PHP LARAVEL';
            $studentRealId=$sIdForValidate;
            $student_id=Student::where('student_id',$studentRealId)->value('id');
          
            
			
            return view('answer.show')->with('questions', $questions)->with('student_id',$student_id)->with('course',$course)->with('time',$findtime);
           
            //return view('welcome');
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
