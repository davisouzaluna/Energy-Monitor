<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogErro extends Model
{
    use HasFactory;

    protected $table = 'log_erro';

    protected $fillable = [
        'tipo',
        'mensagem',
        'data_hora',
        'log_erro_sensor_correspondente',
    ];
}
