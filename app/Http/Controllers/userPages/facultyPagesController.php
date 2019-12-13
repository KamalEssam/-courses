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
        $videos=video::all() ;
        return view('layouts.pages.videos',compact('faculties','videos'));
    }

    public function showVideosFacultyPage($faculty_name){
        $faculties=faculty::all();
        $videos=faculty::where('name',$faculty_name)->with('video')->get() ;
        return view('layouts.pages.videosFacultyPage',compact('faculties','videos'));
    }


    public function addVideo(Request $request)
    {
        dd($addvideo=$request->validate([
            'video_tage'=>'required',
            'video_name'=>'required',
            'video_url'=>'required',
            'faculty_id'=>'required',
        ]));
                dd($addvideo);

        video::create($addvideo);
        return redirect('faculty/video/');

    }
    public function addVideoget(Request $request)
    {

        return redirect('faculty/video/it');

    }

    public function Search(Request $request)
    {

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
