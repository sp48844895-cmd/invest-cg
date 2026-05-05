<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = ['name','policy_type','is_special_sector'];
    
    protected $casts = [
        'is_special_sector' => 'boolean',
    ];

    public function subsectors()
    {
        return $this->hasMany(Subsector::class);
    }
}
