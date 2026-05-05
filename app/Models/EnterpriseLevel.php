<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterpriseLevel extends Model
{
    use HasFactory;
    protected $fillable = ['name','min_pm_lakh','max_pm_lakh'];
}
