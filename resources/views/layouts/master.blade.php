<html>
<head>
    <title>@yield('title')</title>
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/style.css')!!}
<!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@section('sidebar')
    <div class="container navbar-default navbar-fixed-top">
        <div class="row">
            <h1 class="text-danger">
                <a href="{!!URL::to('dashboard')!!}" class="text-danger" style="text-decoration: none;"><img src="{{ asset('logo1.png') }}" alt="Avatar" width="200px"/>
                </a>
            </h1>

            @yield('btn-input')
            <hr>
            @yield('search-input')
        </div>
    </div>
@show

<div class="container" style="@section('margin') margin-top: 180px;@show">
    @yield('content')
</div>

@section('scripts')
    {!!Html::script('js/jquery-3.1.0.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    @yield('custom_scripts')
@show


@yield('modal')
</body>
</html>