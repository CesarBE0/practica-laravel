<nav class="bg-indigo-600 text-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">

            <div class="flex space-x-4 items-center">
                <a href="{{ route('main') }}" class="font-bold hover:text-indigo-200">{{ __('Home') }}</a>
                @auth
                    <a href="{{ route('projects') }}" class="hover:text-indigo-200">{{ __('Projects') }}</a>
                    <a href="{{ route('students.index') }}" class="hover:text-indigo-200">{{ __('Students') }}</a>
                @endauth
            </div>

            <div class="flex items-center space-x-6">

                <div class="relative group">
                    <div x-data="{ open: false }" class="relative">

                        <button @click="open = !open" class="flex items-center hover:text-indigo-200 focus:outline-none">
                            <span class="mr-1">{{ strtoupper(app()->getLocale()) }}</span>
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </button>

                        <div x-show="open"
                             @click.outside="open = false"
                             x-transition
                             style="display: none;"
                             class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-xl py-1 z-50 text-gray-800">

                            <a href="{{ url('lang/es') }}" class="block px-4 py-2 text-sm hover:bg-indigo-500 hover:text-white">Español</a>
                            <a href="{{ url('lang/en') }}" class="block px-4 py-2 text-sm hover:bg-indigo-500 hover:text-white">English</a>
                            <a href="{{ url('lang/fr') }}" class="block px-4 py-2 text-sm hover:bg-indigo-500 hover:text-white">Français</a>
                        </div>
                    </div>
                </div>

                @auth
                    <span class="text-sm bg-indigo-700 px-3 py-1 rounded">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm hover:text-indigo-200 underline">{{ __('Logout') }}</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm hover:text-indigo-200">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="text-sm bg-white text-indigo-600 px-3 py-1 rounded hover:bg-gray-100">{{ __('Register') }}</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
