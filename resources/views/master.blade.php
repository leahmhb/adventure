<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
 <title>Adventure - {{ $title or '' }}</title>
 <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
 @yield('content')
</body>
</html>
