<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div>
    <h1>{{$pizza->naam}}</h1>

    @foreach ($ingredients as $ingredient )
        <h2>{{$ingredient->naam}}</h2>
    @endforeach
</div>
</body>
</html>