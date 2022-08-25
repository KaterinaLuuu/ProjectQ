<textarea id="{{$id}}", name="{{$name}}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3">{{$text}}</textarea>
@if($errorMessage !== null)
    <span class="text-xs italic text-red-600">{{$errorMessage}}</span>
@endif
