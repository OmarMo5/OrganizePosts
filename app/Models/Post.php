<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function imageShow(){
        if($this->image){
            return asset($this->image);
        }
        return asset("default.png");
    }

    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
}
