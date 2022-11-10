<?php
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MbCalculate{
    public static function bytesToHuman($bytes){
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for($i = 0; $bytes > 1024; $i++){
            $bytes /= 1024;
        }
        return round($bytes, 2).' '.$units[$i];
    }

    public static function TotalFileSize(){
        $user = User::where('id',Auth::id())->with('files')->first();
        $allFiles = $user->files;
        $fileSizes = [];
        foreach($allFiles as $key=>$file){
            $size = Storage::size('public/myDrive'.$file->new_name);
            $fileSizes[$key] = $size;
        }
        $total = array_sum($fileSizes);
        $value = MbCalculate::bytesToHuman($total);
        return $value;
    }
}
