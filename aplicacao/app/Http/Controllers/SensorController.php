<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use Illuminate\Support\Carbon;


class SensorController extends Controller
{
    public function index()
    {
        $sensores = Sensor::all();
        $labels = [];
        $data = [];

        foreach ($sensores as $sensor) {
            $labels[] = $sensor->data_hora_medicao->format('Y-m-d H:i:s');
            $data[] = $sensor->corrente;
        }

        return view('sensor', [
            'labels' => $labels,
            'data' => $data
        ]);
    }

  public function ultimosDez($topico)
    {
        // Supondo que você tenha um modelo chamado Sensor para acessar os dados do banco de dados

        // Obtém os últimos 10 sensores do tópico especificado, ordenados pelo ID em ordem descendente
        $sensores = Sensor::where('MAC', $topico)->orderBy('id', 'desc')->limit(10)->get();

        // Mapeia as datas e horas de medição no formato desejado (d/m/Y H:i:s)
        $labels = $sensores->pluck('data_hora_medicao')->map(function ($item) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $item)->format('d/m/Y H:i:s');
        });

        // Obtém os valores da corrente dos sensores
        $valores = $sensores->pluck('corrente');

        // Retorna os dados em formato JSON
        return response()->json([
            'labels' => $labels,
            'valores' => $valores,
            'sensores' => $sensores
        ]);
    }

public function atualizaDados(){
    $sensores = Sensor::orderBy('data_hora_medicao', 'desc')->limit(10)->get();

    $labels = $sensores->pluck('data_hora_medicao')->map(function ($item) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $item)->format('d/m/Y H:i:s');
    });
    $data = $sensores->pluck('corrente');

    return response()->json([
        'labels' => $labels,
        'data' => $data,
    ]);
}


}
