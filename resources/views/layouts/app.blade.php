<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        .btndelete {
        background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
        cursor:pointer;
        overflow: hidden;
        outline:none;
        color: red;
    }

</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('topics.index') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>




<script>$(document).ready(function() {  
    let num1 = 0;  
    let sumstring = '';  
    let returnstring = 'จำนวนเงินที่คืน 0 บาท';  




    $('button').on('click', function(e) {        
		 if (e.target.id == 'clean_coins') {
			sumstring='จำนวนเงิน 0 บาท'
			returnstring='จำนวนเงินที่คืน '+num1+' บาท'
			num1=0;
			$('#sumcoins').text(sumstring);
			$('#returncoins').text(returnstring);

			var arrData =[]; 
				arrData=Gettabel(); 
   
			jQuery.each( arrData, function( i, val ) {
				if (i === 0) return;	
				console.log(i + ": " + num1 +" < "+ val.col1);

					$("#"+ val.col2).removeClass("visible");
					$("#"+ val.col2).addClass("invisible");

			});

			setTimeout(function () {
				$('#returncoins').text('จำนวนเงินที่คืน 0 บาท');
			}, 2000);



    }
    else  {

        let num2 = e.target.innerHTML;
        num1=parseInt(num1)+parseInt(num2);

        sumstring='จำนวนเงิน '+num1+' บาท'
        $('#sumcoins').text(sumstring);

		var arrData =[]; 
			arrData=Gettabel(); 
   

	jQuery.each( arrData, function( i, val ) {
		if (i === 0) return;
	
	console.log(i + ": " + num1 +" < "+ val.col1);
	if(parseInt(val.col1)<=num1){;
		$("#"+ val.col2).removeClass("invisible");
		$("#"+ val.col2).addClass("visible");

	}else{
		$("#"+ val.col2).removeClass("visible");
		$("#"+ val.col2).addClass("invisible");

	}

	});
	
    }});


});


function Gettabel(){
	var arrDataTabel=[];
	// loop over each table row (tr)
	$("#datatabel tr").each(function(){
        var currentRow=$(this);
		
        var col1_value=currentRow.find("td:eq(2)").text();
		var col2_value=currentRow.find("td:eq(5)").text();


         var obj={};
        obj.col1=col1_value;
        obj.col2=col2_value;

        arrDataTabel.push(obj);
   });
   return arrDataTabel;
}

    </script>
