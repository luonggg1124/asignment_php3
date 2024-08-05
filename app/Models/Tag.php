<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function views():HasMany
    {
        return $this->hasMany(Views::class);
    }
    public function news():BelongsToMany
    {
        return $this->belongsToMany(News::class,'news_tags','tag_id','news_id');
    }
    
   
}
