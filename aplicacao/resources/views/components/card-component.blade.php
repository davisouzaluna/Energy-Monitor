<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-blue-100 dark:border-gray-700 mx-auto">
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg my-8" src="{{ $imageSrc }}" alt="Pam img" />
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-blue">{{ $name }}</h5>
        <h2 class="text-sm text-gray-500 dark:text-gray-400">Contato</h2>
        <h2 class="text-sm text-gray-500 dark:text-gray-400"><a href="mailto:{{ $email }}" class="text-blue-500 hover:text-green-800 transition-colors duration-300">{{$email}}</a></h2>
        <div class="flex mt-4 space-x-3 md:mt-6">
            <a href="{{ $githubLink }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">GitHub</a>
        </div>
    </div>
</div>
