<html >
<head>
  @include('layouts._header')
</head>


<body >
  @include('layouts._navigation')


	<div class="page-wrap">
	 @yield('content')

	</div>


</body>


@include('layouts._footer')

</html>
