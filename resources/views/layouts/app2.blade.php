<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/app.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>@yield('title') | {{config('app.name','Laravel')}}</title>
</head>
<body>
  <div id="app">  
    <app :auth="{{ Auth::user() ?? '[]' }}" :errors="{{ $errors }}" /> 
    <reserve-component :auth="{{ Auth::user() ?? '[]' }}" :errors="{{ $errors }}" :csrf="{{json_encode(csrf_token())}}"></reserve-component>
    @yield('content')
  </div>
  <script src="{{ mix('js/app.js') }}"></script> 
</body>
</html>