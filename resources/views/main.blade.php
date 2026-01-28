<x-layouts.layout>
    @auth
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-2">{{ __('Students Management') }}</h2>
                <p class="mb-4 text-gray-600">{{ __('Create, read, update and delete students.') }}</p>
                <a href="{{ route('students.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                    {{ __('Go to Students') }}
                </a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-xl font-bold mb-2">{{ __('Projects') }}</h2>
                <p class="mb-4 text-gray-600">{{ __('View assigned projects.') }}</p>
                <a href="{{ route('projects.index') }}" class="bg-green-500 text-white px-4 py-2 rounded">
                    {{ __('Go to Projects') }}
                </a>
            </div>
        </div>
    @else
        <div class="text-center py-20">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ __('Welcome') }}</h1>
            <p class="text-xl text-gray-600 mb-8">{{ __('Please login to access the management tools.') }}</p>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold">{{__("Login")}}</a>
                <a href="{{ route('register') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg font-bold">{{__("Register")}}</a>
            </div>
        </div>
    @endauth
</x-layouts.layout>
