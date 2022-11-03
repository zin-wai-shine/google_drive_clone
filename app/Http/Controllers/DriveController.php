<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriveRequest;
use App\Http\Requests\UpdateDriveRequest;
use App\Models\Drive;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drives = Drive::with('user')
            ->where('user_id', Auth::id())
            ->where('folder_id', null)
            ->latest('id')->get();
        $folders =Folder::where('user_id', Auth::id())->latest('id')->get();
        return view('myDrive.index', compact('drives', 'folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDriveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriveRequest $request)
    {
        foreach ($request->upload_file as $key => $file) {
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
        return redirect()->back()->with('status', 'file was upload');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function show(Drive $drive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function edit(Drive $drive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriveRequest  $request
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriveRequest $request, Drive $drive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drive $drive)
    {
        //
    }
}
