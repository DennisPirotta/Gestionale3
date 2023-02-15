<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Tables\Customers;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\Facades\Toast;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index',[
            'customers' => Customer::all(),
            'customers_table' => Customers::class
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Customer::query()->create([
            'name' => $request->get('name')
        ]);
        Toast::success('Cliente creato con successo');
        return back();
    }

    public function delete(Customer $customer)
    {
        $customer->delete();
        Toast::success('Cliente eliminato con successo');
        return back();
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit',[
            'customer' => $customer
        ]);
    }
}
