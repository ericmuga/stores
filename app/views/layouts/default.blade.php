<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>@if($title){{$title}}@else{{'stores'}}@endif</title>
<!----------------styles ------------>
    <link rel="stylesheet" href={{URL::to('/').'/bootstrap/css/bootstrap.min.css'}} type="text/css"/>
    <link rel="stylesheet" href={{URL::to('/').'/bootstrap/css/bootstrap-theme.min.css'}} type="text/css"/>
    <link rel="stylesheet" href={{URL::to('/').'/bootstrap/css/custom.css'}} type="text/css"/>
    <link rel="stylesheet" href={{URL::to('/').'/bootstrap/css/simple-sidebar.css'}} type="text/css"/>
    <link rel="stylesheet" href={{URL::to('/').'/bootstrap/jquery-ui-1.11.2.custom/jquery-ui.min.css'}} type="text/css"/>
    <link rel="stylesheet" href={{URL::to('/').'/bootstrap/jquery-ui-1.11.2.custom/jquery-ui.theme.min.css'}} type="text/css"/>
    <link rel="stylesheet" href={{URL::to('/').'/bootstrap/jquery-ui-1.11.2.custom/jquery-ui.structure.min.css'}} type="text/css"/>

<!------------ end of styles --------->

<!--------- scripts ---------------->

    <script type="text/javascript" src={{URL::to('/').'/bootstrap/js/jquery.js'}}></script>
    <script type="text/javascript" src={{URL::to('/').'/bootstrap/js/bootstrap.min.js'}}></script>
    <script type="text/javascript" src={{URL::to('/').'/bootstrap/js/custom.js'}}></script>
    <script type="text/javascript" src={{URL::to('/').'/bootstrap/jquery-ui-1.11.2.custom/jquery-ui.min.js'}}></script>
 <!--------- scripts --------------->








</head>

<body>
@yield('content')

</body>
</html>