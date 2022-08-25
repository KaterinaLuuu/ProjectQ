<?php

namespace App\Services;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\ArticleUpdateServiceContract;
use App\Contracts\TagsSynchronizerContract;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \App\Contracts\ImagesRepositoryContract;

class ArticleUpdateService implements ArticleUpdateServiceContract
{
    private ImagesRepositoryContract $imagesRepository;
    private TagsSynchronizerContract $tagsSynchronizer;
    private ArticlesRepositoryContract $articlesRepository;

    public function __construct(
        ImagesRepositoryContract $imagesRepository,
        TagsSynchronizerContract $tagsSynchronizer,
        ArticlesRepositoryContract $articlesRepository
    )
    {
        $this->imagesRepository = $imagesRepository;
        $this->tagsSynchronizer = $tagsSynchronizer;
        $this->articlesRepository = $articlesRepository;
    }

    public function updateArticle(Article $article, array $data, $tagRequest, $photo): bool
    {
        return DB::transaction(function() use ($article, $data, $tagRequest, $photo) {
        if ($photo) {
            $path = Storage::putFile('/public/images', $photo);
            $imageId = $this->imagesRepository->create($path)->id;
            $data['image_id'] = $imageId;
        }

        $tagCollection = $tagRequest->validated()['tags'];
        $this->tagsSynchronizer->sync($tagCollection, $article);

        return $this->articlesRepository->update($article, $data);
        }, 5);
    }
}
