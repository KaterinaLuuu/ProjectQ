<?php

namespace App\Services;

use App\Contracts\ArticleCreateServiceContract;
use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\ImagesRepositoryContract;
use App\Contracts\TagsSynchronizerContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleCreateService implements ArticleCreateServiceContract
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

    public function createArticle(array $data, $tagRequest, $photo)
    {
        return DB::transaction(function() use ($data, $tagRequest, $photo) {
            if ($photo) {
                $path = Storage::putFile('/public/images', $photo);
                $imageId = $this->imagesRepository->create($path)->id;
                $data['image_id'] = $imageId;
            }

            $article = $this->articlesRepository->create($data);

            $tagCollection = $tagRequest->validated()['tags'];
            $this->tagsSynchronizer->sync($tagCollection, $article);

            return $article;
        }, 5);
    }

}
