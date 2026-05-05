<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FciSubsidy extends Model
{
    use HasFactory;
    protected $fillable = [
        'policy_type',
        'enterprise_id',
        'enterprise_level_id',
        'area_group_id',
        'fci_percentage',
        'fci_max_limit_lakh',
    ];
}
