<?php

namespace App\Http\Controllers;

use Auth;
use App\Rating;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Rating::orderBy('updated_at', 'desc')->get();
        $totalRatings = $this->totalRatings($ratings)[0];
        $totalStudents = $this->totalRatings($ratings)[1];
        if(!Auth::guest()){
            $userRating = Rating::where('user_id', Auth::user()->id)->get();
            return view('teacher', compact('ratings', 'totalRatings', 'totalStudents', 'userRating'));
        }else{
            return view('teacher', compact('ratings', 'totalRatings', 'totalStudents'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rating = new Rating([
            'user_id' => auth()->user()->id,
            'rating' =>$request->rating,
            'review' => $request->review,
            'user_name' => auth()->user()->name,
            'lessoncount' => $request->lessoncount,
            'language' => $request->language
        ]);

        $rating ->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    public function totalRatings($ratings)
    {
        $lessons = 20;
        $fiverate = 0;
        $fourrate = 0;
        $threerate = 0;
        $tworate = 0;
        $onerate = 0;
        $studentcount = 0;
        foreach ($ratings as $rating) {
            switch ($rating->rating) {
               case 5:
                   $fiverate +=1;
                   break;
                case 4:
                   $fourrate +=1;
                   break;
                case 3:
                   $threerate +=1;
                   break;
                case 2:
                   $tworate +=1;
                   break;
                case 1:
                   $onerate +=1;
                   break;
                default:
                   $fiverate;
                   $fourrate;
                   $threerate;
                   $tworate;
                   $onerate;
                   break;
            }
            $studentcount++;
        }
        if ($studentcount > 0) {
            $totalRatings = (($fiverate*5)+($fourrate*4)+($threerate*3)+($tworate*2)+($onerate*1))/$studentcount;
        } else {
            $totalRatings = 0;
        }
        

        return array($totalRatings, $studentcount);
    }
}
