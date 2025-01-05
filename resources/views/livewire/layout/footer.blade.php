<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
  /**
   * Log the current user out of the application.
   */

}; ?>

<footer class="w-full p-4 flex flex-col justify-between text-primary sm:px-[60px] md:px-[100px] lg:px-[188px] ">
  <div class="w-full flex justify-between flex-wrap">
    <div class="text-primary text-left w-fit">
      <h3 class="text-xl underline">Redes Sociais</h3>
      <p class='text-base mt-1'>Facebook | Instagram</p>
      <p class='text-base mt-1'>Site desenvolvido por B20</p>
    </div>

    <div class="text-primary md:text-left text-right w-fit">
      <h3 class="text-xl underline">Turismo</h3>
      <p class='text-base mt-1'>Sobre</p>
      <p class='text-base mt-1'>Política de Privacidade</p>
      <p class='text-base mt-1'>Termos de Uso</p>
    </div>

    <div class="text-primary text-left w-full md:w-auto">
      <h3 class="text-xl underline">Newsletter</h3>
      <p class='text-base mt-1'>Inscreva-se e receba novidades</p>
      <p class='-mt-1 text-base '>sobre turismo e o Turismo</p>
      <form class="flex justify-center items-center gap-2">
        <input type="email" placeholder="E-mail" class="p-1 border border-gray-300 rounded-md">
        <button class="py-1 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600">Enviar</button>
      </form>
    </div>
  </div>
  <p class="text-center sm:mt-16 mt-7 text-xs">© Copyright Turismo 2024</p>
</footer>