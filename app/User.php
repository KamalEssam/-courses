<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','faculty_id','role_id'
    ];

    /**
     *
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role_id'=>'integer',
    ];
// if user role id == 1 he will be admin if user id == 2 he will be STUDENT
    protected const ADMIN = 1;
    protected const STUDENT = 2;
//check if user (admin or student)
    public static function isAdmin($query){
        dd($query->where('role_id', self::ADMIN)->get());
        return $query->where('role_id', self::ADMIN);
    }
    public function isStudent($query){
        return $query->where('role_id', self::STUDENT);
    }
    public function video(){
        return $this->hasMany(video::class);
    }
    public function courseFile(){
        return $this->hasMany(courseFile::class);
    }public function stdIssue(){
        return $this->hasMany(stdIssue::class);
    }
    public function comment(){
        return $this->hasMany(comment::class,'comment_id');
    }
    public function post(){
        return $this->hasMany(post::class,'user_id');
    }
}
