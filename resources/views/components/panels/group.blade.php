{{--@dd($article->body, $article->description)--}}
<x-panels.groupInput titleInput="title" textInput="Заголовок">
    <x-panels.textInput id="title" value="{{ old('title', $article->title)}}" name="title" errorMessage="{{$errors->first('title')}}"/>
</x-panels.groupInput>
<x-panels.textareaBlock titleInput="description" textInput="Краткое описание">
    <x-panels.textareaInput id="body" text="{{ old('body', $article->body)}}" name="body" errorMessage="{{$errors->first('body')}}"/>
</x-panels.textareaBlock>
<x-panels.textareaBlock titleInput="body" textInput="Детальное описание">
    <x-panels.textareaInput id="description" text="{{ old('description', $article->description)}}" name="description" errorMessage="{{$errors->first('description')}}"/>
</x-panels.textareaBlock>
<x-panels.groupInput titleInput="title" textInput="Теги">
    <x-panels.tagsInput :article="$article" id="tags" name="tags" errorMessage="{{$errors->first('tags')}}"/>
</x-panels.groupInput>
<x-panels.checkboxBlock titleInput="published_at">
    <x-panels.checkboxInput text="Опубликовать" name="published_at"/>
</x-panels.checkboxBlock>
<x-panels.groupInput titleInput="photo" textInput="Выбирете фото">
    <x-panels.imageInput name="photo" errorMessage="{{$errors->first('images')}}"/>
</x-panels.groupInput>




