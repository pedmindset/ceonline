<?php

use App\Models\Church;
use Illuminate\Database\Seeder;

class ChurchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Church::create([
            'grow_id' => 237,
            'name' => 'Christ Embassy Nungua'
        ]);
    }
}
