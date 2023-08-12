<?php

namespace Modules\Safe\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Safe\Entities\Safe;

class SafeController extends Controller
{

    public function index()
    {
        $safe_som = Safe::where('currency', 'C')->get();
        $safe_som_in = Safe::where('currency', 'C')->where('details', 'Ввод')->get()->sum('payment');
        $safe_som_out = Safe::where('currency', 'C')->where('details', 'Вывод')->get()->sum('payment');
        $safe_dollar = Safe::where('currency', '$')->get();
        $safe_dollar_in = Safe::where('currency', '$')->where('details', 'Ввод')->get()->sum('payment');
        $safe_dollar_out = Safe::where('currency', '$')->where('details', 'Вывод')->get()->sum('payment');

        return view('safe::index', compact('safe_som', 'safe_som_in', 'safe_som_out', 'safe_dollar', 'safe_dollar_in', 'safe_dollar_out'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['details'] = 'Ввод';
        Safe::create($data);
        return redirect()->route('safe.index');
    }

    public function get(Request $request)
    {
        $data = $request->all();
        dd($data);
        $data['details'] = 'Вывод';
        Safe::create($data);
        return redirect()->route('safe.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Safe::find($id)->delete();
        return redirect()->route('safe.index');
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $date = explode(' - ', $data['range']);
        foreach ($date as $key => $item) {
            $date[$key] = date('Y-m-d', strtotime($item));
        }
        $safe_som = Safe::whereBetween('date', [$date[0], $date[1]])
            ->where('currency', $data['currency'])
            ->where('date', 'Like', '%' . $data['search'] . '%')
            ->orWhere('date', 'Like', '%' . $data['search'] . '%')
            ->orWhere('representative', 'Like', '%' . $data['search'] . '%')
            ->orWhere('details', 'Like', '%' . $data['search'] . '%')
            ->orWhere('payment', 'Like', '%' . $data['search'] . '%')
            ->orWhere('description', 'Like', '%' . $data['search'] . '%')
            ->get();
        $safe_som = $safe_som->filter(function ($item) use ($data, $date) {
            if ($item->currency === $data['currency'] && $item->date >= $date[0] && $item->date <= $date[1]) {
                return $item;
            }
        });

        $safe_som_in = $safe_som->where('details', 'Подочет')->sum('payment');
        $safe_som_out = $safe_som->where('details', '!=', 'Подочет')->sum('payment');
        if ($data['currency'] === '$') {
            $safe_dollar = $safe_som;
            $safe_dollar_in = $safe_som_in;
            $safe_dollar_out = $safe_som_out;
            return view('safe::foreign', compact('safe_dollar', 'safe_dollar_in', 'safe_dollar_out'));

        } else {
            return view('safe::national', compact('safe_som', 'safe_som_in', 'safe_som_out'));
        }

    }
}
