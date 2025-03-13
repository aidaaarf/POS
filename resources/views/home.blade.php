<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - POS System</title>
</head>
<body>
    <h1>Welcome to the POS System</h1>
    <ul>
        <li><a href="{{ url('/') }}"> Home</a></li>
        <li><a href="{{ url('/category/food-beverage') }}"> Food & Beverage</a></li>
        <li><a href="{{ url('/category/beauty-health') }}"> Beauty & Health</a></li>
        <li><a href="{{ url('/category/home-care') }}"> Home Care</a></li>
        <li><a href="{{ url('/category/baby-kid') }}"> Baby & Kid</a></li>
        <li><a href="{{ url('/user/1/name/Andi') }}"> User Profile (Aida)</a></li>
        <li><a href="{{ url('/sales') }}"> Sales Page</a></li>
    </ul>
</body>
</html>
