<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <div >
            @if (Route::has('login'))
                <div >
                    @auth
                        <a href="{{ url('/welcome') }}" >Welcome</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            
                <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
<h1>Management</h1>
<a href="/teachers">
    <button>Manage teachers</button>
</a>
<br>
<br>
<br>
<a href="/students">
    <button>Manage students</button>
</a>
<br>
<br>
<br>
<a href="/classrooms">
    <button>Manage class rooms</button>
</a>