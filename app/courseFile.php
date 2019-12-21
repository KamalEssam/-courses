<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courseFile extends Model
{
    protected $fillable=['course_id','fileName','extension','path'];
    protected $casts=[
        'id'=> 'integer',
        'course_id'=> 'integer',
    ];
    public function course()
    {
        return $this->belongsTo(facultyCourse::class,'course_id');
    }
}
