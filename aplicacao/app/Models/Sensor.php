<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $table = 'sensor';
    protected $fillable = [
        'MAC',
        'corrente',
        'data_hora_medicao',
        'qos',
    ];

    protected $guarded = [
        'id',
    ];

    
}
