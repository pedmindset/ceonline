<?php

use Illuminate\Database\Seeder;
use App\Models\AnnouncementCategory;

class AnnouncementCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnnouncementCategory::create([
            'title' => 'General',
            'church_id' => 1
        ]);
    }
}
