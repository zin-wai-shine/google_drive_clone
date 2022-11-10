<?php

namespace App\Http\Controllers;

use App\Http\Resources\FileResource;
use App\Models\Drive;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use function PHPUnit\Framework\isNull;

class FileApiController extends Controller
{

    public function index()
    {
        $files = Drive::where('user_id', Auth::id())->where('folder_id', null)->latest('id')->get();
        return FileResource::collection($files);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|max:2000'
        ]);

          if($request->hasFile("files")){
              foreach ($request->file('files') as $file) {
                  $drive = new Drive();
                  $drive->original_name = $file->getClientOriginalName();
                  $drive->new_name = $file->store('public/myDrive');
                  if($file->getClientOriginalExtension()){
                      $drive->extension = $file->getClientOriginalExtension();
                  }
                  $drive->user_id = Auth::id();
                  if($request->folderId){
                      $drive->folder_id = $request->folderId;
                  }
                  $drive->save();
              }
              return response()->json(['message' => ' files was upload ✅'], 200);
          }

            return response()->json(["message" => 'server error ❎'], 500);

       /* $receive = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
        if(!$receive->isUploaded()){
            return response()->json(' fail to upload ❎');
        }

        $fileReceived = $receive->receive();
        if($fileReceived->isFinished()){
            $getFile = $fileReceived->getFile();
            foreach ($getFile->files as $key => $file) {
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
                return response()->json(['message' => ' file was upload ✅', 'file' => $drive], 200);
            }
        }

        return response()->json(['message' => ' something wrong ❎'], 500);*/
    }


    public function show($id)
    {
        $file = Drive::find($id);
        if(is_null($file)){
            return response()->json(['message' => ' File Not Found ❎'], 404);
        }
        return new FileResource($file);
    }


    public function edit(Drive $drive)
    {

    }


    public function update(Request $request, Drive $drive)
    {

    }


    public function destroy($id)
    {
        $file = Drive::find($id);
        if(is_null($file)){
            return response()->json(['message' => ' File Not Found ❎'], 404);
        }
        $file->delete();
        return response()->json(['message' => ' file was delete ✅'], 200);
    }
}
