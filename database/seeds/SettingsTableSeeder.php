<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'setting_key' => 'headerTitleText',
                'setting_value' => 'Laravel 5 Starter',
				'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ], [
                'setting_key' => 'dateFormat',
                'setting_value' => 'd/m/Y',
				'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ], [
                'setting_key' => 'resultsPerPage',
                'setting_value' => '15',
				'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ]);
    }
}
