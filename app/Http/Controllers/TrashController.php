<?php

namespace App\Http\Controllers;

use App\Models\Drive;
use App\Models\Folder;
use Illuminate\Http\Request;

class TrashController extends Controller
{
        public function index(){
            $drives = Drive::onlyTrashed()->where("folder_id" , null)->latest('id')->get();
            $folders = Folder::onlyTrashed()->latest('id')->get();

            return view('trash.index', compact('drives', 'folders'));
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
            $file = Drive::onlyTrashed()->findOrFail($id)->forceDelete();
            return redirect()->back()->with('status', 'file was delete');
        }
        public function fileForceRestore($id){
            $file = Drive::withTrashed()->findOrFail($id)->restore();
            return redirect()->back()->with('status', 'file was restore ✅');
        }

        public function folderForceDelete($id){
            $folder = Folder::onlyTrashed()->findOrFail($id)->forceDelete();
            return redirect()->route('drive.trash')->with('status', 'folder was delete');
        }
        public function folderForceRestore($id){
            $folder = Folder::withTrashed()->findOrFail($id);
            $files = Drive::withTrashed()->where('folder_id',$folder->id)->get();
            foreach ($files as $file) {
                $file->restore();
            }
            $folder->restore();
            return redirect()->route("drive.trash")->with('status', 'folder was restore');
        }

}
