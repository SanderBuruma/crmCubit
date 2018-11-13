<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(5);
        return view('products.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' 					=> 'required',
            'price' 				=> 'required'
        ]);
    
        $product = new Products;
        
        $product->name = $request->name;
        $product->price = $request->price;
    
        $product->save();
    
        Session::flash('success', "Product $product->name inserted into database");
    
        return redirect()->route('products.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
	{
		$product = Products::find($id);
		return view('products.edit')->withProduct($product);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' 					=> "required|unique:products,name,$id",
			'price' 				=> 'required|numeric'
		]);

		$product = Products::find($id);
		
		$product->name = $request->name;
		$product->price = $request->price;

		$product->save();

		Session::flash('success', "product $product->name changed in the database");

		return redirect()->route('products.index');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
