<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    // create relationship 

   public  function school() : BelongsTo
    {
        return $this->belongsTo(School::class);
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
