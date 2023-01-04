<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $primaryKey = 'agency_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'country',
        'type'
    ];
}
