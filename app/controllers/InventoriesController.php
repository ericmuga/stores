<?php

class InventoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /inventories
	 *
	 * @return Response
	 */
	public function index()
	{
		$inventory= Inventory::orderBy('name','ASC')->paginate(15);
        return View::make('Inventories.index',compact('inventory'))->with('title','Inventory');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /inventories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Inventories.create')->with('title','Add-Item');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /inventories
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator= Validator::make(Input::all(),Inventory::$rules);

        if($validator->fails())
        {

            return Redirect::back()->withInput()->withErrors($validator);

        }
        else {

            $Item = new Inventory();
            $Item->name= Input::get('name');
            $Item->description= Input::get('description');
            $Item->initials = Input::get('initials');
            $Item->save();
            echo '<script>alert("Item Stored")</script>';
            $inventory= Inventory::paginate(15);
            return View::make('Inventories.index',compact('inventory'))->with('title','Inventory');
        }
	}

	/**
	 * Display the specified resource.
	 * GET /inventories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */

/**
	 * Show the form for editing the specified resource.
	 * GET /inventories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $Item=Inventory::find($id);

        return View::make('Inventories.edit',compact('Item'))->with('title','Edit');

    }

	/**
	 * Update the specified resource in storage.
	 * PUT /inventories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {

        $validator = Validator::make(Input::all(), Inventory::$rulesupdate);

        if ($validator->fails()) {

            return Redirect::back()->withInput()->withErrors($validator);

        } else {

            $Item = Inventory::find($id);

            $Item->update(['name' => Input::get('name'), 'initials' => Input::get('initials'), 'description' => Input::get('description')]);
            $inventory= Inventory::paginate(15);
            return View::make('Inventories.index',compact('inventory'))->with('title','Inventory-update');
        }
    }
	/**
	 * Remove the specified resource from storage.
	 * DELETE /inventories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$inv=Inventory::find($id);
        $inv->delete();
        echo '<script>alert("Item Deleted!")</script>';
        $inventory= Inventory::paginate(15);
        return View::make('Inventories.index',compact('inventory'))->with('title','Inventory-deleted');

	}

    public function show($id)
    {
        $Items=Inventory::where('name','LIKE','%'.Input::get('key').'%')
            ->orWhere('id','LIKE','%'.Input::get('key').'%')
            ->orWhere('description','LIKE','%'.Input::get('key').'%')
            ->orWhere('initials','LIKE','%'.Input::get('key').'%')->paginate(15);


        return View::make('Inventories.search-results',compact('Items')) ->with('title','search-result');

    }


    public function receipts()
    {
        $items = Inventory::orderBy('name','ASC')->get();
        $suppliers = Supplier::orderBy('name','ASC')->get();

        return View::make('Receipts.index', compact('items'))->with('title', 'Receipts')->with('suppliers', $suppliers);

    }

    public function receipt_store()
    {
        global $receipt_rules;
        for ($i=1; $i<11; $i++)
        {
          if(Input::get('item'.$i)=='0')
          {
              continue;
          }
          else
          {

              $receipt_rules['qty'.$i]='required|numeric';
              $receipt_rules['cost'.$i]='required|numeric';
              $receipt_rules['Supplier'.$i]='exists:suppliers,id';

          }


        }
        $receipt_rules['date']='required';

        $validator= Validator::make(Input::all(),$receipt_rules);

        if($validator->fails())
        {

            return Redirect::back()->withInput()->withErrors($validator);
        }
        else
        {
            for ($i=1; $i<11; $i++)
            {
                if(Input::get('item'.$i)=='0')
                {
                    continue;
                }
                else
                {

                  $Receipt = new Receipt();
                    $Receipt->date=Input::get('date');
                    $Receipt->item=Input::get('item'.$i);
                    $Receipt->qty=Input::get('qty'.$i);
                    $Receipt->cost=Input::get('cost'.$i);
                    $Receipt->Supplier_id=Input::get('Supplier'.$i);

                    





                }
            }
        }



    }

}