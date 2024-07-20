<?php

namespace App\Models;

use App\Models\News;
use App\Models\Views;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder as QueryBuilder;
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','image'];
    public function news():HasMany
    {
        return $this->hasMany(News::class);
    }
    public function views():HasMany
    {
        return $this->hasMany(Views::class);
    }
    public static function scopeHotCategories(Builder|QueryBuilder $query):Builder|QueryBuilder 
    {
        return $query->withCount('views')->orderBy('views_count');
    } 
    public static function scopeAvailableCategories(Builder|QueryBuilder $query,int $number = 0):Builder|QueryBuilder 
    {
        return $query->withCount('news')->having('news_count', '>',$number)->orderBy('news_count','desc');
    }
}
