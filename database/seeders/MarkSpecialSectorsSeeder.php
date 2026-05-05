<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class MarkSpecialSectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, set all sectors to is_special_sector = false (0)
        Sector::query()->update(['is_special_sector' => false]);

        // List of special sector names (exact match required)
        $specialSectorNames = [
            'Pharmaceutical and Medical Device',
            'Agriculture, Food & Horticulture',
            'Defence and Aerospace',
            'Textile',
            'IT Hardware',
            'IT and IT-Enabled Services',
            'Global Capability Centre (GCC)',
            'Electrical & Electronics',
        ];

        // Mark these sectors as special sectors (is_special_sector = true/1)
        foreach ($specialSectorNames as $sectorName) {
            Sector::where('name', $sectorName)
                ->update(['is_special_sector' => true]);
        }
    }
}
