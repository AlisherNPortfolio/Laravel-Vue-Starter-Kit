<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/primeicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/primeflex.min.css') }}">
    <title>Admin | Dashboard</title>
    @vite(['resources/css/admin/app.css'])
</head>
<body>
    <div id="app"></div>
    @vite(['resources/js/admin/app.ts'])
</body>
</html>
