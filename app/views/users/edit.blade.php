@extends('layouts.default')
@section('content')

 <style>
   #create-user
   {
   background:#a9dba9;
   margin-top: px;
   width: 400px;
   margin-left:140px;
   position: relative;
   text-align: center;
   }
   .panel2 {margin-left:180px; width: 400px;}
   form {margin-left:180px; text-align:center;width: 400px; padding: 20px; background: #FFF8AC}
   input{text-align:center; border-color: solid 1px red;}

        </style>
@if(Auth::check())

   @include('users.partial')
                           <div class="panel panel2">Edit User</div>
                           {{Form::model($user, array('route' => array('user.update',$user->id), 'method'=>'put'  ))}}
                           {{\Way\Form\FormField::name()}}{{$errors->first('name')}}
                           {{\Way\Form\FormField::username()}} {{$errors->first('username')}}
                           {{\Way\Form\FormField::password()}} {{$errors->first('password')}}<br/>
                           {{Form::label('type','User Type')}}
                           {{Form::select('type', array('admin' => 'Admin', 'user' => 'User'),'user');}}<br/><br/>
                           {{Form::label('status','Account Status')}}
                           {{Form::select('status', array('1' => 'Active', '0' => 'Inactive'),'1');}} <br/><br/><br/>


                           {{Form::submit('Save Changes',array('class'=>'btn btn-primary'))}}
                           {{Form::close()}}



                           </div>





                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>








   </div>

   @else

   {{'not signed in'}}
   @endif



@endsection


