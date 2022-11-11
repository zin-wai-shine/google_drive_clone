<?php

namespace App\Http\Controllers;

use App\Http\Resources\FolderResource;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderApiController extends Controller
{

    public function index()
    {
        $folders =Folder::where('user_id', Auth::id())->latest('id')->get();
        return FolderResource::collection($folders);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required'
        ]);

        $folder = new Folder();
        $folder->name = $request->name;
        $folder->user_id = Auth::id();
        $folder->save();
        return response()->json(['message' => 'folder was created ✅'], 200);
    }

    public function show($id)
    {
        $folder = Folder::find($id);
        if(is_null($folder)){
            return response()->json(['message'=>'folder not found ❎']);
        }
        return new FolderResource($folder);
    }

    public function edit(Folder $folder)
    {

    }


    public function update(Request $request, Folder $folder)
    {

    }

    public function destroy(Folder $folder)
    {

    }
}
