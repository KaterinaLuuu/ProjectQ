@extends('layouts.app')
@section('title', 'Сброс пароля')
@section('content')
    <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
        <div class="py-4 pb-8">
            <h1 class="text-black text-3xl font-bold mb-4">{{ __('Сброс пароля') }}</h1>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="post" enctype="multipart/form-data" action="{{ route('password.email') }}">
                @csrf
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <x-panels.groupInput titleInput="email" textInput="Email">
                            <x-panels.emailInput id="email" value="{{ old('email')}}" name="email" placeholderInput="Введите email" errorMessage="{{$errors->first('email')}}"/>
                        </x-panels.groupInput>

                        <div class="block">
                            <x-panels.gingerButton buttonMessage="Отправить ссылку для сброса пароля"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
