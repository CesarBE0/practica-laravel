<x-layouts.layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800">{{ __('Projects') }}</h2>
        <p class="text-gray-600 mt-2">{{ __('List of academic projects loaded via Seeders.') }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition">
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2 text-indigo-600">{{ $project->title }}</h3>
                    <p class="text-gray-700 text-base mb-4">
                        {{ $project->description }}
                    </p>
                    @if($project->url)
                        <a href="{{ $project->url }}" target="_blank" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 hover:bg-gray-300">
                            {{ __('View Code') }}
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('main') }}" class="text-indigo-600 hover:underline">{{ __('Back to Home') }}</a>
    </div>
</x-layouts.layout>
