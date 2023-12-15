<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dairy extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public function article() {
        return $this->belongsTo(DairyArticles::class, 'article_id', 'id')->get()[0];
    }
}
