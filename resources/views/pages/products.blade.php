@extends("layouts.app")
@section("title", $car->name)
@section("content")
    <script>
        $(function () {
            $('[data-slick-carousel-detail]').each(function () {
                let $carousel = $(this);

                $carousel.find('[data-slick-carousel-detail-items]').slick({
                    dots: true,
                    arrows: false,
                    appendDots: $carousel.find('[data-slick-carousel-detail-pager]'),
                    rows: 0,
                    customPaging: function (slick, index) {
                        let imageSrc = slick.$slides[index].src;

                        return `
<div class="relative">
  <svg xmlns="http://www.w3.org/2000/svg" class="active-arrow absolute -top-6 left-2/4 -ml-3 text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
  </svg>
  <span class="inline-block border rounded cursor-pointer"><img class="h-20 w-40 object-cover" src="${imageSrc}" alt="" title=""></span>
</div>`;
                    }
                })
            })
        })
    </script>
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">{{$car->name}}</h1>
        <div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
            <div class="col-span-3 border-r-0 sm:border-r pb-4 px-4 text-center catalog-detail-slick-preview" data-slick-carousel-detail>
                <div class="mb-4 border rounded" data-slick-carousel-detail-items>
                    <img class="w-full" src="{{ is_null($car->image) ? Storage::url('public/defaultImages/no-image.jpg'): Storage::url($car->image->path) }}" alt="" title="">
                    <img class="w-full" src="{{ is_null($car->image) ? Storage::url('public/defaultImages/no-image.jpg'): Storage::url($car->image->path) }}" alt="" title="">
                    <img class="w-full" src="{{ is_null($car->image) ? Storage::url('public/defaultImages/no-image.jpg'): Storage::url($car->image->path) }}" alt="" title="">
                    <img class="w-full" src="{{ is_null($car->image) ? Storage::url('public/defaultImages/no-image.jpg'): Storage::url($car->image->path) }} " alt="" title="">
                </div>
                <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2">
                <div class="space-y-4 w-full">
                    <div class="block px-4">
                        <p class="text-base line-through text-gray-400">{{$car->price}} ₽</p>
                        @if ($car->old_price !== null)
                        <p class="font-bold text-2xl text-orange">{{$car->old_price}} ₽</p>
                        @endif
                        <div class="mt-4 block">
                            <form>
                                <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Купить
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="block border-t clear-both w-full" data-accordion data-active>
                        <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                            <span>Параметры</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active style="display: none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <div class="my-4 px-4" data-accordion-details>
                            <table class="w-full">
                                @if (!is_null($car->name))
                                    <x-panels.modelParam text="Салон" value="{{ $car->salon }}" />
                                @endif
                                @if (!is_null($car->carClass))
                                    <x-panels.modelParam text="Класс" value="{{ $car->carClass->name }}" />
                                @endif
                                @if (!is_null($car->kpp))
                                    <x-panels.modelParam text="КПП" value="{{ $car->kpp }}" />
                                @endif
                                @if (!is_null($car->year))
                                    <x-panels.modelParam text="Год выпуска" value="{{ $car->year }}" />
                                @endif
                                @if (!is_null($car->color))
                                    <x-panels.modelParam text="Цвет" value="{{ $car->color }}" />
                                @endif
                                @if (!is_null($car->carBody))
                                    <x-panels.modelParam text="Кузов" value="{{ $car->carBody->name }}" />
                                @endif
                                @if (!is_null($car->carEngine))
                                    <x-panels.modelParam text="Двигатель" value="{{ $car->carEngine->name }}" />
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="block border-t clear-both w-full" data-accordion>
                        <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer" data-accordion-toggle>
                            <span>Описание</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-not-active>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-orange h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-accordion-active style="display: none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <div class="my-4 px-4 space-y-4" data-accordion-details style="display: none">
                            <div>{!! $car->body !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
