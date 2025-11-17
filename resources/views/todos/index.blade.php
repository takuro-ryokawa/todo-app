<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $index->title }}</title>
    </head>
    <body>
        <h1>{{ $index->title }}</h1>
        <h2>未完了</h2>
        @php
        $incomplete = $todos->where('flag', 0);
        @endphp
        <ul>
            @foreach($incomplete as $todo)
                <li>{{ $todo->body }}</li>
            @endforeach
        </ul>
        <h2>完了</h2>
        @php
        $complete = $todos->where('flag', 1);
        @endphp
        <ul>
            @foreach($complete as $todo)
                <li>{{ $todo->body }}</li>
            @endforeach
        </ul>
        <p>
            <a href="{{ route('lists.index') }}">←</a>
        </p>
    </body>
</html>