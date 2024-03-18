<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataCurrenciesController extends Controller
{
    public function index()
    {
        $title = "Data Currency";

        return view('data-master.datacurrency.index', compact('title'));
    }

    public function getData()
    {
        $data = Currencies::all();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'initial'  => 'required|string',
            'name'      => 'required|string',
        ]);

        $currency = new Currencies();
        $currency->initial  = $validatedData['initial'];
        $currency->name     = $validatedData['name'];

        $currency->save();

        return redirect()->back()->with('success', 'Currency added successfully');
    }
}
