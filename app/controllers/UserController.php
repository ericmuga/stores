<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.home')->with('title','Create-User');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create')->with('title','Create-User');

    }

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
      // validation

        $validator= Validator::make(Input::all(),User::$rules);



        if($validator->fails())
        {

            return Redirect::back()->withInput()->withErrors($validator);

        }
        else {

            $user= new User();
            $user->name=Input::get('name');
            $user->username=Input::get('username');
            $user->status=1;
            $user->password=Hash::make(Input::get('password'));
            $user->save();
            return View::make('users.home')->with('message', 'User added')->with('title','Users');	//
    }

    }
	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        $allUsers = User::paginate(15);

       return View::make('users.view')->with('user',$allUsers)->with('title','Users');

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)

	{
        $user= User::find($id);
		return View::make('users.edit', compact('user'))->with('title','Edit');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */

    public function one()
    {
        if(Input::get('id')!=NULL)
        {
            if ((Input::get('username')==NULL))
            {
                if((Input::get('name')==NULL))
                {
                    $user=DB::table('users')->where('id',Input::get('id'))->get();
                    return View::make('users.single',compact('user'))->with('title','single-user');
                }
                else
                {
                    $user=DB::table('users')->where('id',Input::get('id'))
                                            ->where('name',Input::get('name'))->get();
                    return View::make('users.single',compact('user'))->with('title','single-user');
                }
            }
            else
            {
                $user=DB::table('users')->where('username',Input::get('username'))
                                        ->where('id',Input::get('id'))->get();
                return View::make('users.single',compact('user'))->with('title','single-user');
            }
        }
        else
        {
            if ((Input::get('username')==NULL))
            {
               if((Input::get('name')==NULL))
                Redirect::back()->withInput();
               else
               {
                   $user=DB::table('users')->where('name','LIKE','%'.Input::get('name').'%')->get();
                   return View::make('users.single',compact('user'))->with('title','single-user');
               }
            }

            $user=DB::table('users')->where('username',Input::get('username'))->get();
            return View::make('users.single',compact('user'))->with('title','single-user');
        }





    }


	public function update($id)
	{



        $validator= Validator::make(Input::all(),User::$editRules);



        if($validator->fails())
        {

            return Redirect::back()->withInput()->withErrors($validator);

        }
        else {
            $user=User::where('id','=',$id)->update(array('name'=>Input::get('name'),
                                                           'username'=>Input::get('username'),
                                                            'password'=>Hash::make(Input::get('password')),
                                                            'status'=>Input::get('status'),
                                                            'type'=>Input::get('type') ));


            $allUsers = User::paginate(15);
            echo "<script>alert('Record updated')</script>";
            return View::make('users.view')->with('user',$allUsers)->with('title','Users');
         }

    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user=User::find($id);
        $user->delete();
        $allUsers = User::paginate(15);

        return View::make('users.view')->with('user',$allUsers)->with('title','Users');
	}

}