<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = DB::table((new ProductPrice)->getTable())->select('title')->groupBy('title')->get();

        return view('price.index', ['prices' => $prices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('price.create', compact('products')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        foreach ($_POST['products'] as $id => $amount) 
        {
            $arr[] = ['product_id' => $id, 'title' => $_POST['title'], 'price' => $amount];
        }
        ProductPrice::insert($arr);

        return Resp::success(ProductPrice::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductPrice  $productPrice
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPrice $productPrice)
    {
        //
    }


    public function getEdit()
    {

        $products = ProductPrice::with('product')->where(['title' => $_POST['id']])->get();

        return view('price.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductPrice  $productPrice
     * @return \Illuminate\Http\Response
     */
    public function updateByTitle($id)
    {

        $title = array();

        if (isset($_POST['newTitle']))
        {
            $title = ['title'=>$_POST['newTitle']];
        }

        foreach ($_POST['products'] as $id => $amount){
          ProductPrice::where('title',$_POST['title'])->where('product_id',$id)->update(array_merge(['price'=>$amount],$title));
        }

        return Resp::success('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductPrice  $productPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy($title)
    {
        ProductPrice::where(['title' => $title])->delete();
        return Resp::success(["title" => $title]);
    } 
}
