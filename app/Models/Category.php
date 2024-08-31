<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    // create relationship between class category
    public function classLevels() : HasMany
    {
        return $this->hasMany(ClassLevel::class);
    }
    public function categories() : HasMany
    {
        return $this->hasMany(Category::class , 'class_id');
    }
    public function contents() : HasMany
    {
        return $this->hasMany(Content::class);
    }
    public function classlevel() : BelongsTo
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
