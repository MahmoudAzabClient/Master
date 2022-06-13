<?php

use Illuminate\Database\Seeder;

class BrancheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Branche::create([
            'name'  => 'Branche1',
            'sales'  => '100500',
            'expenses' => '1500',
            'date' => '2022-05-24'
        ]);
        factory(\App\Models\Branche::class, 20)->create();
    }
}
