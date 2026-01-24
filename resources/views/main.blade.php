<x-layouts.layout>
    @guest
        <div class="text-center py-20 bg-white rounded-lg shadow">
            <h1 class="text-5xl font-bold text-gray-800 mb-6">{{ __('Welcome to Our Application') }}</h1>
            <p class="text-xl text-gray-600 mb-8">{{ __('Please login to access the management tools.') }}</p>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-full hover:bg-indigo-700 transition">{{ __('Login') }}</a>
                <a href="{{ route('register') }}" class="border border-indigo-600 text-indigo-600 px-8 py-3 rounded-full hover:bg-indigo-50 transition">{{ __('Register') }}</a>
            </div>
        </div>
    @endguest

    @auth
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">{{ __('Dashboard') }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <a href="{{ route('students.index') }}" class="block p-8 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-indigo-50 transition transform hover:-translate-y-1">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ __('Manage Students') }}</h5>
                <p class="font-normal text-gray-700">{{ __('Create, edit and manage student records.') }}</p>
            </a>

            <a href="{{ route('projects') }}" class="block p-8 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-indigo-50 transition transform hover:-translate-y-1">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ __('Projects') }}</h5>
                <p class="font-normal text-gray-700">{{ __('View and manage academic projects.') }}</p>
            </a>
        </div>
    @endauth
</x-layouts.layout>
