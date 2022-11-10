<?php

namespace App\Http\Controllers;

use App\helpers\MbCalculate;
use App\Http\Resources\FileResource;
use App\Models\Drive;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MoreStatusApiController extends Controller
{
        public function fileCopy($id){
            $file = Drive::find($id);
            if(is_null($file)){
                return response()->json(['message' => 'file was not found ❎'], 404);
            }
            $drive = new Drive();
            $drive->original_name = $file->original_name;
            $drive->new_name = $file->new_name;
            $drive->extension = $file->extension;
            $drive->user_id = Auth::id();
            $drive->folder_id = $file->forder_id;
            $drive->save();

            return new FileResource($drive);
        }

        public function fileDownload($id){
            $file = Drive::find($id);
            if(is_null($file)){
                return response()->json(['message' => 'file was not found ❎'], 404);
            }
            return Storage::download($file->new_name, $file->original_name);
        }

        public function uploadFolder(Request $request){

                $folder = new Folder();
                $folder->name = $request->folder_name;
                $folder->user_id = Auth::id();
                $folder->save();

            $request->validate([
                'folder_child.*' => 'required|max:2000'
            ]);

            foreach($request->file('folder_child') as $child){
                    $drive = new Drive();
                    $drive->original_name = $child->getClientOriginalName();
                    $drive->new_name = $child->store('public/myDrive');
                    if($child->getClientOriginalExtension()){
                        $drive->extension = $child->getClientOriginalExtension();
                    }else{
                        $drive->extension = "txt";
                    }
                    $drive->user_id = Auth::id();
                    $drive->folder_id = $folder->id;
                    $drive->save();
                }

                return response()->json([
                        'message' => 'folder was upload'
                        ], 200);
        }

        public function totalFileSize(){
            return response()->json(['totalFileSize' => MbCalculate::totalFileSize()], 200);
        }
}
