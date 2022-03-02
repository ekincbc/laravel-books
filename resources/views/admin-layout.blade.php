<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration Books Project</title>
</head>
<body>
    
    <nav>
        <a href="{{ action('Admin\AuthorController@index') }}">List of authors</a>
        <a href="{{ action('Admin\AuthorController@create') }}">Create an author</a>
    </nav>
    
    @include('components.alerts')
    
    @yield('content')

</body>
</html>