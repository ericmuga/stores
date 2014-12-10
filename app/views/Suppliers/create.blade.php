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

    form {margin-left:130px;  text-align:center;width: 500px; padding: 10px; background: #82AAA0; color: #000000}
    input{text-align:center; border-color: solid 1px red;}
   .well{background: #e0f2be}
 </style>
@if(Auth::check())

   @include('Suppliers.partial')
                           <div class="panel">Create Supplier</div>
                           {{Form::open(array('route' => 'supplier.store'))}}
                           {{\Way\Form\FormField::name()}}{{$errors->first('name')}}
                           {{\Way\Form\FormField::phone()}} {{$errors->first('phone')}}
                           {{\Way\Form\FormField::email()}} {{$errors->first('email')}}<br/>
                           {{\Way\Form\FormField::address()}} {{$errors->first('address')}}<br/>
                           {{\Way\Form\FormField::bank()}} {{$errors->first('bank')}}<br/>
                           {{\Way\Form\FormField::account_no()}} {{$errors->first('account_no')}}<br/>
                           {{\Way\Form\FormField::branch()}} {{$errors->first('branch')}}<br/>
                           {{Form::reset('Reset',array('class'=>'btn btn-default'))}}

                           {{Form::submit('Create',array('class'=>'btn btn-primary'))}}
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


