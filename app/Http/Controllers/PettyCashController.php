<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PettyCashController extends Controller
{

    public function index()
    {
        $title = "Petty Cash";

        return view('daily-reports.pettycash.index', compact('title'));
    }

    public function dataGet()
    {
        return DataTables::of(PettyCashController::all())
            ->make(true);
    }
}
