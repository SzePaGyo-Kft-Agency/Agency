<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    use HasFactory;
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('event_id', '=', $this->getAttribute('event_id'));

        return $query;
    }

    protected $fillable = [
        'user_id',
        'event_id',
        'present'
    ];
}
