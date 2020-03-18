<?php

use Illuminate\Database\Seeder;

class PaymentCategoriesTableSeeder extends Seeder
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
                'title' => 'Offering',
                'church_id' => 1,
                'partnership'=> 0
            ],

            [
                'title' => 'Tithe',
                'church_id' => 1,
                'partnership'=> 0
            ],

            [
                'title' => 'First Fruit',
                'church_id' => 1,
                'partnership'=> 0
            ],

            [
                'title' => 'Special Seed',
                'church_id' => 1,
                'partnership'=> 0
            ],

            [
                'title' => 'Thanksgiving Seed',
                'church_id' => 1,
                'partnership'=> 0
            ],

            [
                'title' => 'Healing School',
                'church_id' => 1,
                'partnership'=> 1
            ],

            [
                'title' => 'Rhapsody of Realities',
                'church_id' => 1,
                'partnership'=> 1
            ],

            [
                'title' => 'Programs',
                'church_id' => 1,
                'partnership'=> 1
            ],

        ];

        foreach ($data as $category) {
            PaymentCategory::create($category);

        }
    }
}
