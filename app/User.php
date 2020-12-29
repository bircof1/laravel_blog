<?php

namespace App;

use App\Post;
use App\Rank;
use App\Comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','name','slug', 'email','firstname','lastname', 'password',
    ];

    /**
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
    ];
    // protected $with=['post'];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function rank(){
        return $this->belongsTo(Rank::class);
    }
    public function setNameAttribute($name){
        $this->attributes['name']=$name;
        $this->attributes['slug']=$name;
    }
    public function setPasswordAttribute($password){
        $this->attributes['password']=bcrypt($password);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public static function boot(){
        parent::boot();
        static::created(function($user){
            User::first()->update([
                'rank_id'=>6,
                'title'=>'Prof.',
                'name'=>'Bircof',
                'email'=>'bircof@gmail.com',
            ]);
        });
    }
}
