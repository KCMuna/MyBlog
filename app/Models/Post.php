<?php

namespace App\Models;
use App\Models\User;
use App\Models\Comment;
use Carbon\Traits\Timestamp;
use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use HasFactory, Likeable;
    use Sluggable;

    protected $fillable=['title','slug','description','image_path','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likedUsers(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function sluggable():array{
        return[
            'slug'=>[
                'source'=>'title'
            ]
            ];
    }
   
}
