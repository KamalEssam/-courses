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
    public function filesCourse(){
        return $this->hasMany(filesCourse::class);
    }public function stdIssue(){
        return $this->hasMany(stdIssue::class , 'faculty_id');
    }
}
