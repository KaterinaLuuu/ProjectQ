@extends('layouts.app')
@section('title', 'Восстановление пароля')
@section('content')
    <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
        <div class="py-4 pb-8">
            <h1 class="text-black text-3xl font-bold mb-4">{{ __('Восстановление пароля') }}</h1>

            <form method="post" enctype="multipart/form-data" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <x-panels.groupInput titleInput="email" textInput="Email">
                            <x-panels.emailInput id="email" value="{{ old('email')}}" name="email" placeholderInput="Введите email" errorMessage="{{$errors->first('email')}}"/>
                        </x-panels.groupInput>
                        <x-panels.groupInput titleInput="password" textInput="Пароль">
                            <x-panels.passwordInput id="password" value="{{ old('password')}}" name="password" placeholderInput="Придумайте пароль" errorMessage="{{$errors->first('password')}}"/>
                        </x-panels.groupInput>
                        <x-panels.groupInput titleInput="password" textInput="Подтверждение пароля">
                            <x-panels.passwordInput id="password-confirm" value="{{ old('password_confirmation')}}" name="password_confirmation" placeholderInput="Подтвердите пароль" errorMessage="{{$errors->first('password')}}"/>
                        </x-panels.groupInput>

                        <div class="block">
                            <x-panels.gingerButton buttonMessage="Изменить пароль"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
