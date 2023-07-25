<?php

namespace App\Http\Controllers;

use App\Exports\Dairies;
use App\Models\Dairy;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DairyController extends Controller
{
    public function index()
    {
        $dairy_som = Dairy::where('currency', 'C')->orderBy('date', 'asc')->get();
        $dairy_som_in = Dairy::where('currency', 'C')->where('details', 'Подочет')->get()->sum('payment');
        $dairy_som_out = Dairy::where('currency', 'C')->where('details', '!=', 'Подочет')->get()->sum('payment');
        $dairy_dollar = Dairy::where('currency', '$')->orderBy('date', 'asc')->get();
        $dairy_dollar_in = Dairy::where('currency', '$')->where('details', 'Подочет')->get()->sum('payment');
        $dairy_dollar_out = Dairy::where('currency', '$')->where('details', '!=', 'Подочет')->get()->sum('payment');

        return view('dairy.index', compact('dairy_som', 'dairy_som_in', 'dairy_som_out', 'dairy_dollar', 'dairy_dollar_in', 'dairy_dollar_out'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $data['date'] = date("Y-m-d", strtotime($data['date']));
        if (array_key_exists('details', $request->all())) {
            Dairy::create($data);
        } else {
            $data['details'] = 'Подочет';
            Dairy::create($data);
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
