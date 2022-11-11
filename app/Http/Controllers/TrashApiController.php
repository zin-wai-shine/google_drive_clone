<?php

namespace App\Http\Controllers;

use App\Http\Resources\FileResource;
use App\Http\Resources\FolderResource;
use App\Models\Drive;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrashApiController extends Controller
{
    public function files(){
        $drives = Drive::onlyTrashed()->where("folder_id" , null)->latest('id')->get();
        return FileResource::collection($drives);
    }

    public function folders(){
        $folders = Folder::onlyTrashed()->latest('id')->get();
        return FolderResource::collection($folders);
    }

    public function trashFolderFile($id){
        $folder = Folder::onlyTrashed()->where('id', $id)->first();
        $getFolder = Folder::onlyTrashed()->with('files')
            ->where('id', $folder->id)
            ->where('user_id', $folder->user_id)
            ->first();
        $files = Drive::onlyTrashed()->where('folder_id', $getFolder->id)->get();
        return view('trash.file', compact('getFolder', 'files'));
    }

    public function fileForceDelete($id){
        $file = Drive::onlyTrashed()->find($id);
            if(is_null($file)){
                return response()->json(['message' => ' File Not Found ❎'], 404);
            }
        $file->forceDelete();
        return response()->json(['message' => 'file was deleted']);
    }
    public function fileForceRestore($id){
        $file = Drive::withTrashed()->find($id);
            if(is_null($file)){
                return response()->json(['message' => ' File Not Found ❎'], 404);
            }
        $file->restore();
        return response()->json(['message' => 'file was restore ✅', 'data' => new FileResource($file)]);
    }

    public function folderForceDelete($id){
        $folder = Folder::onlyTrashed()->find($id);
            if(is_null($folder)){
                return response()->json(['message' => ' Folder Not Found ❎'], 404);
            };
        $folder->forceDelete();
        return response()->json(['message' => 'folder was deleted ✅']);
    }
    public function folderForceRestore($id){
        $folder = Folder::onlyTrashed()->find($id);
            if(is_null($folder)){
                return response()->json(['message' => ' Folder Not Found ❎'], 404);
            };
        $files = Drive::withTrashed()->where('folder_id',$folder->id)->get();
        foreach ($files as $file) {
            $file->restore();
        }
        $folder->restore();
        return response()->json(['message' => 'folder was restored ✅', 'data' => new FolderResource($folder)]);
    }

}
