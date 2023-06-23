
    <div>
        <!-- Botão que abre o modal -->
        <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded" >
            Adicionar Dispositivo
        </button>

        <!-- Modal de cadastro de dispositivo -->
        <div class="fixed inset-0 flex items-center justify-center z-50" x-show="openModal">
            <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
            <div class="bg-white rounded-lg p-6 max-w-md">
                <div class="py-1 flex justify-center">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-4 sm:p-6 mt-1 mb-1">
                                <h2 class="text-lg font-semibold mb-4">{{ __('Cadastre um novo dispositivo:') }}</h2>
                                <form method="POST" action="{{ route('device.store') }}" class="space-y-6">
                                    @csrf

                                    <div>
                                        <label for="nome" class="mb-1 block font-semibold text-gray-700">Nome:</label>
                                        <input type="text" name="nome" id="nome" required value="{{ old('nome') }}" class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="nome">
                                    </div>

                                    <div>
                                        <label for="descricao" class="mb-1 block font-semibold text-gray-700">Descrição:</label>
                                        <input type="text" name="descricao" id="descricao" required value="{{ old('descricao') }}" class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="descricao">
                                    </div>

                                    <div>
                                        <label for="mac" class="mb-1 block font-semibold text-gray-700">MAC:</label>
                                        <input type="text" name="MAC" id="mac" required value="{{ old('MAC') }}" class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="mac">
                                        {{-- <small>O MAC deve conter exatamente 12 caracteres alfanuméricos (A-F, a-f, 0-9).</small> --}}
                                    </div>

                                    <div class="flex justify-center">
                                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

