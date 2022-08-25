@php
use App\Models\Article;
@endphp
@extends('layouts.app')
@section('title', 'Изменить новость')
    @section('content')
        <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
            <div class="py-4 pb-8">
                <h1 class="text-black text-3xl font-bold mb-4">Веб-форма</h1>

                @if ($errors->count())
                    @foreach($errors->all() as $error)
                        <x-panels.error errorMessage="{{$error}}"/>
                    @endforeach
                @endif

                <form method="post" enctype="multipart/form-data" action="{{ route('articles.update', ['article' => $article]) }}">
                    @csrf
                    @method('patch')
                    <div class="mt-8 max-w-md">
                        <div class="grid grid-cols-1 gap-6">
                            <x-panels.group :article="$article"/>

                            <div class="block">
                                <x-panels.gingerButton buttonMessage="Изменить"/>
                                <x-panels.greyButton buttonMessage="Отменить"/>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="post" action="{{ route('articles.destroy', ['article' => $article]) }}">
                    @csrf
                    @method("delete")
                    <x-panels.deleteButton buttonMessage="Удалить" />
                </form>
            </div>
        </main>
    @endsection
