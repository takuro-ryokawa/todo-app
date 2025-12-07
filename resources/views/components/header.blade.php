<header class="w-full border-b">
    @vite('resources/css/app.css')

    <div class="flex items-baseline justify-between px-6">

    <h1 class="text-center font-semibold text-3xl text-transparent bg-clip-text bg-gray-700 p-3"><a href="{{ route('lists.index') }}">✨Todo-App</a></h1>

        <div class="flex justify-end">

            @guest
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 p-3">
                    ログイン画面
                </a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900 p-3">
                    新規登録画面
                </a>
            @endguest

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-gray-900">
                        ログアウト
                    </button>
                </form>
            @endauth

        </div>

    </div>
</header>
