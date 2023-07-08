<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
//    protected $fillable =['title','excerpt','body','id'];

//protected $with = ['category', 'author']; // to avoid N+1 problem بدل ما في الراوت تعملها بنعملها هان

public function category(){
    return $this->belongsTo(Category::class);
}

public function author(){
    return $this->belongsTo(User::class, 'user_id');
}
public function getRouteKeyName()
{
//    return 'slug';
}
}
