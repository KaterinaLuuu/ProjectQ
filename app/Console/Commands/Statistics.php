<?php

namespace App\Console\Commands;

use App\Contracts\StatisticsServiceContract;
use Illuminate\Console\Command;

class Statistics extends Command
{
    private StatisticsServiceContract $statisticsService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Формирование в виде таблички статистических данных по заданию';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(StatisticsServiceContract $statisticsService)
    {
        parent::__construct();
        $this->statisticsService = $statisticsService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->table(
            $this->statisticsService->getColumnNames(),
            $this->statisticsService->getTableData()
        );
    }
}
