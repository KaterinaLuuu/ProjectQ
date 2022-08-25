<?php

namespace App\Http\Controllers;

use App\Contracts\ArticleCreateServiceContract;
use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\ArticleUpdateServiceContract;
use App\Http\Requests\ArticleFormRequest;
use App\Http\Requests\TagRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;

class ArticlesController extends Controller
{
    private $articlesRepository;
    private $page;

    public function __construct(ArticlesRepositoryContract $articlesRepository, Request $request)
    {
        $this->articlesRepository = $articlesRepository;
        $this->page = is_null($request->page) ? 1 : $request->page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): view
    {
        $articles = $this->articlesRepository->articlePaginate($this->page);
        return view('pages.articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->authorize('create', Article::class);
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleFormRequest $request
     * @return Response
     */
    public function store(
        ArticleFormRequest $request,
        TagRequest $tagRequest,
        ArticleCreateServiceContract $articleCreateService
    ) {
        $articleCreateService->createArticle(
            $request->validated(),
            $tagRequest,
            $request->file('photo'),
        );

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return View
     */

    public function show(Article $article): view
    {
        return view('pages.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return View
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('pages.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleFormRequest $request
     * @param TagRequest $tagRequest
     * @param Article $article
     * @param ArticleUpdateServiceContract $articleUpdateService
     */
    public function update(
        ArticleFormRequest $request,
        TagRequest $tagRequest,
        Article $article,
        ArticleUpdateServiceContract $articleUpdateService,
    )
    {
        $articleUpdateService->updateArticle(
            $article,
            $request->validated(),
            $tagRequest,
            $request->file('photo')
        );

        return redirect(route("articles.show", ["article" => $article]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $this->articlesRepository->delete($article);
        return redirect(route('articles.index'));
    }
}
