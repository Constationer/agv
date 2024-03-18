<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataAccountController extends Controller
{
    public function index()
    {
        $title = "Data Account";

        return view('data-master.dataaccount.index', compact('title'));
    }

    public function getData()
    {
        $data = BankAccount::all();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code'      => 'required|string',
            'name'      => 'required|string',
        ]);

        $currency = new BankAccount();
        $currency->code  = $validatedData['code'];
        $currency->name     = $validatedData['name'];

        $currency->save();

        return redirect()->back()->with('success', 'Bank Account added successfully');
    }
}
