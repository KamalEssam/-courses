<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facultyCourse extends Model
{
    protected $fillable = [
        'course_name',
        'course_name'
    ];

    protected $casts=['id'=>'integer','faculty_id'=>'integer'];



    public static function notCompelteCourses($allCourses,$equalized){
        $diff=array_diff($allCourses,$equalized);
        return $diff;
    }
    public static function compelteCourses($allCourses,$equalized){
        $diff=array_intersect($allCourses,$equalized);
        return $diff;
    }

    public static function compelteHours($course){
        $hours=0;
        foreach ($course as $cr) {
            $hour=self::query()->where('course_code',$cr)->pluck('credit_hours');
        $hours=$hours+(int)$hour[0];
       }
        return $hours;
    }


}
