<?php

namespace App\Http\Controllers;

use App\Exports\Dairies;
use App\Models\Dairy;
use App\Models\PaymentArticle;
use App\Models\PaymentCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DairyController extends Controller
{
    public function index()
    {

        $categories = PaymentCategory::all();
        $articles = PaymentArticle::all();
        $dairies = Dairy::all();

        return view('dairy.index', compact('dairies','categories', 'articles'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $data['date'] = Carbon::now()->format('Y-m-d');
        //dd($data);
        if($data['type'] === "newIncome") {
            Dairy::create([
                "article_id" => 24,
                'date'=>$data['date'],
                "amount"=>$data['incomeAmount'],
                "currency"=>$data['incomeCurrency'],
                "description" => $data['incomeDescription'],
                "status"=>1,
                ]);

        }else if($data['type'] === "newOut"){
            Dairy::create([
                'date'=>$data['date'],
               'article_id' => $data['outArticle'],
                'amount'=>$data['outAmount'],
                'currency'=> $data['outCurrency'],
                'description' => $data['outDescription'],
            ]);
        }

        return redirect(route('dairy'));
    }

    public function delete($id)
    {
        Dairy::find($id)->delete();
        return redirect(route('dairy'));
    }

    public function export()
    {
        return Excel::download(new Dairies, 'dairies.xlsx');
    }

    public function search(Request $request)
    {
        $data = $request->all();
        dd($data);
        $date = explode(' - ', $data['range']);
        foreach ($date as $key => $item) {
            $date[$key] = date('Y-m-d', strtotime($item));
        }
        $dairy_som = Dairy::whereBetween('date', [$date[0], $date[1]])
            ->where('currency', $data['currency'])
            ->where('date', 'Like', '%' . $data['search'] . '%')
            ->orWhere('date', 'Like', '%' . $data['search'] . '%')
            ->orWhere('representative', 'Like', '%' . $data['search'] . '%')
            ->orWhere('details', 'Like', '%' . $data['search'] . '%')
            ->orWhere('payment', 'Like', '%' . $data['search'] . '%')
            ->orWhere('description', 'Like', '%' . $data['search'] . '%')
            ->get();
        $dairy_som = $dairy_som->filter(function ($item) use ($data, $date) {
            if ($item->currency === $data['currency'] && $item->date >= $date[0] && $item->date <= $date[1]) {
                return $item;
            }
        });

        $dairy_som_in = $dairy_som->where('details', 'Подочет')->sum('payment');
        $dairy_som_out = $dairy_som->where('details', '!=', 'Подочет')->sum('payment');
        if ($data['currency'] === '$') {
            $dairy_dollar = $dairy_som;
            $dairy_dollar_in = $dairy_som_in;
            $dairy_dollar_out = $dairy_som_out;
            return view('dairy.foreign', compact('dairy_dollar', 'dairy_dollar_in', 'dairy_dollar_out'));

        } else {
            return view('dairy.national', compact('dairy_som', 'dairy_som_in', 'dairy_som_out'));
        }

    }
}
