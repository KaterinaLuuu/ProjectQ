<aside class="hidden sm:block col-span-1 border-r p-4">
    <nav>
        <ul class="text-sm">
            <li>
                <p class="text-xl text-black font-bold mb-4">Информация</p>
                <ul class="space-y-2">
                    <li><a class="{{ Route::is('about') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('about')}}">О компании</a></li>
                    <li><a class="{{ Route::is('contact') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('contact')}}">Контактная информация</a></li>
                    <li><a class="{{ Route::is('termsOfSale') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('termsOfSale')}}">Условия продаж</a></li>
                    <li><a class="{{ Route::is('financialDepartment') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('financialDepartment')}}">Финансовый отдел</a></li>
                    <li><a class="{{ Route::is('forClients') ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('forClients')}}">Для клиентов</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
