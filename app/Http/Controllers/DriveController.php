<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriveRequest;
use App\Http\Requests\UpdateDriveRequest;
use App\Models\Drive;
use App\Models\Folder;
use GuzzleHttp\HandlerStack;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;


class DriveController extends Controller
{
    public function index()
    {
        $drives = Drive::with('user')
            ->where('user_id', Auth::id())
            ->where('folder_id', null)
            ->latest('id')->get();
        $folders =Folder::where('user_id', Auth::id())->latest('id')->get();
        return view('myDrive.index', compact('drives', 'folders'));
    }

    public function create()
    {
    }

    /* public function store(StoreDriveRequest $request)
    {
        $receive = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if(!$receive->isUploaded()){
            return response()->json('Fail To Upload');
        }

        $fileReceived = $receive->receive();
        if($fileReceived->isFinished()){
            $files = $fileReceived->getFile();
            foreach ($files as $key => $file) {
                $drive = new Drive();
                $drive->original_name = $file->getClientOriginalName();
                $drive->new_name = $file->store('public/myDrive');
                if($file->getClientOriginalExtension()){
                    $drive->extension = $file->getClientOriginalExtension();
                }else{
                    $drive->extension = "txt";
                }
                $drive->user_id = Auth::id();
                if($request->folderId){
                    $drive->folder_id = $request->folderId;
                }
                $drive->save();
            }
            return redirect()->route('myDrive.index')->with('status', 'file was upload');
        }
    }*/

    public function store(StoreDriveRequest $request){
        $request->validate([
            'files.*' => 'required|max:2000'
        ]);
        foreach ($request->upload_file as $file) {
            $drive = new Drive();
            $drive->original_name = $file->getClientOriginalName();
            $drive->new_name = $file->store('public/myDrive');
            if($file->getClientOriginalExtension()){
                $drive->extension = $file->getClientOriginalExtension();
            }else{
                $drive->extension = "txt";
            }
            $drive->user_id = Auth::id();
            if($request->folderId){
                $drive->folder_id = $request->folderId;
            }
            $drive->save();
        }
        return redirect()->route('myDrive.index')->with('status', 'file was upload');
    }

    public function show(Drive $drive)
    {

    }

    public function edit(Drive $drive)
    {

    }

    public function update(UpdateDriveRequest $request, Drive $drive)
    {

    }

    public function destroy($id)
    {
        $file = Drive::withTrashed()->find($id)->delete() ;
        return redirect()->back()->with('status','file was delete');
    }
}
