<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function files(){
        return $this->hasMany(Drive::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
