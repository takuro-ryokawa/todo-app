<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>リスト一覧</title>
    </head>
    <body>
        <h1>リスト一覧</h1>
        @foreach($lists as $list)

        <h2>
            <a href="{{ route('todos.index', ['index' => $list->id]) }}">
                {{ $list->title }}
            </a>
        </h2>
        <ul>
                @foreach($list->todoLists->take(5) as $todo)
                <li>{{ $todo->body }}</li>
                @endforeach
                <li>{{ $list->updated_at }}</li>
        </ul>
        @endforeach
    </body>
</html>