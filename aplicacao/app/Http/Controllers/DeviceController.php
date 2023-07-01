<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        // Verifica se um arquivo de imagem foi enviado
        if ($request->hasFile('imagem')) {
            try {
                $imagem = $request->file('imagem');

                // Obtém o tamanho da imagem em bytes
                $tamanhoImagem = $imagem->getSize();

                // Define o limite máximo de tamanho em bytes (por exemplo, 5 MB)
                $limiteTamanho = 5 * 1024 * 1024; // 5 MB

                // Verifica se o tamanho da imagem excede o limite máximo
                if ($tamanhoImagem > $limiteTamanho) {
                    throw new \Exception('Tamanho da imagem excede o limite permitido.');
                }

                // Redimensiona a imagem para um tamanho máximo de 1280x720 pixels
                $image = Image::make($imagem)->resize(1280, 720);

                // Salva a imagem na pasta public/imagens com qualidade de 90%
                $nomeArquivo = $imagem->getClientOriginalName();
                $image->save(public_path('imagens/' . $nomeArquivo), 90);

                // Define o caminho completo da imagem para o campo "imagem"
                $data['imagem'] = 'imagens/' . $nomeArquivo;
            } catch (\Exception $e) {
                // Trate o erro de processamento ou armazenamento da imagem aqui
                return redirect()->back()->with('error', 'Erro ao processar ou armazenar a imagem: ' . $e->getMessage());
            }
        } else {
            // Define o valor padrão para o campo "imagem"
            $data['imagem'] = 'img/img4_resize.jpeg';
        }

        $register = Device::create($data);

        return redirect()->route('dashboard')->with('success', 'Dispositivo cadastrado com sucesso!');
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

        $data = $request->all();

        // Verifica se um arquivo de imagem foi enviado
        if ($request->hasFile('imagem')) {
            try {
                $imagem = $request->file('imagem');

                // Redimensiona a imagem para um tamanho máximo de 1280x720 pixels
                $image = Image::make($imagem)->resize(1280, 720);


                // Salva a imagem na pasta public/imagens com qualidade de 90%
                $nomeArquivo = $imagem->getClientOriginalName();
                $image->save(public_path('imagens/' . $nomeArquivo), 90);

                // Define o caminho completo da imagem para o campo "imagem"
                $data['imagem'] = 'imagens/' . $nomeArquivo;
            } catch (\Exception $e) {
                // Trate o erro de processamento ou armazenamento da imagem aqui
                return redirect()->back()->with('error', 'Erro ao processar ou armazenar a imagem.');
            }

            // Exclui a imagem anterior, se existir
            if ($dispositivo->imagem) {
                $this->deleteImage($dispositivo->imagem);
            }
        }

        $dispositivo->update($data);

        return redirect()->route('device.edit', $id)->with('success', 'Dispositivo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dispositivo = Device::find($id);

        // Exclui a imagem associada ao dispositivo, se estiver na pasta "imagens"
        if ($dispositivo->imagem && strpos($dispositivo->imagem, 'imagens/') === 0) {
            $this->deleteImage($dispositivo->imagem);
        }

        $dispositivo->delete();

        return redirect()->route('dashboard');
    }
    /**
     * Delete the image file.
     */
    private function deleteImage(string $path)
    {
        // Obtém o caminho completo da imagem
        $imagePath = public_path($path);

        // Verifica se o arquivo existe e exclui
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
