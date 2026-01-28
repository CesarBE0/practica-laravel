<x-layout>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">{{ __('Create New Project') }}</h2>

        <form action="{{ route('projects.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Title') }}</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition @error('title') border-red-500 @enderror">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Description') }}</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="url" class="block text-sm font-medium text-gray-700 mb-1">URL ({{ __('Optional') }})</label>
                <input type="url" name="url" id="url" value="{{ old('url') }}" placeholder="https://..."
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition">
                @error('url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end space-x-4 pt-4">
                <a href="{{ route('projects.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">{{ __('Cancel') }}</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-6 rounded-lg shadow transition transform hover:-translate-y-0.5">
                    {{ __('Save Project') }}
                </button>
            </div>
        </form>
    </div>
</x-layout>
