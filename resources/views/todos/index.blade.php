<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $index->title }}</title>
    </head>
    <body>
        <form action="{{ route('lists.update', $index->id) }}" method="post">
            @csrf
            @method('PATCH')
            <input type="text" name="title" value="{{ $index->title }}">
        </form>
        <h2>未完了</h2>
        @php
        $incomplete = $todos->where('flag', 0);
        @endphp
        <ul>
            @foreach($incomplete as $todo)
                <li>
                    <form action="{{ route('todos.update', $todo->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="body" value="{{ $todo->body }}">
                    </form>
                </li>
                <form action="{{ route('todos.toggle', ['todo' => $todo->id]) }}" method="post">
                    @csrf
                    <button>{{ $todo->flag ? '未完了に戻す' :'完了' }}</button>
                </form>
                <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            @endforeach
        </ul>
        <h2>完了</h2>
        @php
        $complete = $todos->where('flag', 1);
        @endphp
        <ul>
            @foreach($complete as $todo)
                <li>
                    <form action="{{ route('todos.update', $todo->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="body" value="{{ $todo->body }}">
                    </form>
                </li>
                <form action="{{ route('todos.toggle', ['todo' => $todo->id]) }}" method="post">
                    @csrf
                    <button>{{ $todo->flag ? '未完了に戻す' :'完了' }}</button>
                </form>
                <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            @endforeach
        </ul>
        <form action="{{ route('todos.store', ['index' => $index->id]) }}" method="post">
            @csrf
            <input type="text" name="body" placeholder="+ 項目を追加" maxlength="100">
            <button type="submit">追加</button>
        </form>
        <p>
            <a href="{{ route('lists.index') }}">←</a>
        </p>
    </body>
</html>