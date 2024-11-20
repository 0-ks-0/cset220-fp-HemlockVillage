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
        $filenames = [
            "2024_11_18_195627_create_roles_table.php",
            "0001_01_01_000000_create_users_table.php",
            "0001_01_01_000001_create_cache_table.php",
            "0001_01_01_000002_create_jobs_table.php",
            "2024_11_19_203321_create_patients_table.php",
            "2024_11_19_205527_create_employees_table.php",
            "2024_11_20_030547_create_families_table.php",
            "2024_11_20_030837_create_admissions_table.php",
            "2024_11_20_031627_create_groups_table.php",
        ];

        $this->info("Running migrations:");

        if (count($filenames) < 1) $this->info("Nothing to migrate");

        foreach ($filenames as $f)
        {
            $this->info($f);
            Artisan::call("migrate", ["--path" => "database/migrations/$f"]);
        }
    }
}
