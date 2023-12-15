<?php

namespace App\Http\Controllers;

use App\Models\DairyArticles;
use App\Models\PaymentArticle;
use App\Models\PaymentCategory;
use Illuminate\Http\Request;

class PaymentArticlesController extends Controller
{
    public function index() {
        $articles = DairyArticles::all();
        $categories = PaymentCategory::all();
        return view('articles.index', compact('articles', 'categories'));
    }
}
