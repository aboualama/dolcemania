<?php

namespace App\Http\Controllers;

use App\Client;
use App\Event;
use App\EventMeta;
use App\ExcludeEvents;
use App\Order;
use App\OrderProduct;
use App\ProductPrice;
use Calendar;
use DateTime;
use Illuminate\Support\Facades\DB;
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
        $orders = Order::with('client')->where('order_date','!=',null)->get();
        // dd($orders);

        return view('order.index', ['orders' => $orders]);
    }
    public function recurrentIndex()
    {
        $orders = Order::with('client')->where(['order_date'=> null])->get();
        // dd($orders);
        return view('order.recurrentIndex', ['orders' => $orders]);
    }

    public function getClientPriceList()
    {
        $price = ProductPrice::where('title', Client::find($_POST['clientId'])->product_prices_name)->get();
        return view('order.productPrice', ['prices' => $price]);
    }

    public function getList()
    {
        $price = ProductPrice::where('title', Client::find($_POST['clientId'])->product_prices_name)->get(); 
        $order = Order::where('id' , $_POST['id_order'])->get();

        dd($order);
        return view('order.clinetproductPrice', compact('price', 'order'));
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
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($_POST);
        $order            = new Order();
        $order->id_client = $_POST['clientId'];
        $order->save();

        $total_1 = 0;
        $total_2 = 0;


        foreach ($_POST['prices'] as $key => $quantities) {
            $productOrder                = new OrderProduct();
            $productOrder->price         = ProductPrice::find($key)->price;
            $productOrder->product_title = $quantities['name'];
            $productOrder->product_id    = ProductPrice::find($key)->product_id;
            $productOrder->qty_1         = $quantities['qt1'];
            $productOrder->qty_2         = $quantities['qt2'];
            $productOrder->val_1         = $productOrder->price * $productOrder->qty_1;
            $productOrder->val_2         = $productOrder->price * $productOrder->qty_2;
            $total_1                     = $total_1 + $productOrder->val_1;
            $total_2                     = $total_2 + $productOrder->val_2;
            $productOrder                = $productOrder->order()->associate($order)->save();
        }
        $order->total_1 = $total_1;
        $order->total_2 = $total_2;
        $order->save();

//dd($order);
        if ($_POST['recurence'] == 'true') {
            $order->recurrent = false;
            $order->save();
            //  $daysofweek = implode(", ", $request->daysofweek);
            //     dd($request->daysofweek);
            foreach ($request->daysofweek as $day) {
                $rrule = new RRule\RRule([
                                             'freq'     => $request->weeklymonthly,
                                             'byday'    => $day,
                                             'interval' => $request->repeat_interval,
                                             'dtstart'  => $request->repeat_start,
                                             'until'    => $request->repeat_end,
                                         ]);

                //   dd($rrule->getOccurrences(10));
                $rrule = $rrule->getOccurrences(1);
                print_r($rrule);
                $start_date        = $rrule[0]->format('U');
                $event             = new Event();
                $event->event_name = $request->recurence;
                $event->order_id   = $order->id;
                $event->save();
                $eventmeta                  = new EventMeta();
                $start                      = new \DateTime($_POST['repeat_start']);
                $eventmeta->repeat_start    = (int)$start_date;
                $eventmeta->repeat_interval = 604800; //weekly
                $eventmeta->event_id        = $event->id;
                $eventmeta->save();
            }
        } else {

            $order->order_date = (DateTime::createFromFormat('d-m-Y', $_POST['orderdate']))->format('Y-m-d');

            $order->save();
        }

        return Resp::success($order);

    }


    public function eventorder1(Request $request)
    {
        return view('calendar.full1');
    }

    public function eventorder(Request $request)
    {
        $date      = new DateTime($_POST['orderdate']);
        $inThePast = false;
        $now       = new DateTime();
        if ($date->format('Y-m-d') < $now->format('Y-m-d')) {
            $inThePast = true;
        }
        $l = (int)$date->format('U');
        // dd($l);
        $EventMeta = \App\EventMeta::with(['event', 'event.order', 'event.order.client'])
            /*->join('exclude_events', 'exclude_events.event_meta_id', '=', 'events_meta.id')*/
                                   ->whereRaw("((" . $l . " - repeat_start ) %   repeat_interval) = 0")->get();
                                  /* ->whereNotIn('id', DB::table('exclude_events')->where('date', '=', $l)->pluck('event_meta_id'))
                                   ->get();*/
        // dd($EventMeta->toArray());
        return view('calendar.full', compact(['EventMeta', 'date', 'inThePast']));
    }


    public function getddt(Request $request)
    {
        return view('calendar.ddt.full1');
    }

    public function ddt()
    {
        $date   = $_POST['orderdate'];

        $orders = Order::where(['order_date' => $date])->where('total_1','!=',0)->get();
     //   dd($orders);
        return view('calendar.ddt.ddt', ['orders' => $orders]);
    }


    public function getproduction(Request $request)
    {
        return view('calendar.production.full1');
    }

    public function production()
    {
        $date   = $_POST['orderdate'];

     //   dd(Order::where($_POST[orderdate]));
        $orders = Order::select('order_products.product_title', 'order_products.product_id', 'products.quantity_tin', DB::raw('SUM(order_products.qty_1 + order_products.qty_2) as totalItems'))
                       ->join('order_products', 'orders.id', '=', 'order_products.order_id')
                       ->join('products', 'products.id', '=', 'order_products.product_id')
                       ->where('order_date', '=', $date)
                       ->groupBy('order_products.product_title')
                       ->groupBy('order_products.product_id')
                       ->get();


//dd($orders->toArray());
        return view('calendar.production.productions', ['orders' => $orders]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $products = OrderProduct::where('order_id', $order->id)->get();
        $total    = $products->sum('val_1');
        // dd($products);
        return view('order.order', compact('order', 'products', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //    $products = OrderProduct::where('order_id', $order->id)->get();
        $notSelectedProductPrice = ProductPrice::where('title','=',$order->client->product_prices_name)->WhereNotIn('product_id',$order->product->pluck('product_id'))->get()->toArray();
        $selectedProductPrice = $order->product;
        $selectedClient = $order->client;
        $clients  = Client::where(['is_customer' => true])->get();
        return view('order.edit', compact('clients', 'order', 'products'));

       /* $products = OrderProduct::where('order_id', $order->id)->get();
        $clients  = Client::where(['is_customer' => true])->get();
        $clients  = Client::where(['is_customer' => true])->get();
        return view('order.edit', compact('clients', 'order', 'products'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order               $order
     *
     * @return \Illuminate\Http\Response
     */



    
    public function update(Request $request, Order $order)
    {
        $order->id_client = $_POST['id_client']; 
        $order->update(); 
        $total_1 = 0;
        $total_2 = 0; 
        foreach ($_POST['prices'] as $key => $quantities) { 
            $productOrder = OrderProduct::where('order_id', $order->id)->get(); 
            $productOrder->price         = ProductPrice::find($key)->price;
            $productOrder->product_title = $quantities['name'];
            $productOrder->qty_1         = $quantities['qt1'];
            $productOrder->qty_2         = $quantities['qt2'];
            $productOrder->val_1         = $productOrder->price * $productOrder->qty_1;
            $productOrder->val_2         = $productOrder->price * $productOrder->qty_2;
            $total_1                     = $total_1 + $productOrder->val_1;
            $total_2                     = $total_2 + $productOrder->val_2;
            $productOrder                = $productOrder->order()->associate($order)->save();
        }
        $order->total_1 = $total_1;
        $order->total_2 = $total_2;
        $order->update();
 
        if ($_POST['recurence'] == 'true') {
            $order->recurrent = true;
            $order->update(); 
            foreach ($request->daysofweek as $day) {
                $rrule = new RRule\RRule([
                                           'freq'     => $request->weeklymonthly,
                                           'byday'    => $day,
                                           'interval' => $request->repeat_interval,
                                           'dtstart'  => $request->repeat_start,
                                           'until'    => $request->repeat_end,
                                         ]); 
                $rrule = $rrule->getOccurrences(1); 
                $start_date                 = $rrule[0]->format('U');
                $event                      = Event::where('order_id', $order->id)->get();
                $eventmeta                  = EventMeta::where('event_id', $event->id)->get();
                $start                      = new \DateTime($_POST['repeat_start']);
                $eventmeta->repeat_start    = (int)$start_date;
                $eventmeta->repeat_interval = 604800; //weekly
                $eventmeta->update();
            }
        } else { 
            $order->order_date = (DateTime::createFromFormat('d-m-Y', $_POST['orderdate']))->format('Y-m-d'); 
            $order->update();
        } 
        return Resp::success($order);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     *
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


    public function indexEvent()
    {
        $events     = Event::get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date . ' +1 day')
            );
        }
        $calendar_details = Calendar::addEvents($event_list);
        dd($calendar_details);

        return view('order.fullcalendar', compact('calendar_details'));
    }

    public function approveOrder()
    {


        $order_ids         = $_POST['orderId'];
        $oldOrder          = Order::find($order_ids);
        $order             = $oldOrder->replicate();
        $order->event_id   = $_POST['eventId'];
        $order->order_date = (new DateTime($_POST['eventDate']))->format('Y-m-d');
        $order->recurrent  = true;
        $order->recurrent_id = $oldOrder->id;
        $order->save();

        foreach ($oldOrder->product as $p) {
            // $order->product()->attach($p);
            $p = $p->replicate();
            $p->save();
            $p->order()->associate($order)->save();
            // you may set the timestamps to the second argument of attach()
        }


        $ExcludeEvents                = new ExcludeEvents();
        $ExcludeEvents->event_meta_id = $_POST['eventId'];

        $ExcludeEvents->date = (int)$order->order_date->format('U');
        $ExcludeEvents->save();


    }

    public function getshow($id)
    {   

        $order = Order::where('id' , $id)->with('client')->first();
        $products = OrderProduct::where('order_id', $id)->get();
        $total    = $products->sum('val_1');   
        return view('calendar.ddt.show', compact('order', 'products', 'total'));
         
    }

}
