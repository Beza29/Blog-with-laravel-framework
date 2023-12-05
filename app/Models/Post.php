<?php

namespace App\Models;
use App\Models\Catagory;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillabel=[
        'category_id',
'name',
'slug',
'description',
'yt_frame',
'meta_title',
'meta_description',
'meta_keyword',
'status',
'created_by'
    ];

    public function category()
    {
        return $this->belongsTo(Catagory::class, 'category_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'created_by','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id');
    }
}
