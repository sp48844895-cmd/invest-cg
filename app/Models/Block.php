<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable = ['name','district_id','area_group_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function areaGroup()
    {
        return $this->belongsTo(AreaGroup::class);
    }
}
