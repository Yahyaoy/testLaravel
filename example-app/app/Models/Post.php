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

    $query->when($filters['category'] ?? false, fn($query, $category) =>
    //الطريقة الثانية المختصرة هان بدو يتاكد اذا في علاقة تحت معرفها اسمها category
//بعدها بدنا نعمل تحقق
        $query->whereHas('category', fn($query)=>
            $query->where('slug', $category)
        )

// هاد طريقة اولى طويلة نفس مفهوم الداتا بيز بدنا نعمل نستد كويري ولازم نحط كلمة كولمن عشان ما يطلع الاي دي نص
//        $query
//            ->whereExists(fn($query) =>
//                $query->from('categories')
//                      ->whereColumn('categories.id', 'posts.category_id')
//                      ->where('categories.slug', $category)
//            )

//        Two way output in clockwork is
//        SELECT * FROM `posts` WHERE EXISTS (SELECT * FROM `categories` WHERE `posts`.`category_id` = `categories`.`id` and `slug` = 'rem-ut-temporibus-tempora-dolores') ORDER BY `created_at` DESC
    );
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
