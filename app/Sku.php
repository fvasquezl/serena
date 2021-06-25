<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'concentration',
        'unitQty',
        'skuDate',
        'unitInput',
        'unitOutput',
        'presentation_id',
        'unit_id',
        'user_id',
        'category_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'skuDate' => 'date',
        'unitInput' => 'float',
        'unitOutput' => 'float',
        'presentation_id' => 'integer',
        'unit_id' => 'integer',
        'user_id' => 'integer',
        'category_id' => 'integer',
    ];


    public function bins()
    {
        return $this->hasMany(\App\Bin::class);
    }

    public function presentation()
    {
        return $this->belongsTo(\App\Presentation::class);
    }

    public function unit()
    {
        return $this->belongsTo(\App\Unit::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }
}
