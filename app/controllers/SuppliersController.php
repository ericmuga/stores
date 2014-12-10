<?php

class SuppliersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /suppliers
	 *
	 * @return Response
	 */
	public function index()
	{
         $supplier=Supplier::with('Bank')->paginate(15);

		return View::make('Suppliers.index',compact('supplier'))->with('title','Suppliers');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /suppliers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Suppliers.create')->with('title','Search-Supplier');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /suppliers
	 *
	 * @return Response
	 */
	public function store()
    {
        // validation

        $validator = Validator::make(Input::all(), Supplier::$rules);


        if ($validator->fails()) {

            return Redirect::back()->withInput()->withErrors($validator);

        } else {

            $Supplier = new Supplier();
            $Supplier->name = Input::get('name');
            $Supplier->phone = Input::get('phone');
            $Supplier->email = Input::get('email');
            $Supplier->address = Input::get('address');
            $Supplier->bank_id=DB::table('banks')->insertGetId(array('name'=>Input::get('bank'),
                                                                'account_no'=>Input::get('account_no'),
                                                                    'branch'=>Input::get('branch'),
                                                                    'balance'=>0));

            $Supplier->save();
            $supplier=Supplier::paginate(10);
            echo '<script>alert("Record Added")</script>';
            return View::make('Suppliers.index',compact('supplier'))->with('title', 'Suppliers');    //
        }

    }	/**
	 * Display the specified resource.
	 * GET /suppliers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
         $Supplier= DB::table('suppliers')->where('name','LIKE','%'.Input::get('key').'%')
                                           ->orWhere('email','LIKE','%'.Input::get('key').'%')
                                            ->orWhere('id','LIKE','%'.Input::get('key').'%')
                        ->get();
        return View::make('Suppliers.show',compact('Supplier'))->with('title','single-supplier');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /suppliers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $supplier= Supplier::find($id);
        return View::make('Suppliers.edit', compact('supplier'))->with('title','Edit');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /suppliers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$supplier= Supplier::find($id);
        $supplier->update([ 'name' => Input::get('name'),
                            'phone' => Input::get('phone'),
                            'email' => Input::get('email'),
                            'address' => Input::get('address')]);
        $bank=Bank::find($supplier->bank_id);
        $bank->update(['name'=>Input::get('bank'),'account_no'=>Input::get('account_no')]);
        echo'<script>alert("Record updated")</script>';
        $supplier=Supplier::paginate(15);

        return View::make('Suppliers.index',compact('supplier'))->with('title','Suppliers');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /suppliers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$supplier= Supplier::find($id);
        $supplier->delete();
        $supplier=Supplier::paginate(15);

        return View::make('Suppliers.index',compact('supplier'))->with('title','Suppliers');
	}

}