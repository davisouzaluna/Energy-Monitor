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

    public function ultimosDez()
{
    $sensores = Sensor::orderBy('id', 'desc')->limit(10)->get();
    $labels = $sensores->pluck('data_hora_medicao')->map(function ($item) {
    return Carbon::createFromFormat('Y-m-d H:i:s', $item)->format('d/m/Y H:i:s');
});
$valores = $sensores->pluck('corrente');

return view('sensor', compact('labels', 'valores','sensores'));

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
