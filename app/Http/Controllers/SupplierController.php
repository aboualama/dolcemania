<?php

namespace App\Http\Controllers;

use App\Client;
use App\ProductPrice;
use DB;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where(['is_supplier' => true])->get();
        return view('supplier.index', ['clients' => $clients]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p_prices = ProductPrice::groupBy('title')->get();
        return view('supplier.create', compact('p_prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Yajra\DataTables\DataTablesEditorException
     */
    public function store(Request $request)
    {
//dd($request);
        $client                    = new Client();
        $client->company_name      = $request->company_name;
        $client->reference_name    = $request->reference_name;
        $client->p_iva             = $request->p_iva;
        $client->legal_address     = $request->legal_address;
        $client->operative_address = $request->operative_address;
        $client->phone_number      = $request->phone_number;
        $client->cell_number       = $request->cell_number;
        $client->web_adress        = $request->web_adress;
        $client->is_customer       = false;
        $client->is_supplier       = true;
        $client->is_user           = $request->is_user;
        $client->bank_iban         = $request->bank_iban;
        $client->bank_swift        = $request->bank_swift;
        $client->bank_name         = $request->bank_name;
        $client->payment_term      = $request->payment_term;
        $client->payment_method    = $request->payment_method;
        $client->payment_typology  = $request->payment_typology;
        $client->vat               = $request->vat;
        //  $client->product_prices_name =$request->product_prices_name;
        $client->notes = $request->notes;
        $client->save();

        // return redirect('client/create')->with('success', 'Information has been added');
        return Resp::success($client);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client $Client
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Client $Client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client $Client
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {

        $p_prices = ProductPrice::groupBy('title')->get();
        return view('supplier.edit', compact('client', 'p_prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Client              $Client
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return Resp::success($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $Client
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $Client)
    {
        $Client->delete();
        return Resp::success($Client);
    }
}
