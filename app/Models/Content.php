<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;
    protected $fillable = ["title",'image','image_side','content','news_id'];

    public function news():BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
