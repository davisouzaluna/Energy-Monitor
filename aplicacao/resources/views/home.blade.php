@extends('principal')

@section('titlo', 'Home')

@section('conteudo')



<section class="dark:bg-gray-800 dark:text-gray-100 dark:bg-white">
	<div class="container flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
		<div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
			<h1 class="text-blue-700 text-5xl font-bold leading-none sm:text-6xl">
				<span class="dark:text-violet-400">Energy Monitor</span>
			</h1>
			<p class="text-blue-700 mt-6 mb-8 text-lg sm:mb-12">Tenha o controle do consumo dos seus dispositivos.
				<br class="hidden md:inline lg:hidden">
			</p>

		</div>
		<div class="w-full flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
			<img src="{{ asset('img/img2.jpeg') }}" alt="" class="object-contain w-11/12 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
		</div>
	</div>
</section>




{{-- ///////// --}}



@endsection
