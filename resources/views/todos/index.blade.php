<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $list->title }}</title>
    @vite('resources/css/app.css')
    @include('components.header')
</head>


<body class="p-10">

    <div class="p-20">
        <div class="flex items-center">
            <a href="{{ route('lists.index') }}">
                <button type="button" class=" text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6l-6 6 6 6" />
                    </svg>
                </button>
            </a>
            <form action="{{ route('lists.update', $list->id) }}" method="post" class="flex-1">
                @csrf
                @method('PATCH')
                <input type="text" name="title" value="{{ $list->title }}" placeholder="タイトル"
                    class="border border-gray-300 rounded-md px-3 py-2 text-sm w-full">
            </form>
        </div>
        @php
        $incomplete = $todos->where('flag', 0);
        @endphp
        @foreach($incomplete as $todo)
        <div class="flex items-center gap-3">
            <form action="{{ route('todos.toggle', ['todo' => $todo->id]) }}" method="post">
                @csrf
                <input type="checkbox" onchange="this.form.submit()" {{ $todo->flag ? 'checked' :'' }}>
            </form>
            <ul>
                <li>
                    <form action="{{ route('todos.update', $todo->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="body" value="{{ $todo->body }}"
                            class="bg-transparent border-none focus:outline-none">
                    </form>
                </li>
            </ul>

            <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </form>
        </div>
        @endforeach

        <div class="flex items-center gap-3">

            <input type="checkbox" disabled>


            <form action="{{ route('todos.store', ['list' => $list->id]) }}" method="post">
                @csrf
                <input type="text" name="body" placeholder="+ 項目を追加" maxlength="100"
                    class="bg-transparent border-none focus:outline-none">
                <button type="submit" class="text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </form>

        </div>

        <h2>完了</h2>
        @php
        $complete = $todos->where('flag', 1);
        @endphp
        @foreach($complete as $todo)
        <div class="flex items-center gap-3">
            <form action="{{ route('todos.toggle', ['todo' => $todo->id]) }}" method="post">
                @csrf
                <input type="checkbox" onchange="this.form.submit()" {{ $todo->flag ? 'checked' :'' }}>
            </form>
            <ul>
                <li>
                    <form action="{{ route('todos.update', $todo->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="body" value="{{ $todo->body }}"
                            class="line-through text-gray-400 bg-transparent border-none focus:outline-none">
                    </form>
                </li>
            </ul>
            <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </form>
        </div>
        @endforeach
    </div>

</body>

</html>