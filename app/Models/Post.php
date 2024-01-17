<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

//    protected $fillable= ['title', 'excerpt', 'body'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters){
        $query
            ->when($filters['search'] ?? false, fn ($query, $search)=>
            $query->where(fn($query)=>
                $query->where('title', 'like', '%'. $search . '%' )
                ->orWhere('body',  'like', '%'. $search . '%')
            ) );

        $query
            ->when($filters['category'] ?? false, fn ($query, $category)=>
            $query->whereHas('category',fn($query) =>$query->where('slug', $category))
            );
//            $query
//            ->whereExists(fn($query)=>
//            $query->from('categories')
//                ->whereColumn('categories.id', 'post.category_id')
//                ->where('categories.slug', $category))
//            );

        $query
            ->when($filters['user'] ?? false, fn ($query, $user)=>
            $query->whereHas('user',fn($query) =>$query->where('username', $user    ))
            );
    }
}
