<input value="{{ old('tags', $article->tags->pluck('name')->implode(',')) }}" name="{{ $name }}" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
@if ($errorMessage !== null)
    <span class="text-xs italic text-red-600">{{ $errorMessage }}</span>
@endif
