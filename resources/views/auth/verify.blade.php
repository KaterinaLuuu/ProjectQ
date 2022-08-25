@extends('layouts.app')
@section('title', 'Подтверждение почты')
@section('content')
<main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
    <div class="py-4 pb-8">
        <h1 class="text-black text-3xl font-bold mb-4">{{ __('Проверьте свой адрес электронной почты') }}</h1>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('На ваш адрес электронной почты отправлена новая ссылка для подтверждения.') }}
            </div>
        @endif

        {{ __('Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.') }}
        {{ __('Если вы не получили письмо') }},

        <form method="post" enctype="multipart/form-data" action="{{ route('verification.resend') }}">
            @csrf
            <div class="block">
                <x-panels.gingerButton buttonMessage="нажмите здесь, чтобы запросить другой"/>
            </div>
        </form>
    </div>
</main>
@endsection
