<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable=['comment','post_id','user_id','user_name'];
    protected $casts =['id'=>'integer','post_id'=>'integer'];
    public function post(){
        return $this->belongsTo(post::class,'post_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
