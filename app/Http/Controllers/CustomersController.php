<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use Session;

class CustomersController extends Controller
{

	public function __consruct()
	{
			$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
			$customers = Customers::orderBy('id', 'desc')->paginate(5);
			return view('customers.index')->withCustomers($customers);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
			return view('customers.create');
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
		'fname' 					=> 'required',
		'lname' 					=> 'required',
		'address' 				=> 'required',
		'city' 		    		=> 'required',
		'phone1' 					=> 'required',
		'email' 					=> 'required|email|unique:customers,email',
		'balance' 				=> 'required'
	]);

	$customer = new Customers;
	
	$customer->fname = $request->fname;
	$customer->lname = $request->lname;
	$customer->address = $request->address;
	$customer->city = $request->city;
	$customer->phone1 = $request->phone1;
	$customer->phone2 = $request->phone2;
	$customer->email = $request->email;
	$customer->balance = $request->balance;

	$customer->save();

	Session::flash('success', "Customer $customer->fname $customer->lname inserted into database");

	return redirect()->route('customers.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Customers  $customers
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
			$customer = Customers::find($id);
			return view ('customers.show')->withCustomer($customer);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Customers  $customers
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$customer = Customers::find($id);
		return view('customers.edit')->withCustomer($customer);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Customers  $customers
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'fname' 					=> 'required',
			'lname' 					=> 'required',
			'address' 				=> 'required',
			'city' 		    		=> 'required',
			'phone1' 					=> 'required',
			'email' 					=> "required|email|unique:customers,email,$id",
			'balance' 				=> 'required'
		]);

		$customer = Customers::find($id);
		
		$customer->fname = $request->fname;
		$customer->lname = $request->lname;
		$customer->address = $request->address;
		$customer->city = $request->city;
		$customer->phone1 = $request->phone1;
		$customer->phone2 = $request->phone2;
		$customer->email = $request->email;
		$customer->balance = $request->balance;

		$customer->save();

		Session::flash('success', "Customer $customer->fname $customer->lname changed in the database");

		return redirect()->route('customers.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Customers  $customers
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$customer = Customers::find($id);
		$customerName = "$customer->fname $customer->lname";
		$customer->delete();

		Session::flash('success', "$customerName was successfully deleted!");

		return redirect()->route('customers.index');
	}
}
