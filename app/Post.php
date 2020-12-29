<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['category_id','title','slug','body'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $with=['user','category',];
    // public function path(){
    //     return "/post/$this->id";
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
    // public static function boot(){
    //     parent::boot();
    //     static::creating(function($post){
    //         $post->slug=$post->title;
    //     });
    // }

    public static function boot(){
        parent::boot();
        static::created(function($post){
            $post->update([
                'slug'=>("p-{$post->id}-{$post->title}"),
            ]);
        });
    }
    public function category(){
        return $this->belongsTo(Category::class);
     }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // public function getBodyAttribute($body){
    //     return $this->attributes['body']=str_limit($body, 150);
    // }
}
