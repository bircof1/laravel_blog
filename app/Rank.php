<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Parent_;

class Rank extends Model
{
   protected $guarded=[];

   public static function boot(){
        Parent::boot();
        static::saving(function($rank){
            $rank->slug=$rank->name;
        });
   }

   public function users(){
       return $this->hasMany(User::class);
   }
}
