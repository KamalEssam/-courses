<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    protected $fillable = [
        'name','id'
    ];

    protected $casts=['id'=>'integer'];
    public function video(){
        return $this->hasMany(video::class , 'faculty_id');
    }
    public function courseFile(){
        return $this->hasMany(courseFile::class,'faculty_id');
    }
    public function post(){
        return $this->hasMany(post::class , 'faculty_id');
    }

}
