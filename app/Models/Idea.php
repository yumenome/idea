<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory;
                        //for eager loading
    protected $with = ['user', 'comments.user'];


    protected $fillable = [
        'user_id',
        'content',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likeRS(){
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }
}
