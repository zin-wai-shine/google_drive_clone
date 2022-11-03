<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    protected $with = ['user'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
