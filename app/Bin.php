<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'huesped_id',
        'sku_id',
        'dailyDose',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'huesped_id' => 'integer',
        'sku_id' => 'integer',
        'dailyDose' => 'float',
    ];


    public function huesped()
    {
        return $this->belongsTo(\App\Huesped::class);
    }

    public function sku()
    {
        return $this->belongsTo(\App\Sku::class);
    }
}
