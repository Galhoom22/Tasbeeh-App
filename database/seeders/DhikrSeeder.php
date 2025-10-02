<?php

namespace Database\Seeders;

use App\Models\Dhikr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DhikrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dhikrs = [
            ['text' => 'سبحان الله', 'target_count' => 33],
            ['text' => 'الحمد لله', 'target_count' => 33],
            ['text' => 'الله أكبر', 'target_count' => 34],
            ['text' => 'لا إله إلا الله', 'target_count' => 100],
            ['text' => 'أستغفر الله', 'target_count' => 100],
        ];

        foreach ($dhikrs as $dhikr) {
            Dhikr::create($dhikr);
        }
    }
}
