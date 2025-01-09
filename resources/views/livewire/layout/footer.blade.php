<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
  /**
   * Log the current user out of the application.
   */

}; ?>


<footer class="w-full p-4 flex flex-col sm:justify-between justify-center text-primary sm:px-[60px] md:px-[110px] lg:px-[188px]">
  <div class="w-full flex sm:justify-between justify-center flex-wrap ">
    <div class="text-primary sm:text-left text-center w-fit px-3">
      <h3 class="text-xl underline">Redes Sociais</h3>
      <p class='text-base mt-1'>Facebook | Instagram</p>
      <p class='text-base xs:mt-1 mt-0'>Site desenvolvido por B20</p>
    </div>

    <div class="text-primary sm:text-right md:text-left xs:mt-0 mt-4 text-center w-fit px-3">
      <h3 class="text-xl underline">Turismo</h3>
      <p class='text-base xs:mt-1 mt-0'>Sobre</p>
      <p class='text-base xs:mt-1 mt-0'>Política de Privacidade</p>
      <p class='text-base xs:mt-1 mt-0'>Termos de Uso</p>
    </div>

    <div class="text-primary sm:text-left text-center xs:mt-0 mt-4  md:w-auto px-3">
      <h3 class="text-xl underline">Newsletter</h3>
      <p class='text-base mt-1'>Inscreva-se e receba novidades</p>
      <p class='text-base '>sobre turismo e o Turismo</p>
      <form class="flex justify-center items-center gap-2">
        <div class="">
          <input type="email" placeholder="E-mail" class="shadow-custom border-primary rounded-full  custom-input text-primary placeholder-primary  lg:h-[50px] h-[36px] pl-10 flex items-center ">
        </div>

      </form>
    </div>
  </div>
  <p class="text-center sm:mt-16 mt-7 text-xs">© Copyright Turismo 2024</p>
</footer>