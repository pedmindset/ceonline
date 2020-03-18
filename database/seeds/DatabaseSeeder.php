<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ChurchesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AnnouncementCategoriesTableSeeder::class);
        $this->call(VenuesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PaymentCategoriesTableSeeder::class);
        $this->call(ServiceTypesTableSeeder::class);
    }
}
