<?php

namespace App\Http\Controllers\userPages;

use App\faculty;
use App\Http\Controllers\Controller;
use App\User;
use App\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class facultyPagesController extends Controller
{
    public function showVideoPage(){
        $faculties=faculty::all();
        return view('layouts.pages.videos',compact('faculties'));
    }

    public function showVideosFacultyPage($faculty_name){
        $faculties=faculty::all();
        $videos=faculty::where('name',$faculty_name)->with('video')->get() ;

        return view('layouts.pages.videosFacultyPage',compact('faculties','videos'));
    }


    public function Search(Request $request)
    {

    }
    public function addVideo(Request $request)
    {
        $addvideo=$request->validate([
            'video_tage'=>'required',
            'video_name'=>'required',
            'video_url'=>'required',
            'faculty_id'=>'required',
            'user_id'=>'required',
        ],[],[
            'video_tage'=>'this filed is required',
            'video_name'=>'this filed is required',
            'video_url'=>'this filed is required',
            'faculty_id'=>'this filed is required',
            'user_id'=>'this filed is required',
        ]);
        dd($addvideo);
        video::create($addvideo);
        return redirect('faculty/videos');

    }









    //this part i have to get back for it to separate it to admin and user
//    public function SearchOraddUrl(Request $request)
//    {
//        switch ($request->input('action')) {
//            case 'search':
//                // Save model
//                break;
//
//            case 'upload':
//                // Preview model
//                break;
//
//
//
//        }
//    }
}
