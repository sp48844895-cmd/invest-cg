<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsector extends Model
{
    use HasFactory;
    protected $fillable = ['sector_id','name','is_thrust','min_capital_investment_lakh','service_conditions','eligibility_rules_json'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
