<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChurchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('churches')->truncate();

        Maatwebsite\Excel\Facades\Excel::import(new App\Imports\ChurchesImport, storage_path('churches.csv'));
    }
}
