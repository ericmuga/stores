@extends('layouts.default')
@section('content')
<div class="container">

<div class="login-form well center-block">

{{Form::open(array('route'=>'login'))}}
{{FormField::username(['size'=>'12'])}}
{{FormField::password()}}
<p style="color: red">@if(isset($error)){{$error}}@endif</p>
{{Form::reset('Reset',array('class'=>'btn btn-default'))}}
{{Form::submit('Login',array('class'=>'btn btn-primary '))}}


</div>
</div>

@endsection