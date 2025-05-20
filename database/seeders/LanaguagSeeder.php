<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanaguagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrayData = [
            'Tamil',
            'English',
            'Spanish',
            'French',
            'German',
        ];
        foreach ($arrayData as $data) {
            Language::create([
                'language_name' => $data,
            ]);
        }
    }
}
