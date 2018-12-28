<?php

namespace App\Http\Controllers;

use App\Client;
use App\Event;
use App\EventMeta;
use App\Order;
use App\OrderProduct;
use App\ProductPrice;
use Calendar;
use DateTime;
use DB;
use Illuminate\Http\Request;
use RRule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', ['orders' => $orders]);
    }

    public function getClientPriceList()
    {
     //   dd(Client::find($_POST['clientId'])->product_prices_name);

        $price = ProductPrice::where('title', Client::find($_POST['clientId'])->product_prices_name)->get();
 //dd( $price);
     
        return view('order.productPrice', ['prices' => $price]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients    = Client::where(['is_customer' => true])->get();
        $price_list = ProductPrice::all();
        return view('order.create', compact('clients', 'price_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $order = new Order();
        $order->id_client = $_POST['clientId'];
        $order->save();

        $total_1 = 0;
        $total_2 = 0;

        foreach ($_POST['prices'] as $key => $quantities) {
            $productOrder = new OrderProduct();
            $productOrder->price = ProductPrice::find($key)->price;
            $productOrder->product_title = $quantities['name']; 
            $productOrder->qty_1 = $quantities['qt1'];
            $productOrder->qty_2 = $quantities['qt2'];
            $productOrder->val_1 = $productOrder->price * $productOrder->qty_1;
            $productOrder->val_2 = $productOrder->price * $productOrder->qty_2;
            $total_1 = $total_1 + $productOrder->val_1;                         
            $total_2 = $total_2 +  $productOrder->val_2;
            $productOrder = $productOrder->order()->associate($order)->save();
        }
        $order->total_1 = $total_1;
        $order->total_2 = $total_2;
        $order->save();


        if ($_POST['recurence'] == 'true') {
            $daysofweek = implode(", ", $request->daysofweek);

            $rrule = new RRule\RRule([
                'freq' => $request->weeklymonthly,
                'byday' => $daysofweek,
                //   //'bymonth'  => $request->month,
                'interval' => $request->repeat_interval,
                'dtstart' => $request->repeat_start,
                'until' => $request->repeat_end,
            ]);
 

            $rrule = $rrule->getOccurrences(1);
            $start_date = $rrule[0]->format('U');
            $event = new Event();
            $event->event_name = $request->recurence;
            $event->order_id = $order->id;
            $event->save();
            $eventmeta = new EventMeta();
            $start = new \DateTime($_POST['repeat_start']);
            $eventmeta->repeat_start = (int)$start_date;
            $eventmeta->repeat_interval = 604800; //weekly
            $eventmeta->event_id = $event->id;
            $eventmeta->save();
        }

        // echo $rrule->humanReadable() . '</br>'; 

        foreach ( $rrule as $occurrence ) {
            echo $occurrence->format('D'),"\n" . '</br>';
        }
 
       return Resp::success($order);

    }

// dd( Carbon::now()->getTimestamp('repeat_start') );


    public function uccess()
    {  
        $date = new DateTime('2018-12-24');
        $l = (int)$date->format('U');
        $EventMeta = \App\EventMeta::with(['event','event.order' ,'event.order.client'])
                    ->whereRaw("((".$l." - repeat_start ) %   repeat_interval) = 0")->get();
        
       return view('order.full', compact('EventMeta') ); 
    }


    public function ddt(){

        $orders = Order::all();
        return view('order.ddt', ['orders' => $orders]);
    }
    public function production(){

        $orders = OrderProduct::groupBy('product_title')->select('product_title', DB::raw('count(*) as total'), DB::raw('sum( ) as npezzi'));
        dd($orders->pluck('product'));
        return view('order.ddt', ['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $products = OrderProduct::where('order_id', $order->id)->get();
        $total = $products->sum('val_1');

        return view('order.order', compact('order', 'products', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $products = OrderProduct::where('order_id', $order->id)->get();
        $clients  = Client::where(['is_customer' => true])->get();
        return view('order.edit', compact('clients', 'order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {  
        $order->id_client = $_POST['id_client'];

        dd($order);
        $order->update();

        $total_1 = $order->total_1;
        $total_2 = $order->total_2;

        foreach ($_POST['prices'] as $key => $quantities) {

            $productOrder = OrderProduct::where('order_id', $order->id)->get();

            $productOrder->price = ProductPrice::find($key)->price;
            $productOrder->product_title = $quantities['name']; 
            $productOrder->qty_1 = $quantities['qt1'];
            $productOrder->qty_2 = $quantities['qt2'];
            $productOrder->val_1 = $productOrder->price * $productOrder->qty_1;
            $productOrder->val_2 = $productOrder->price * $productOrder->qty_2;
            $total_1 = $total_1 + $productOrder->val_1;
            $total_2 = $total_2 +  $productOrder->val_2;
            $productOrder = $productOrder->order()->associate($order)->save();
        }
        $order->total_1 = $total_1;
        $order->total_2 = $total_2;
        $order->save(); 

       return Resp::success($order);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return Resp::success($order);
    }


    public function clientorder($id)
    {
        $client = Client::find($id);
        $orders = Order::where('id_client', $id)->where('invoice', false)->get();
        return view('order.client', compact('client', 'orders'));
    }


    public function invoicedorder($id)
    {
        $order = Order::find($id);


        $order->invoice = 1;
        $order->save();
        return back()->with('success', 'This Client Is Active Now');


    }







    public function indexEvent(){
            $events = Event::get();
            $event_list = [];
            foreach ($events as $key => $event) {
                $event_list[] = Calendar::event(
                    $event->event_name,
                    true,
                    new \DateTime($event->start_date),
                    new \DateTime($event->end_date.' +1 day')
                );
            }
            $calendar_details = Calendar::addEvents($event_list); 
     
            return view('order.fullcalendar', compact('calendar_details') );
    }







}
