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
               form {margin-left:180px; text-align:center;width: 400px; padding: 20px; background: #a9dba9}
               input{text-align:center; border-color: solid 1px red;}
                           </style>
@if(Auth::check())

   @include('users.partial')
                     <div class="panel"> Search User</div>
                     {{Form::open(array('route'=>'one-user'))}}
                    {{\Way\Form\FormField::id()}}
                    {{\Way\Form\FormField::name()}}
                    {{\Way\Form\FormField::username()}}
                    {{Form::submit('Search',array('class'=>'btn btn-primary'))}}
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


