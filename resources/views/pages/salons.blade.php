@extends('layouts.inner')
@section('title', 'Салоны')
@section('innerContent')
    <main class="flex-1 container mx-auto bg-white flex">

        <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
            <x-panels.asideNavigation/>
            <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
                <h1 class="text-black text-3xl font-bold mb-4">Салоны</h1>

                <div class="space-y-4 max-w-4xl">
                    @if($salons)
                    @for($i = 0; $i<count($salons); $i++)
                        @if($i % 2 == 0)
                            <x-panels.leftSalon :salon="$salons[$i]"/>
                        @else
                            <x-panels.rightSalon :salon="$salons[$i]"/>
                        @endif
                    @endfor
                    @else
                    Сервер недоступен. Обновите страницу.
                    @endif
                </div>

                <div class="my-4 space-y-4 max-w-4xl">
                    <hr>

                    <p class="text-black text-2xl font-bold mb-4">Салоны на карте</p>

                    <div class="bg-gray-200">
                        Карта с салонами
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
