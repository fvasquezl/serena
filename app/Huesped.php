<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huesped extends Model
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
        'cam',
        'house_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'house_id' => 'integer',
    ];


    public function bins()
    {
        return $this->hasMany(\App\Bin::class);
    }

    public function house()
    {
        return $this->belongsTo(\App\House::class);
    }
}
