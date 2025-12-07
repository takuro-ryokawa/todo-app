<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $list->title }}</title>
    @vite('resources/css/app.css')
    @include('components.header')
</head>


<body class="text-gray-700 px-10">
    <div class="flex flex-col gap-6 items-center p-20">
        <div class="w-full max-w-md flex items-center border-b border-gray-400">
            <a href="{{ route('lists.index') }}">
                <button type="button" class=" text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6l-6 6 6 6" />
                    </svg>
                </button>
            </a>
            <form action="{{ route('lists.update', $list->id) }}" method="post" class="flex-1 px-7">
                @csrf
                @method('PATCH')
                <input type="text" name="title" maxlength="50" value="{{ $list->title }}" placeholder="タイトル"
                    class="w-full border-none rounded-md px-3 py-2 text-xl" onblur="this.form.submit()">
            </form>
        </div>
        @php
        $incomplete = $todos->where('flag', 0);
        @endphp
        <div class="w-full max-w-md">
            @foreach($incomplete as $todo)
            <div class="flex justify-between items-center border-b border-gray-300 w-full">
                <form action="{{ route('todos.toggle', ['todo' => $todo->id]) }}" method="post">
                    @csrf
                    <input type="checkbox" onchange="this.form.submit()" {{ $todo->flag ? 'checked' :'' }}>
                </form>
                <form action="{{ route('todos.update', $todo->id) }}" method="post" class="flex-1">
                    @csrf
                    @method('PATCH')
                    <textarea name="body" maxlength="100" rows="1" class="single-line auto-resize flex-1 border-b border-gray-300 focus:border-blue-400 focus:outline-none resize-none border-none overflow-hidden w-full" onblur="this.form.submit()" oninput="this.style.height='auto';this.style.height=this.scrollHeight+'px';">{{ $todo->body }}</textarea>
                </form>

                <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-400 hover:text-red-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </form>
            </div>
            @endforeach

            <div>
                <form action="{{ route('todos.store', ['list' => $list->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 text-gray-400">
                        <span class="text-xl">+</span>
                        項目を追加
                    </button>
                </form>
            </div>

            <h2 class="mt-10">完了</h2>
            @php
            $complete = $todos->where('flag', 1);
            @endphp
            @foreach($complete as $todo)
            <div class="flex justify-between items-center border-b border-gray-300 w-full">
                <form action="{{ route('todos.toggle', ['todo' => $todo->id]) }}" method="post">
                    @csrf
                    <input type="checkbox" onchange="this.form.submit()" {{ $todo->flag ? 'checked' :'' }}>
                </form>
                <form action="{{ route('todos.update', $todo->id) }}" method="post" class="flex-1">
                    @csrf
                    @method('PATCH')
                    <textarea name="body" maxlength="100" rows="1" class="single-line auto-resize flex-1 border-b border-gray-300 focus:border-blue-400 focus:outline-none resize-none border-none overflow-hidden w-full line-through text-gray-400" onblur="this.form.submit()" oninput="this.style.height='auto';this.style.height=this.scrollHeight+'px';">{{ $todo->body }}</textarea>
                </form>
                <form action="{{ route('todos.destroy', ['todo' => $todo->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-400 hover:text-red-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('textarea.auto-resize').forEach(el => {
            el.style.height = 'auto';
            el.style.height = el.scrollHeight + 'px';
        });
    });
    document.addEventListener('keydown', e => {
        if (e.target.classList.contains('single-line') && e.key === 'Enter') {
            e.preventDefault();

            if (e.target.form) e.target.form.submit();
        }
    });
</script>