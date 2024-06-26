<header>
    @if (Route::has('login'))
        <div class="w-100 p-4 border-bottom border-danger bg-white">
            @auth
                <div class="w-100 text-right justify-content-end d-flex gap-1">
                    <a href="{{ url('/') }}" class="btn btn-primary text-white">Go To Web Site</a>
                    <a href="{{ url('/logout') }}" class="btn btn-danger bg-danger text-white">LogOut</a>
                </div>
            @else
                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>
            @endauth
        </div>
    @endif
</header>