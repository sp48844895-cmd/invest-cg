<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestSubsidy extends Model
{
    use HasFactory;
    protected $fillable = [
        'policy_type',
        'enterprise_id',
        'enterprise_level_id',
        'area_group_id',
        'interest_term_years',
        'interest_percentage',
        'interest_max_limit_lakh',
    ];
}
