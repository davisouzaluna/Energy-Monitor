<div class="py-1 flex justify-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 sm:p-6 mt-4 mb-2">
                <!-- Ajustando as margens superior (mt-4) e inferior (mb-2) aqui -->
                <h2 class="text-lg font-semibold mb-4">{{ __('Cadastre um novo dispositivo:') }}</h2>
                <form method="POST" action="{{ route('device.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label for="nome" class="mb-1 block font-semibold text-gray-700">Nome:</label>
                        <input type="text" name="nome" id="nome" required value="{{ old('nome') }}"
                            class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="nome">
                    </div>
                    <div>
                        <label for="descricao" class="mb-1 block font-semibold text-gray-700">Descrição:</label>
                        <textarea name="descricao" id="descricao" required class="px-2 py-1 block w-full border-gray-300 rounded-md" autocomplete="descricao">{{ old('descricao') }}</textarea>
                    </div>
                    <div>
                        <label for="mac" class="mb-1 block font-semibold text-gray-700">MAC:</label>
                        <input type="text" maxlength="17" name="MAC" id="mac" required value="{{ old('MAC') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="mac">
                        <p id="mac-char-count" class="text-xs text-gray-500 mt-1">Máximo de 17 caracteres</p>
                        {{-- <small>O MAC deve conter exatamente 12 caracteres alfanuméricos (A-F, a-f, 0-9).</small> --}}
                    </div>

                    <div class="flex justify-center ">
                        <button type="submit" class="px-4 py-2  bg-blue-500 text-white rounded-md transition ease-in-out delay-100 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-200 ">Enviar</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Escuta o evento de mudança no campo de entrada de arquivo
        document.getElementById('imagem').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Obtém o arquivo selecionado pelo usuário

            if (file) {
                // Cria uma URL para a imagem selecionada
                const imageUrl = URL.createObjectURL(file);

                // Exibe a imagem no card
                const cardImage = document.getElementById('card-image');
                cardImage.src = imageUrl;
                cardImage.style.display = 'block'; // Exibe a imagem

                // Limpa o campo de entrada de arquivo
                event.target.value = '';
            }
        });
    });

    
const macInput = document.getElementById('mac');
    const charCount = document.getElementById('mac-char-count');

    macInput.addEventListener('input', function() {
        const maxLength = parseInt(macInput.getAttribute('maxlength'));
        const currentLength = macInput.value.length;

        charCount.textContent = ` ${maxLength - currentLength} caracteres restantes`;

        if (currentLength > maxLength) {
            charCount.style.color = 'red'; // Altere a cor para a desejada em caso de excesso de caracteres
        } else {
            charCount.style.color = 'gray'; // Restaura a cor padrão quando dentro do limite
        }
    });

</script>
