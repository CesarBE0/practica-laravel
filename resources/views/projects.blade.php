<x-layouts.layout>
    <div class="text-center py-10">
        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
            {{ __('Projects Portfolio') }}
        </h2>
        <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
            {{ __('Explore the academic and personal projects developed during the course.') }}
        </p>
    </div>

    @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($projects as $project)
                <div class="group bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col h-full">

                    <div class="h-3 w-full bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-500"></div>

                    <div class="p-8 flex-grow flex flex-col">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 text-xs font-semibold text-indigo-600 bg-indigo-50 rounded-full border border-indigo-100">
                                Laravel
                            </span>
                            <span class="text-gray-400 text-xs">{{ $project->created_at->format('M Y') }}</span>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-indigo-600 transition">
                            {{ __($project->title) }}
                        </h3>

                        <p class="text-gray-600 mb-6 flex-grow leading-relaxed">
                            {{ __($project->description) }}
                        </p>

                        @if($project->url)
                            <a href="{{ $project->url }}" target="_blank" class="mt-auto inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-white transition-colors duration-200 bg-gray-900 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300">
                                <span>{{ __('View Code') }}</span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        @else
                            <button disabled class="mt-auto w-full px-5 py-3 text-sm font-medium text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                {{ __('No URL Available') }}
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center justify-center py-20 bg-white rounded-xl shadow-sm border border-gray-200">
            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            <h3 class="text-lg font-medium text-gray-900">{{ __('No projects found') }}</h3>
            <p class="text-gray-500">{{ __('Run the seeders to load the projects.') }}</p>
        </div>
    @endif
</x-layouts.layout>
