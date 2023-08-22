<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $table = 'structure';
    protected $primaryKey = 'unit_id';
    protected $fillable = ['unit_type', 'unit_name', 'unit_parent_id'];

    public function users()
    {
        return $this->hasMany(User::class, 'parent_unit', 'unit_id');
    }

    public function parent()
    {
        return $this->belongsTo(Structure::class, 'unit_parent_id');
    }

//    public function children()
//    {
//        return $this->hasMany(Structure::class, 'unit_parent_id');
//    }


}
