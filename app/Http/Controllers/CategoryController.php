<?php

    namespace App\Http\Controllers;

    use App\Category;
    use Illuminate\Http\Request;

    class CategoryController extends Controller
    {

        public function getAll()
        {

            return Category::all()->toJson();
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */

        public function index()
        {
            $categories = Category::all();
            return view('category.index', ['categories' => $categories]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        { 
            return view('category.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         *
         */
        public function store(Request $request)
        {
            if (!isset($_POST['title']))
                return "Campo vuoto";
            $req = new Category();
            $req->title = $_POST['title'];
            $req->slug = $_POST['title'];
            $req->save();
            return Resp::success($req);
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Category $category
         * @return \Illuminate\Http\Response
         */
        public function show(Category $category)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Category $category
         * @return \Illuminate\Http\Response
         */
        public function edit(Category $category)
        {
           return $category;
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \App\Category $category
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Category $category)
        {
           $category->title = $_POST['title'];
           $category->save();
           return Resp::success($category);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Category $category
         * @return \Illuminate\Http\Response
         */
        public function destroy(Category $category)
        {
            $category->delete();
            return Resp::success($category);
        }
    }
