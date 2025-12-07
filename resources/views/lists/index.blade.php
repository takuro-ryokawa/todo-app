<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>リスト一覧</title>
    @vite('resources/css/app.css')
    @include('components.header')
</head>

<body class="text-gray-700 px-10">
    <h2 class="text-left p-3">右下の＋ボタンからTodoを追加してください</h2>
    <div class="grid grid-cols-2 gap-6 m-10 md:grid-cols-3 lg:grid-cols-4">
    @foreach($lists as $list)
        <a href="{{ route('todos.index', ['list' => $list->id]) }}"
            class="flex flex-col aspect-square border-slate-700 p-4 shadow-lg hover:bg-gray-100 transition">
            <div class="flex-[4]">
            <div class="text-lg font-semibold text-gray-800 truncate">
                {{ $list->title }}
            </div>
            <ul>
                @foreach($list->todos->take(4) as $todo)
                 <li class="flex items-center">
                    <input type="checkbox" disabled class="accent-gray-400" {{ $todo->flag ? 'checked':'' }}>
                    <span class="ml-2 truncate {{ $todo->flag ? 'line-through text-gray-400' : ''}}">{{ $todo->body }}</span>
                 </li>
                @endforeach
            </ul>
            </div>
                <div class="flex-[1] flex justify-between items-end">
                <p class="text-right">{{ $list->updated_at->diffForHumans() }}</p>
                <form action="{{ route('lists.destroy', ['list' => $list->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="items-center text-sm font-medium text-center hover:text-red-700 transition">削除</button>
                </form>
                </div>
        </a>
    @endforeach
    </div>
    <form action="{{ route('lists.store') }}" method="post">
        @csrf
        <button type="submit" class="fixed bottom-10 right-10 z-50 text-white bg-black
        rounded-full p-2.5 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 20 20"
                stroke="currentColor" stroke-width="2">
                <path d="M5 10h10" />
                <path d="M10 5v10" />
            </svg>
        </button>
    </form>

</body>

</html>