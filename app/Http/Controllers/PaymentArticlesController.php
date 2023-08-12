<?php

namespace App\Http\Controllers;

use App\Models\PaymentArticle;
use Illuminate\Http\Request;

class PaymentArticlesController extends Controller
{
    public function index() {
        $articles = PaymentArticle::all();
        return view('articles.index', compact('articles'));
    }
}
