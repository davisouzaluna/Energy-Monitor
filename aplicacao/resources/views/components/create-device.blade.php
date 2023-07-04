<!-- Botão para abrir o modal -->
<div class="d-flex justify-content-center align-items-center" style="height: 10vh;">
<button onclick="openModal()" class="px-4 py-2 bg-green-500 text-white rounded-md transition ease-in-out delay-100 bg-green-650 hover:-translate-y-1 hover:scale-110 hover:bg-green-800 duration-200">Cadastre novo Dispositivo</button>
</div>
<!-- Modal -->
<div id="myModal" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="text-xl font-medium text-gray-900 dark:text-white">{{ __('Cadastre um novo dispositivo:') }}</h2>
            <button type="button" class="close" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('device.store') }}" enctype="multipart/form-data" class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8">
                @csrf
                <div class="form-group">
                    <label for="nome" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Nome:</label>
                    <input type="text" name="nome" id="nome" required value="{{ old('nome') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="nome">
                </div>
                <div class="form-group">
                    <label for="descricao" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Descrição:</label>
                    <input type="text" name="descricao" id="descricao" required value="{{ old('descricao') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="descricao">
                </div>
                <div class="form-group">
                    <label for="mac" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">MAC:</label>
                    <input type="text" maxlength="12" name="MAC" id="mac" required value="{{ old('MAC') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="mac">
                </div>
                <div>
                    <label for="imagem" class="mb-1 block font-semibold text-gray-700">Imagem:</label>
                    <input type="file" name="imagem" id="imagem"
                        class="block w-full border-gray-300 rounded-md" accept="image/*">
                </div>
                <img id="card-image" src="" style="display: none;">

                <div class="flex justify-center">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
                </div>
                
                
            </form>
        </div>
    </div>
</div>

<!-- Script para abrir e fechar o modal -->
<script>
    function openModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "flex";
        modal.classList.add("fade-in");
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.classList.remove("fade-in");
        setTimeout(function() {
            modal.style.display = "none";
        }, 300); // Tempo para a animação ser concluída
    }

    // Fechar o modal ao clicar fora dele
    window.onclick = function(event) {
        var modal = document.getElementById("myModal");
        if (event.target === modal) {
            closeModal();
        }
    };

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
</script>

<style>
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal-content {
        background-color: #fff;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        max-width: 95%;
        width: 30rem;
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .modal-overlay.fade-in .modal-content {
        opacity: 1;
        transform: translateY(0);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #ddd;
    }

    .modal-body {
        padding: 1rem;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 1rem;
        border-top: 1px solid #ddd;
    }

    .close {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.5rem;
    }
</style>
