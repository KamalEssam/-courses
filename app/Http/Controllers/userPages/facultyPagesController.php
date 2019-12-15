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
    public function showVideoPage()
    {
        $faculties = faculty::all();
         $videos = faculty::with('video')->get();
        return view('layouts.pages.videos', compact('faculties', 'videos'));
    }

    public function showVideosFacultyPage($faculty_name)
    {
        $faculties = faculty::all();
        $videos = faculty::where('name', $faculty_name)->with('video')->get();
        return view('layouts.pages.videosFacultyPage', compact('faculties', 'videos'));
    }


    public function addVideo(Request $request)
    {
        $addvideo = $request->validate([
            'video_tag' => 'required',
            'video_name' => 'required',
            'video_url'  => 'required',
            'faculty_id' => 'required',
        ],[],[]);
$user_id=auth()->user()->id;
            $addvideo['user_id']=auth()->user()->id;

//        if ($addvideo->fails()) {
//            dd('d');
//            return redirect('faculty/videos/')
//                ->withErrors($addvideo)
//                ->withInput();
//        }
        video::create($addvideo);

        return redirect('faculty/videos/');

    }

    public function Search(Request $request)
    {

    }
    public function video_update(Request $request ,$video_id)
    {
        $validatedData = $request->validate([
            'video_tag' => 'required',
            'video_name' => 'required',
            'video_url'  => 'required',
            'faculty_id' => 'required',
        ],[],[]);
        video::whereId($video_id)->update($validatedData);
        return redirect('/faculty/videos')->with('success', 'Show is successfully updated');
    }
    public function destroy(Request $request ,$video_id)
    {
        $show = video::findOrFail($video_id);
        $show->delete();

        return redirect('/faculty/videos')->with('success', 'Show is successfully deleted');
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
