<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;
    protected $guarded = [];

    // make relationship between  school and teacher 
     public function teachers() : HasMany 
     {
        return $this->hasMany(Teacher::class);
     }
     // make relation between agent and school 

     public function agents() : HasMany
     {
        return $this->hasMany(Agent::class);
     }
     // make relationship between school and student 
     
     public function students() : HasMany
     {
        return $this->hasMany(Student::class);
     }
    public function attrByLocale($locale = 'ar' , $attr = 'name')
    {
        $arr = json_decode($this->getRawOriginal($attr) , true);
        return $arr[$locale];
    }
    
    public function getNameAttribute($value)
    {
        $arr = json_decode($value , true);
        if (app()->isLocale('ar')) {
            return $arr['ar'];
        }else{
            return $arr['en'];
        }
    }

    public function getDescriptionAttribute($value)
    {
        $arr = json_decode($value ,true);
        if (app()->isLocale('ar')) {
            return $arr['ar'];
        }else{
            return $arr['en'];
        }
    }
}
