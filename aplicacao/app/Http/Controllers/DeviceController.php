<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;


class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispositivos = Device::all();

        return view('device.index', ['dispositivos' => $dispositivos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('device.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $register = Device::create($data);

        //return redirect()->back();
        return redirect()->route('device.index')->with('success', 'Dispositivo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dispositivo = Device::find($id);
        return view('device.edit', ['dispositivo' => $dispositivo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dispositivo = Device::find($id);

        $dispositivo->update($request->all());

        return redirect()->route('device.index', $id)->with('success', 'Dispositivo atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $device = Device::find($id);
        $device->delete();

       /*return redirect()->route('device.index');*/
       return redirect()->route('dashboard');
    }
}
