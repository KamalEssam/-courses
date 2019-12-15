<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $fillable=['id','video_url','video_name','video_tag','user_id','faculty_id', ];
    protected $casts=[
        'id'=>'integer',
        'faculty_id'=>'integer',
        'user_id'=>'integer',
    ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function faculty()
    {
        $this->belongsTo(faculty::class );
    }
}
