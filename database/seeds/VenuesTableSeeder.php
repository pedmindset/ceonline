<?php

use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            Venue::create([
                'name' => 'Christ Embassy Nungua Auditorium',
                'church_id' => 1,
                'city' => "Tema",
            ]);
    }
}
