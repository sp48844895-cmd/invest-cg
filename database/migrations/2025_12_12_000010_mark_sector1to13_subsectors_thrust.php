<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('subsectors')
            ->whereIn('sector_id', range(1, 13))
            ->update(['is_thrust' => 1]);
    }

    public function down(): void
    {
        // Intentionally left blank (non-destructive revert)
    }
};
