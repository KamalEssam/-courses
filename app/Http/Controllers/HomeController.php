<?php

namespace App\Http\Controllers;

use App\faculty;
use App\facultyCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;
use mysql_xdevapi\CollectionModify;

class HomeController extends Controller
{

    public function index(){
        $faculties=faculty::all();
    	return view('home',compact('faculties'));
    }

     public function home(){
         $faculties=faculty::all();
    	return view('layouts.home',compact('faculties'));
    }
    public function facultyMaterials(){
        $faculties=faculty::all();
        return view('layouts.faculties',compact('faculties'));
    }
//    public function facultyCourse($faculty_id){
//        $faculties=faculty::all();
//        $id=$faculty_id;
//        $courses=facultyCourse::where('faculty_id',$faculty_id)->get();
//        return view('layouts.equalization',compact('courses','id','faculties'));
//    }




    public function blog(){
        $faculties=faculty::all();
    	return view('layouts.blog',compact('faculties'));
    }
    public function blogsingle(){
        $faculties=faculty::all();
    	return view('layouts.blog-single',compact('faculties'));
    }
    public function courses(){
        $faculties=faculty::all();
    	return view('layouts.courses',compact('faculties'));
    }public function coursesingle(){
    $faculties=faculty::all();
    	return view('layouts.course-single',compact('faculties'));
    }
    public function contactus(){
        $faculties=faculty::all();
    	return view('layouts.contact',compact('faculties'));
    }

	public function about(){
        $faculties=faculty::all();
    	return view('layouts.about',compact('faculties'));
    }
    public function login(){
    	return view('layouts.login');
    }
    public function register(){
    	return view('layouts.register');
    }

    public function equalized(Request $request ,$id){
        $name=$request['name'];
        $courses=$request['courses'];

        $faculties=faculty::all();

        $faculty_courses_code=facultyCourse::where('faculty_id',$id)->pluck('course_code')->toArray();
        $course_hours=facultyCourse::where('faculty_id',$id)->pluck('course_code','credit_hours')->toArray();
        $faculty_course_hours=facultyCourse::get('credit_hours')->all();
        $All_course_hours=facultyCourse::where('faculty_id',$id)->sum('credit_hours');

        $notCom=facultyCourse::notCompelteCourses($faculty_courses_code,$courses);
        $Completed=facultyCourse::compelteCourses($faculty_courses_code,$courses);

        $course_hours=facultyCourse::compelteHours($courses);
      //  $Allcourse_hours=facultyCourse::compelteHours($All_course_hours);

    	return view('layouts.result',compact('courses','notCom','Completed','course_hours','All_course_hours','faculties'));
    }


public function getFacultyCourse($id)
{
    $faculties=faculty::all();
    $facultyCourses=facultyCourse::where('faculty_id',$id)->get()->all();
   return view('layouts.FacultyCourses',compact('facultyCourses','faculties'));
}

}
