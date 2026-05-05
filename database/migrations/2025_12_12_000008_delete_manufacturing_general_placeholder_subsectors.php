<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $sectorIds = DB::table('sectors')
            ->where('policy_type', 'manufacturing')
            ->pluck('id')
            ->all();

        if (empty($sectorIds)) {
            return;
        }

        DB::table('subsectors')
            ->whereIn('sector_id', $sectorIds)
            ->where('name', 'General')
            ->whereNull('min_capital_investment_lakh')
            ->where('is_thrust', 0)
            ->delete();

        DB::table('subsectors')
            ->whereIn('sector_id', $sectorIds)
            ->where('name', 'like', 'General%')
            ->whereNull('min_capital_investment_lakh')
            ->where('is_thrust', 0)
            ->delete();
    }

    public function down(): void
    {
    }
};
