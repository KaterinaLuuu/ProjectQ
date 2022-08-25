<?php

namespace App\Services;

use App\Contracts\StatisticsRepositoryContract;
use App\Contracts\StatisticsServiceContract;

class StatisticsService implements StatisticsServiceContract
{
    public StatisticsRepositoryContract $contract;

    public function __construct(StatisticsRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function getTableData(): array
    {
        $longArticle = $this->contract->longArticle();
        $shortArticle = $this->contract->shortArticle();
        $mostTaggedNews = $this->contract->mostTaggedNews();

        return [
            ['Общее количество машин', $this->contract->getCountCar()],
            ['Общее количество новостей', $this->contract->getCountArticle()],
            ['Тег, у которого больше всего новостей на сайте', $this->contract->mostRepeatedTag()->name],
            ['Самая длинная новость', 'Название новости ' . $longArticle->title . ', id = ' . $longArticle->id . ', длина новости = ' . strlen($longArticle->body)],
            ['Самая короткая новость', 'Название новости ' . $shortArticle->title . ', id = ' . $shortArticle->id . ', длина новости = ' . strlen($shortArticle->body)],
            ['Средние количество новостей у тега', $this->contract->averageNumberOfTags()],
            ['Самая тегированная новость', 'Название новости ' . $mostTaggedNews->title . ', id = ' . $mostTaggedNews->id . ', кол-во тегов = ' . $mostTaggedNews->tags_count],
        ];
    }

    public function getColumnNames(): array
    {
        return [
            'Название статистических данных',
            'Информация по данным'
        ];
    }
}
