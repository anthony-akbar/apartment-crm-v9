<?php

namespace App\Http\Controllers;

use App\Models\PaymentArticle;
use App\Models\PaymentCategory;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function dashboard()
    {
        $categories = PaymentCategory::all();
        return view('report.dashboard', compact('categories'));
    }

    public function index()
    {

        $categories = PaymentCategory::all();
        return view('report.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['type'] === 'newArticle') {
            PaymentArticle::create([
                'title' => $data['article'],
                'category_id' => $data['paymentCategory'],
            ]);
        } else if ($data['type'] === 'newCategory') {
            PaymentCategory::create([
                'title' => $data['categoryTitle'],
            ]);
        }
        return redirect()->route('settings.report');
    }
}
