<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassLevel extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    // create relationship between category classLevel 
    public function categories() : HasMany
    {
        return $this->hasMany(Category::class);
    }
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function classLevels() : HasMany
    {
        return $this->hasMany(Category::class);
    }
    // create relationship between student class 
    public function students() : HasMany
    {
        return $this->hasMany(Student::class);
    }
 
    public function contents() : HasMany
    {
        return $this->hasMany(Content::class);
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
