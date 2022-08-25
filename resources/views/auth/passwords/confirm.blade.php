@extends('layouts.app')
@section('title', 'Подтверждение пароля')
@section('content')
<main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
    <div class="py-4 pb-8">
        <h1 class="text-black text-3xl font-bold mb-4">{{ __('Подтверждение пароля') }}</h1>

        {{ __('Пожалуйста, подтвердите свой пароль, прежде чем продолжить.') }}

        <form method="post" enctype="multipart/form-data" action="{{ route('password.confirm') }}">
            @csrf
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <x-panels.groupInput titleInput="password" textInput="Пароль">
                        <x-panels.passwordInput id="password" value="{{ old('password')}}" name="password" placeholderInput="Пароль" errorMessage="{{$errors->first('password')}}"/>
                    </x-panels.groupInput>

                    <div class="block">
                        <x-panels.gingerButton buttonMessage="Подтвердить пароль"/>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link hover:text-orange" href="{{ route('password.request') }}">
                                {{ __('Забыли пароль?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
