<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class make_migration_order extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make_migration_order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the migrations in the order specified in the file app/Console/Comands/MigrateInOrder.php \n Drop all the table in db before execute the command.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        /** Specify the names of the migrations files in the order you want to 
        * loaded
        * $migrations =[ 
        *               'xxxx_xx_xx_000000_create_nameTable_table.php',
        *    ];
        */
        $migrations = [ 
            '2014_10_12_000000_create_users_table.php',
            '2014_10_12_100000_create_password_resets_table.php',
            '2019_08_19_000000_create_failed_jobs_table.php',
            '2019_12_14_000001_create_personal_access_tokens_table.php',
            '2024_01_22_032707_create_zipcodes_table.php',
            '2023_10_16_075102_create_products_table.php',
            '2023_10_16_080718_create_items_table.php',
            '2023_10_16_081143_create_schedules_table.php',
            '2023_10_16_081625_create_breakes_table.php',
            '2023_10_16_082047_create_ingredients_table.php',
            '2023_10_16_094249_create_pizza_stores_table.php',
            '2023_10_18_104948_create_categories_table.php',
            '2023_10_19_071817_create_customers_table.php',
            '2023_10_20_075754_create_days_table.php',
            '2023_11_02_111308_create_ingredient_products_table.php',
            '2023_11_03_092809_create_day_schedules_table.php',
            '2023_11_03_111354_create_menus_table.php',
            '2023_11_09_130251_create_menu_products_table.php',
            '2023_11_21_113650_create_delivery_addresses_table.php',
            '2023_11_21_114317_create_orders_table.php',
            '2023_11_21_115005_create_item_orders_table.php',
            '2023_12_06_100107_create_favorites_table.php',
            '2024_01_22_032721_create_delivery_checkers_table.php'
        ];

        foreach($migrations as $migration)
        {
        $basePath = 'database/migrations/';          
        $migrationName = trim($migration);
        $path = $basePath.$migrationName;
        $this->call('migrate:refresh', [
        '--path' => $path ,            
        ]);}
    }
}