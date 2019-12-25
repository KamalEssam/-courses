<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'user_id',
        'faculty_id',
        'imageName',
        'imagePath',
        'postText'
    ];
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'faculty_id' => 'integer',
        'comment_id' => 'integer',
    ];
    public function user(){
        return $this->belongsTo(user::class,'user_id');
    }
    public function faculty(){
        return $this->belongsTo(faculty::class,'faculty_id');
    }
    public function comment(){
        return $this->hasMany(comment::class,'post_id');
    }

}

