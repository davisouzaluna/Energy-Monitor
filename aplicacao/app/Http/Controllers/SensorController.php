<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
    public function ultimosDez($topico, $range = 'minute')
{
    // Obtém o horário do último dado inserido
    $dataLimite = Sensor::where('MAC', $topico)
        ->max('data_hora_medicao');

    // Verifica se existe algum dado no banco
    if ($dataLimite) {
        // Define a data limite baseada no range de tempo fornecido
        switch ($range) {
            case 'day':
                $dataLimite = Carbon::parse($dataLimite)->subDay();
                break;
            case 'hour':
                $dataLimite = Carbon::parse($dataLimite)->subHour();
                break;
            case 'month':
                $dataLimite = Carbon::parse($dataLimite)->subMonth();
                break;
            case 'week':
                $dataLimite = Carbon::parse($dataLimite)->subWeek();
                break;
            case 'year':
                $dataLimite = Carbon::parse($dataLimite)->subYear();
                break;
            // Adicione outros casos conforme necessário (ex: week, year, etc.)
        }

        // Obtém os sensores do tópico especificado dentro do range de tempo definido
        $sensores = Sensor::where('MAC', $topico)
            ->where('data_hora_medicao', '>=', $dataLimite)
            ->orderBy('data_hora_medicao', 'desc')
            ->get();

        // Mapeia as datas e horas de medição no formato desejado (d/m/Y H:i:s)
        $labels = $sensores->pluck('data_hora_medicao')->map(function ($item) {
            return Carbon::parse($item)->format('d/m/Y H:i:s');
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

    // Se não houver dados, retorna uma resposta vazia
    return response()->json([
        'labels' => [],
        'valores' => [],
        'sensores' => []
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
