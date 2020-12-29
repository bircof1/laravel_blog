<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','slug'];
    public function posts(){
       return $this->hasMany(Post::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function($category){
            $category->slug=$category->name;
        });

        static::deleting(function($category){
            $category->posts->each->delete();
        });
    }

    // public function setNameAttribute($name){
    //     $this->attributes['name']=$name;
    //     $this->attributes['slug']=$name;
    // }

}
