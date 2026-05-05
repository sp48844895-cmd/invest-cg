<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $sectors = DB::table('sectors')
            ->where('policy_type', 'manufacturing')
            ->get(['id', 'name']);

        foreach ($sectors as $sector) {
            $generalId = DB::table('subsectors')
                ->where('sector_id', $sector->id)
                ->where('name', 'General')
                ->value('id');

            $oldNames = [
                'General - ' . $sector->name,
                'General-' . $sector->name,
                'General -' . $sector->name,
                'General- ' . $sector->name,
            ];

            $oldRows = DB::table('subsectors')
                ->where('sector_id', $sector->id)
                ->whereIn('name', $oldNames)
                ->orderBy('id')
                ->get(['id']);

            if ($oldRows->isEmpty()) {
                continue;
            }

            if ($generalId) {
                DB::table('subsectors')->whereIn('id', $oldRows->pluck('id')->all())->delete();
                continue;
            }

            $keepId = (int) $oldRows->first()->id;
            DB::table('subsectors')->where('id', $keepId)->update(['name' => 'General']);

            $deleteIds = $oldRows->pluck('id')->slice(1)->all();
            if (!empty($deleteIds)) {
                DB::table('subsectors')->whereIn('id', $deleteIds)->delete();
            }
        }
    }

    public function down(): void
    {
    }
};
