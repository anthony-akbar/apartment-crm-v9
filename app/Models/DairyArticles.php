<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DairyArticles extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'table',
        'category_id',
    ];

    public function records()
    {
        return $this->hasMany(Dairy::class, 'article_id', 'id');
    }
}
