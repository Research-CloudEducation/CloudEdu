<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Authenticatable 
{
    use HasFactory;
    protected $guarded = [];

    // create relationship between student and school

    public function school() : BelongsTo
    {
        return $this->belongsTo(School::class);
    }
    // create relationship between student and class-level 

    public function classLevel() : BelongsTo
    {
        return $this->belongsTo(ClassLevel::class , 'class_id');
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
