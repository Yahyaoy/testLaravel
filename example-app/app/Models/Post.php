<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
//    protected $fillable =['title','excerpt','body','id'];

protected $with = ['category', 'author']; // to avoid N+1 problem بدل ما في الراوت تعملها بنعملها هان

public function scopeFilter($query, array $filters)
{ // p
    $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
    );

//    if ($filters['search'] ?? false){
//        $query
//            ->where('title', 'like', '%' .request('search') . '%')
//            ->orWhere('body', 'like', '%' .request('search') . '%');
//    }
}
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
