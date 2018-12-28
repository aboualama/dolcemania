<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("ok");
        $invoces = Invoice::with('client')->get();

        return view('invoice.index', compact('invoces'));
    }

    public function generateInvoceNumber()
    {
        $prefix = 'NF';
        $record = Invoice::latest()->first();
        if (!$record) {
            return [$prefix . date('y') . '-', 0001];
        }
        if (date('z') === '0') {
            $nextInvoiceNumber = [date('y') . '-', 0001];
        } else {
            //increase 1 with last invoice number
            $nextInvoiceNumber = [$prefix . date('y') . '-', $record->invoice_number + 1];
        }
        return $nextInvoiceNumber;
        //Now add New record into database
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::where(['is_customer' => true])->get();
        $orders  = Order::all();
        return view('invoice.create', compact('clients', 'orders'));
    }

    public function invoiceAll()
    {
        $orders = Order::where(['invoice' => false])->get();
        $users  = $orders->groupBy('id_client');
        foreach ($users as $key => $orders) {
            $invoice                 = new Invoice();
            $n                       = $this->generateInvoceNumber();
            $invoice->prefix         = $n[0];
            $invoice->invoice_number = $n[1];
            $invoice->amount         = 0;
            $invoice->client_id      = $key;
            $invoice->save();
            $total = 0;
            foreach ($orders as $order) {
                $order->invoice    = true;
                $order->invoice_id = $invoice->id;
                $order->save();
                $total = $total + $order->total_1;
            }

            $invoice->amount = $total;
            $invoice->save();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return '';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice $invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $clients    = Client::where(['is_customer' => true])->get();
        $price_list = ProductPrice::where('title', '25%')->get();
        return view('order.create', compact('clients', 'price_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice $invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return '';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Invoice             $invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        return '';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice $invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        return '';
    }
}
