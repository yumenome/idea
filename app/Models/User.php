<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Idea;
use App\Models\Comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'img',
        'bio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function ideas(){
        return $this->hasMany(Idea::class)->latest();
    }

    public function comments(){
    return $this->hasMany(Comment::class)->latest();
    }

// me get followered
    public function followings(){                                  //follower    followed person
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps();
    }
//me follow
    public function followers(){                         //followeed person   follower
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')->withTimestamps();
    }
//to check followed or not
    public function follows(User $user){
        return $this->followings()->where('user_id', $user->id)->exists();
    }

    public function likeRS(){
        return $this->belongsToMany(Idea::class, 'idea_like')->withTimestamps();
    }

    public function likes(Idea $idea){
        return $this->likeRS()->where('idea_id', $idea->id)->exists();
    }

    public function getImageURL(){
        if($this->img){
            return url('storage/' . $this->img);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
    }

}

