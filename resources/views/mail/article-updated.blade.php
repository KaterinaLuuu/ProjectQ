@component('mail::message')
# Обновлена новость: {{ $article->title }}

{{ $article->body }}

@component('mail::button', ['url' => '/articles/' . $article->slug])
    Посмотреть новость
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
