<?php

namespace App\Http\Controllers\userPages;

use App\courseFile;
use App\faculty;
use App\Http\Controllers\Controller;
use App\Http\Traits\FileTrait;
use App\post;
use App\User;
use App\video;
use Couchbase\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class facultyPagesController extends Controller
{
    use FileTrait;
    //this is video part contain all video CRUDs and search functions
    //here we get all videos
    public function showVideoPage()
    {
        $faculties = faculty::all();
        $videos = faculty::with('video')->get();
        return view('layouts.pages.videos.videos', compact('faculties', 'videos'));
    }

    //here we can all video page for specific faculty
    public function showVideosFacultyPage($faculty_name)
    {
        $faculties = faculty::all();
        $videos = faculty::where('name', $faculty_name)->with('video')->get();
        return view('layouts.pages.videos.videosFacultyPage', compact('faculties', 'videos'));
    }

    // add
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

    //search using name and tag
    public function Search(Request $request)
    {
        $faculties = faculty::all();
        $videoSearch = $request['videoSearch'];
        $searchRes = video::where('video_tag', 'LIKE', '%' . $videoSearch . '%')->orWhere('video_name', 'LIKE', '%' . $videoSearch . '%')->get();
        if (count($searchRes) > 0)
            return view('/layouts/pages/videos/videoSearch', compact('faculties'))->withDetails($searchRes)->withQuery($videoSearch);
        else
            return view('/layouts/pages/videos/videoSearch', compact('faculties'))->withDetails([])->withMessage('No Details found. Try to search again !')->withQuery($videoSearch);
    }

    //update
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

    //delete video
    public function destroy(Request $request, $video_id)
    {
        $show = video::findOrFail($video_id);
        $show->delete();
        return redirect('/faculty/videos')->with('success', 'Show is successfully deleted');
    }

//this's file part
    public function getFilePage()
    {
        $courseFiles = courseFile::get()->all();
        $faculties = faculty::all();
        $dir = config('app.DestinationPath');
        $files = Storage::files($dir . "uploads");
        return view('layouts.pages.files.files', compact('faculties', 'courseFiles', 'files'));
    }
//upload file part
    public function upload(Request $request)
    {
        // dd(Validator::make(request()->all(),['file'  => 'required|mimes:doc,docx,pdf,txt|max:10000']));
        request()->validate(['file' => 'required|mimes:doc,docx,pdf,txt|max:2048',]);
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
                'course_id' => $request['faculty_id'],
            ]);

            return redirect("faculty/files")->withMessage('Great! file has been successfully uploaded.');
        }
        return redirect("faculty/files")->withErrors("upload failed");
    }
//here for download file
    public function download($id)
    {
        $file = courseFile::find($id);
        return Storage::download($file->path, $file->fileName);

    }
//here delete file
    public function deleteFile(Request $request, $file_id)
    {
        $file = courseFile::findOrFail($file_id);
        $file->delete();
        return redirect('/faculty/files')->with('message', 'File is successfully deleted');
    }

//search
    public function SearchFile(Request $request)
    {
        $faculties = faculty::all();
        $fileSearch = $request['fileSearch'];
        $searchRes = courseFile::where('fileName', 'LIKE', '%' . $fileSearch . '%')->orWhere('extension', 'LIKE', '%' . $fileSearch . '%')->get();
        if (count($searchRes) > 0)
            return view('layouts.pages.files.fileSearch', compact('faculties'))->withDetails($searchRes)->withQuery($fileSearch);
        else
            return view('layouts.pages.files.fileSearch', compact('faculties'))->withDetails([])->withMessage('No Details found. Try to search again !')->withQuery("");
    }

//get files for faculty
    public function getFacultyFilePage($faculty_name)
    {
        $faculties = faculty::all();
        $allFiles= faculty::where('name', $faculty_name)->with('courseFile')->get();
        return view('layouts.pages.files.facultyFiles', compact('faculties', 'allFiles'));
    }

/*
 * End of file page functions
 * */

public function getPostsPage()
{
    $faculties = faculty::all();
    $posts=post::with('user','faculty')->get()->all();

    return view('layouts.pages.studentForms.stdForm', compact('faculties','posts'));
}

public function storePost(Request $request)
{
    $data=request()->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'postText'=>'required'
    ]);
    $files = $request['image'];
    $name = $files->getClientOriginalName();
    $ext = $files->getClientOriginalExtension();
    $size = $files->getSize();
    $mim = $files->getMimeType();
    $realPath = $files->getRealPath();
    $path = $files->storeAs('/public/image', $name);
        $storePost = post::create([
        'imageName' => $name,
        'imagePath' => $path,
        'postText' => $request['postText'],
        'user_id' => auth()->user()->id,
        'faculty_id' => auth()->user()->faculty_id,
    ]);
    return back()->with('success','You have successfully added new post.');

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
