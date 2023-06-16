@extends('layouts.ppa')

<x-app-layout>

<div div class="py-1 flex justify-center mb-4">
<form method="POST" action="{{ route('device.update',$dispositivo->id) }}" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label for="nome" class="mb-1 block font-semibold text-gray-700">Nome:</label>
        <input type="text" name="nome" id="nome" required value="{{ old('nome') ?? $dispositivo->nome }}" class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="nome" >
    </div>

    <div>
        <label for="descricao" class="mb-1 block font-semibold text-gray-700">Descrição:</label>
        <input type="text" name="descricao" id="descricao" required value="{{ old('descricao') ?? $dispositivo->descricao }}" class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="descricao" >
    </div>

    <div>
        <label for="mac" class="mb-1 block font-semibold text-gray-700">MAC:</label>
        <input type="text" name="MAC" id="mac" required value="{{ old('MAC') ?? $dispositivo->MAC }}" class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="mac">
        {{-- <small>O MAC deve conter exatamente 12 caracteres alfanuméricos (A-F, a-f, 0-9).</small> --}}
    </div>

    <div class="flex justify-end ">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Alterar</button>
    </div>
</form>
</div>

<div div class="py-1 flex justify-center">
<form action="{{ route('dashboard') }}" method="GET" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-success">{{ 'dashboard' }}</button>
</form>
</div>

<div div class="py-1 flex justify-center">
<form action="{{ route('device.destroy',$dispositivo->id) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Excluir</button>
</form>
</div>

</x-app-layout>

