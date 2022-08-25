<?php //// routes/breadcrumbs.php
//
//// Note: Laravel will automatically resolve `Breadcrumbs::` without
//// this import. This is nice for IDE syntax and refactoring.
//use Diglactic\Breadcrumbs\Breadcrumbs;
//
//// This import is also not required, and you could replace `BreadcrumbTrail $trail`
////  with `$trail`. This is nice for IDE type checking and completion.
//use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
//

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

$articlesRepository = \App::make('App\Contracts\ArticlesRepositoryContract');
$carsRepository = \App::make('App\Contracts\CarsRepositoryContract');
$categoriesRepository = \App::make('App\Contracts\CategoryRepositoryContract');

// Index
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('index'));
});

// Index > About
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('О компании', route('about'));
});

// Index > FinancialDepartment
Breadcrumbs::for('financialDepartment', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Финансовый отдел', route('financialDepartment'));
});

// Index > Contact
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Контакты', route('contact'));
});

// Index > ForClients
Breadcrumbs::for('forClients', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Для клиентов', route('forClients'));
});

// Index > TermsOfSale
Breadcrumbs::for('termsOfSale', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Условия продажи', route('termsOfSale'));
});

// Index > Salons
Breadcrumbs::for('salons', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Салоны', route('salons'));
});

// Index > Login
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('index');
    $trail->push('Авторизация', route('login'));
});

// Index > Register
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('index');
    $trail->push('Регистрация', route('register'));
});

Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('login');
    $trail->push('Сброс пароля', route('password.request'));
});

Breadcrumbs::for('password.update', function ($trail) {
    $trail->parent('login');
    $trail->push('Изменение пароля', route('password.update'));
});

Breadcrumbs::for('password.reset', function ($trail) {
    $trail->parent('login');
    $trail->push('Восстановление пароля', route('password.reset'));
});

Breadcrumbs::for('password.confirm', function ($trail) {
    $trail->parent('login');
    $trail->push('Подтверждение пароля', route('password.email'));
});

Breadcrumbs::for('password.email', function ($trail) {
    $trail->parent('login');
    $trail->push('Подтверждение пароля', route('password.confirm'));
});

// Index > Account
Breadcrumbs::for('account', function ($trail) {
    $trail->parent('index');
    $trail->push('Личный кабинет', route('account'));
});

// Index > Articles
Breadcrumbs::for('articles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Новости', route('articles.index'));
});

// Index > Articles > [Article]
Breadcrumbs::for('articles.show', function (BreadcrumbTrail $trail, $article) use ($articlesRepository) {
    $trail->parent('articles.index');
    $trail->push($article->title, route('articles.show', $article->slug));
});

// Photos > Articles > New Article
Breadcrumbs::for('articles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('articles.index');
    $trail->push('Создать новость', route('articles.create'));
});

// Photos > Articles > [Article] > Article Edit
Breadcrumbs::for('articles.edit', function (BreadcrumbTrail $trail, $article) use ($articlesRepository) {
    $trail->parent('articles.show', $article);
    $trail->push('Изменить новость ', route('articles.edit', $article->slug));
});

// Index > Catalog > ...[Categories]
Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail, $category = null) use ($categoriesRepository) {
    $trail->parent('index');
    $trail->push('Каталог', route('catalog'));

    if (!is_null($category)) {
        $categoriesId = $categoriesRepository->getLinksBySlug($category);
        foreach ($categoriesId as $id) {
            $category = $categoriesRepository->findById($id);
            $trail->push($category->name, route('catalog', $category->slug));
        }
    }
});

// Index > Catalog > [Car]
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $car) use ($carsRepository, $categoriesRepository) {
    $car = $carsRepository->getFirstCarById($car);
    $trail->parent('catalog');

    $categorySlug = $categoriesRepository->findById($car->category_id)->slug;
    $categoriesId = $categoriesRepository->getLinksBySlug($categorySlug);

    foreach ($categoriesId as $id) {
        $category = $categoriesRepository->findById($id);
        $trail->push($category->name, route('catalog', $category->slug));
    }

    $trail->push($car->name, route('product', $car->id));
});


