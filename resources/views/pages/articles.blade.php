@extends('layouts.inner')

@section("title", "Все новости")

@section("innerContent")

    <main class="flex-1 container mx-auto bg-white flex">

        <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
            <x-panels.asideNavigation/>
            <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
                <h1 class="text-black text-3xl font-bold mb-4">Новости
                    @admin
                    | <a href="{{ route('articles.create') }}" class="hover:text-orange">Создать новость</a>
                    @endadmin
                </h1>

                <div class="space-y-4">
                    @foreach($articles as $article)
                        <x-panels.articlesPageItem :article="$article"/>
                    @endforeach
                    <div>
                        {{ $articles->links("vendor/pagination/tailwind") }}
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
