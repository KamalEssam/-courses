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
        return $this->hasMany(courseFile::class,'course_id');
    }
    public function stdIssue(){
        return $this->hasMany(stdIssue::class , 'faculty_id');
    }
}
