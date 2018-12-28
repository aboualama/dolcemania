<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductPrice;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $pricelist = ProductPrice::groupBy('title')->get();
        return view('product.create', ['categories' => $categories, 'pricelist' => $pricelist]);
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
        $product = new Product();
        $product->title         = $_POST['producttitle'];
        $product->quantity_tin  = $_POST['quantity_tin'];
        $product->vat           = $_POST['vat'];
        $product->default_price = $_POST['default_price'];
        $product->save();
        $price = new ProductPrice();
        DB::table('product_prices')->insert([
            'title' => 'Default',
            'product_id' => $product->id,
            'price' => $product->default_price,
        ]);
        if (isset($_POST['price'])) {
            foreach ($_POST['price'] as $key => $price) {
                DB::table('product_prices')->where('title', $key)->insert([
                    'title' => $key,
                    'product_id' => $product->id,
                    'price' => $price['price']
                ]);
            }
        }
        if (isset($_POST['categories'])) {
            $categories = $_POST['categories'];
            $product->categories()->sync($categories);
        }

        return Resp::success($product);
    }

    public function getCategories()
    {
        print_r(\request());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
    
       $product->title         = $request->producttitle;
       $product->default_price = $request->default_price;
       $product->vat           = $request->vat;
       $product->quantity_tin  = $request->quantity_tin; 
       $product->save();
 
        if (isset($_POST['price'])) {
            foreach ($_POST['price'] as $key => $price) {
                DB::table('product_prices')->where('title', $key)->where('product_id', $product->id)->update([ 
                    'price' => $price['price']
                ]);
            }
        }
        if (isset($_POST['categories'])) {
            $categories = $_POST['categories'];
            $product->categories()->sync($categories);
        }
        return Resp::success($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Resp::success($product);
    }

    /* public function getBelongsToMany(Request $request)
     {
         if ($request->ajax()) {
             $query = Product::with('Category')->selectRaw('distinct Product.*');

             return $this->dataTable
                 ->eloquent($query)
                 ->addColumn('Category', function (Product $product) {
                     return $product->categories->map(function($categories) {
                         return str_limit($categories->title, 30, '...');
                     })->implode('<br>');
                 })
                 ->make(true);
         }

         return view('datatables.relation.belongs-to-many', [
             'title' => 'Belongs To Many Demo',
             'controller' => 'Relation Controller',
         ]);
     }*/
}
