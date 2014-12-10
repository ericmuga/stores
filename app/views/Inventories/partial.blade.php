<div class="sidebar well container">


    <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand"><div class="panel">Inventory</div></li>
                                        <li><a href="{{route('Inventories.create')}}">Add Item</a></li>
                                        <li><a href="{{route('Inventories.index')}}">View Items</a></li>
                                        <li><a href="{{route('receipts')}}">Receive Items</a></li>
                                        <li><a href="{{route('Inventories.index')}}">Issue Items</a></li>
                                        <li><a href="{{route('Inventories.index')}}">Record Anomaly</a></li>
                                        <li><a href="{{route('Inventories.index')}}">Valuation</a></li>
                                        <li><a href="{{route('Inventories.index')}}">Reports</a></li>

                                        <li><a style="color:#ffff00;" href="{{route('dash')}}">Main Menu</a></li>

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
                           <div class="well " id="Users">


<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>