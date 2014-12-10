@extends('layouts.default')
@section('content')

@if(Auth::check())

   <div class="sidebar well container">


    <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper" >
                <ul class="sidebar-nav" >
                    <li class="sidebar-brand"><div class="panel"> Dashboard</div></li>
                    <li><a href="{{route('user.index')}}">User Management</a></li>
                    <li><a href="{{route('supplier.index')}}">Supplier Managegement</a> </li>
                    <li><a href="{{route('Inventories.index')}}">Inventory Management</a></li>
                    <li><a href="#">Consumption</a></li>
                    </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div class="center">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">My Store</a>
                        <a class="btn btn-default" href="{{route('user.index')}}">User Management</a>
                        <a class="btn btn-default" href="{{route('supplier.index')}}">Supplier Managegement</a>
                        <a class="btn btn-default" href="{{route('Inventories.index')}}">Inventory Management</a>
                        Welcome |  {{Auth::user()->name}}
                           <a href="{{route('logout')}}" class="btn btn-default" id="">Log Out</a>

            <div id="page-content-wrapper">
                <div class="container-fluid ">

                    <div class="row">
                        <div class="col-lg-12">
                            <h2 style="align-content: center">My Store</h2>
                            <p style="padding: 25px; border: solid red 1px; border-radius: 5px; text-align: center; background:#BEE9EA">



                            <?php if(isset($message)) echo $message; else echo ' Please select an option';?>




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