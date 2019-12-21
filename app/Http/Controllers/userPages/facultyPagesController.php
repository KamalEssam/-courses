<?php

namespace App\Http\Controllers\userPages;

use App\courseFile;
use App\faculty;
use App\Http\Controllers\Controller;
use App\User;
use App\video;
use Couchbase\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class facultyPagesController extends Controller
{
    ///video part
    ///
    /// please look again for constructor for faculties Navbar calling
//     public function __construct()
//        {
//
//
//        }
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
            'video_url' => 'required',
            'faculty_id' => 'required',
        ], [], []);
        $user_id = auth()->user()->id;
        $addvideo['user_id'] = auth()->user()->id;

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
        $faculties = faculty::all();
        $videoSearch = $request['videoSearch'];
        $searchRes = video::where('video_tag', 'LIKE', '%' . $videoSearch . '%')->orWhere('video_name', 'LIKE', '%' . $videoSearch . '%')->get();
        if (count($searchRes) > 0)
            return view('/layouts/pages/videoSearch', compact('faculties'))->withDetails($searchRes)->withQuery($videoSearch);
        else
            return view('/layouts/pages/videoSearch', compact('faculties'))->withDetails([])->withMessage('No Details found. Try to search again !')->withQuery($videoSearch);
    }

    public function video_update(Request $request, $video_id)
    {
        $validatedData = $request->validate([
            'video_tag' => 'required',
            'video_name' => 'required',
            'video_url' => 'required',
            'faculty_id' => 'required',
        ], [], []);
        video::whereId($video_id)->update($validatedData);
        return redirect('/faculty/videos')->with('success', 'Show is successfully updated');
    }

    public function destroy(Request $request, $video_id)
    {
        $show = video::findOrFail($video_id);
        $show->delete();

        return redirect('/faculty/videos')->with('success', 'Show is successfully deleted');
    }


//file part

    public function getFilePage()
    {
        $faculties = faculty::all();
        $dir = config('app.DestinationPath');
        $files = Storage::files($dir . "uploads");
        return view('layouts.pages.files', compact('faculties', 'files'));
    }

    public function upload(Request $request)
    {
        // dd(Validator::make(request()->all(),['file'  => 'required|mimes:doc,docx,pdf,txt|max:10000']));
        request()->validate([
            'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
        ]);
        //  dd($request->file('file'));
        if ($files = $request->file('file')) {
            $files = $request['file'];
            $name = $files->getClientOriginalName();
            $ext = $files->getClientOriginalExtension();
            $size = $files->getSize();
            $mim = $files->getMimeType();
            $realPath = $files->getRealPath();
            $path = $files->storeAs('/uploads', $name);
            $storeFile = courseFile::create([
                'fileName' => $name,
                'path' => $path,
                'extension' => $ext,
                'course_id' => 1,
            ]);
            $files=courseFile::get()->all();
            return redirect("faculty/files",compact('files'))->withMessage('Great! file has been successfully uploaded.');
        }
        return redirect("faculty/files")->withErrors("upload failed");

    }

    public function deleteFile(Request $request)
    {

    }

    public function download(Request $request)
    {
        $dir = config('app.DestinationPath');
        $files = Storage::files($dir);
        return view('layouts.pages.files', compact('files'));

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
