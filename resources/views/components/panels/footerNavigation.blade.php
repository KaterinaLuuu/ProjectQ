<nav>
    <ul class="list-inside  bullet-list-item">
        <li><a class="{{ Route::is('about') ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}" href="{{route('about')}}">О компании</a></li>
        <li><a class="{{ Route::is('contact') ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}"      href="{{route('contact')}}">Контактная информация</a></li>
        <li><a class="{{ Route::is('termsOfSale') ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}" href="{{route('termsOfSale')}}">Условия продаж</a></li>
        <li><a class="{{ Route::is('financialDepartment') ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}" href="{{route('financialDepartment')}}">Финансовый отдел</a></li>
        <li><a class="{{ Route::is('forClients') ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}" href="{{route('forClients')}}">Для клиентов</a></li>
    </ul>
</nav>
