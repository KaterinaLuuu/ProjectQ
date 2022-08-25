@extends('layouts.app')
@section('title', 'Рога и Сила - Главная страница')
@section('content')
    <section class="bg-white">
        <div data-slick-carousel>
            @foreach($banners as $banner)
                <x-panels.banner :banner="$banner"/>
            @endforeach
        </div>
    </section>
    @if ($cars !== null)
        <x-panels.modelWeek :cars="$cars"/>
    @endif
    <x-panels.articlesMain :articles="$articles"/>
@endsection
