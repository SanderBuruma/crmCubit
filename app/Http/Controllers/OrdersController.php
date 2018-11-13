<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\Customers;
use App\Products;
use Session;

class OrdersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$orders = Orders::orderBy('id', 'desc')->paginate(5);
		return view('orders.index')->withOrders($orders);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$customers = Customers::all();
		$products = Products::all();
		return view('orders.create')->withCustomers($customers)->withProducts($products);
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
			'customers_id' 			=> 'exists:customers,id',
			'orders_id' 			=> 'exists:orders,id',
			'quantity' 				=> 'numeric|min:1'
		]);

		$order = new Orders;
		
		$order->customers_id = $request->customers_id;
		$order->products_id = $request->products_id;
		$order->quantity = $request->quantity;

		$order->save();

		Session::flash('success', "Order inserted into database");

		return redirect()->route('orders.index');  
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
		$order = Orders::find($id);
		$products = Products::all();
		$prods = [];
		foreach($products as $value){
			$prods[$value->id] = "$value->name - €$value->price,-";
		}

		$customers = Customers::all();
		$custs = [];
		foreach($customers as $value){
			$custs[$value->id] = "$value->fname $value->lname - id:$value->id";
		}

		return view('orders.edit')->withOrder($order)->withProducts($prods)->withCustomers($custs);
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
				'customers_id' => 'exists:customers,id',
				'products_id' => 'exists:products,id',
				'quantity' => 'numeric|min:1'
			]);

			$order = Orders::find($id);
			$order->customers_id = $request->customers_id;
			$order->products_id = $request->products_id;
			$order->quantity = $request->quantity;

			$order->save();

			Session::flash('success', "Order $id updated in database");
	
			return redirect()->route('orders.index');  
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
