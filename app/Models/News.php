<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title',"main_image","text","category_id","user_id"];
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function contents():HasMany
    {
        return $this->hasMany(Content::class);
    }
    public function views():HasMany
    {
        return $this->hasMany(Views::class);
    }
    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'news_tags','news_id','tag_id');
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder | QueryBuilder
    {
        return $query->when($filters['keyword'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('text', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function($query) use($search) {
                        $query->where('name','like','%'. $search .'%');
                    });
            });
        });
    }

    public static function scopeLastDaysPopularNews(Builder|QueryBuilder $query, $startDate):Builder|QueryBuilder
    {
        return $query->withCount(['views' => function ($query) use ($startDate){
            $query->where('created_at','>=', $startDate);
        }])->orderByDesc('views_count');
    }

}
