<input type="file" name="{{$name}}" multiple accept="image/png, image/jpeg">
@if($errorMessage !== null)
    <span class="text-xs italic text-red-600">{{$errorMessage}}</span>
@endif
