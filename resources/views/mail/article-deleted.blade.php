@component('mail::message')
# Новость {{ $article->title }} удалена.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
