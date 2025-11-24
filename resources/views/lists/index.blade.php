<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>リスト一覧</title>
        @vite('resources/css/app.css')
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
            <form action="{{ route('lists.destroy', ['index' => $list->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </ul>
        @endforeach
        <form action="{{ route('lists.store') }}" method="post">
            @csrf
            <button type="submit">+ 新しいリストの作成</button>
        </form>
    </body>
</html>