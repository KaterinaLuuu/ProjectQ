@php
use App\Models\Article;
@endphp
@extends('layouts.app')
@section('title', 'Создать новость')
    @section('content')
        <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
            <div class="py-4 pb-8">
                <h1 class="text-black text-3xl font-bold mb-4">Веб-форма</h1>

                @if ($errors->count())
                    @foreach($errors->all() as $error)
                        <x-panels.error errorMessage="{{$error}}"/>
                    @endforeach
                @endif

                <form method="post" enctype="multipart/form-data" action="{{ route('articles.store') }}">
                    @csrf
                    <div class="mt-8 max-w-md">
                        <div class="grid grid-cols-1 gap-6">
                            <x-panels.group :article="new Article()"/>

                            <div class="block">
                                <x-panels.gingerButton buttonMessage="Сохранить"/>
                                <x-panels.greyButton buttonMessage="Отменить"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    @endsection
