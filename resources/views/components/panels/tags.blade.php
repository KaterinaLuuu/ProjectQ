@if($article->tags->isNotEmpty())
    <div>
        @foreach($article->tags as $tag)
            <x-panels.tagItem :tag="$tag"/>
        @endforeach
    </div>
@endif
