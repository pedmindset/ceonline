<?php

use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class ServiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'church service',
                'church_id' => 1,
            ],

            [
                'title' => 'music concert',
                'church_id' => 1,
            ],

            [
                'title' => 'crusade',
                'church_id' => 1,
            ],

            [
                'title' => 'special event',
                'church_id' => 1,
            ],

           

        ];

        foreach ($data as $type) {
            ServiceType::create($type);

        }
    }
}
