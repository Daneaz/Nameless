<html >
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css" >

    <!-- Styles -->

    <!-- <link href="/css/app.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css" >

    <!-- Custom styles for this template -->
    <link href="/css/homepage.css" rel="stylesheet">
</head>


<body >
@include('layouts._navigation')


<div class="page-wrap">
    @yield('content')

</div>


</body>


@include('layouts._footer')

</html>
