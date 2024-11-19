<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filenames = [];

        $this->info("Running migrations:");

        if (count($filenames) < 1) $this->info("Nothing to migrate");

        foreach ($filenames as $f)
        {
            $this->info($f);
            Artisan::call("migrate", ["--path" => "database/migrations/$f"]);
        }
    }
}
