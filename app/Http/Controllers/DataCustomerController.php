<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\Customer;
use App\Models\CustomerFinancial;
use App\Models\File;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataCustomerController extends Controller
{
    public function index()
    {
        $title = "Data Customer";
        $currencies = Currencies::get();

        return view('data-master.datacustomer.index', compact('title', 'currencies'));
    }

    public function getData()
    {
        $data = Customer::all();

        return DataTables::of($data)
            // ->addColumn('action', function ($data) {
            // })
            ->editColumn('type', function ($data) {
                return 'Pelanggan';
            })
            ->editColumn('funding', function ($data) {
                return '0';
            })
            // ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'npwp_or_ktp' => 'required|string',
            'file' => 'required|file',
            'financialFields.*' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->address = $validatedData['address'];
        $customer->email = $validatedData['email'];
        $customer->telephone = $validatedData['telephone'];
        $customer->npwp_or_ktp = $validatedData['npwp_or_ktp'];

        $customer->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/files', $fileName);

            $fileModel = new File();
            $fileModel->model_type = Customer::class;
            $fileModel->model_id = $customer->id;
            $fileModel->name = $fileName;
            $fileModel->path = $fileName;

            $fileModel->save();
        }

        $financialFields = [];
        $currencyFields = [];

        $requestData = $request->all();
        foreach ($requestData as $key => $value) {
            if (strpos($key, 'financialField') === 0) {
                $index = substr($key, strlen('financialField'));
                $financialFields[$index] = $value;
            } elseif (strpos($key, 'currencyField') === 0) {
                $index = substr($key, strlen('currencyField'));
                $currencyFields[$index] = $value;
            }
        }

        foreach ($financialFields as $index => $financialField) {

            $currencyInitial = $currencyFields[$index] ?? null;
            if ($currencyInitial) {
                $currency = Currencies::where('initial', $currencyInitial)->first();
                if ($currency) {

                    $customerFinancial = new CustomerFinancial();
                    $customerFinancial->customer_id = $customer->id;
                    $customerFinancial->currency_id = $currency->id;
                    $customerFinancial->amount = $financialField;

                    $customerFinancial->save();
                } else {
                    // Handle currency not found (optional)
                }
            } else {
                // Handle missing or invalid currency data
            }
        }

        return redirect()->back()->with('success', 'Customer added successfully');
    }
}
