<div>
  @if ($isOpen)
    <!-- Overlay -->
    <div class="fixed inset-0 z-50 flex justify-center items-center ss:p-0 px-3">
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-gray-400 opacity-55 transition-opacity" wire:click="closeModal"></div>

    <!-- Modal Container -->
    <div class="relative flex flex-col w-full max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden" style="max-height: calc(100vh - 64px); margin-top: 32px; margin-bottom: 32px;">
      <!-- Close Button -->
      <button type="button" wire:click="closeModal" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out bg-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
      </button>

      <!-- Modal Content with Scroll -->
      <div class="flex-1 overflow-y-auto px-5 pt-5 pb-5 scrollbar scrollbar-thumb-secondary scrollbar-track-secondary">
      <!-- Social Media -->
      <div class="mb-4">
        <h4 class="underline text-primary text-left font-medium">Redes Sociais</h4>
        <input type="text" placeholder="/facebook" wire:model="facebook" class="w-full rounded-full border border-primary text-primary h-8 mt-1 placeholder:text-primary placeholder:opacity-60" maxlength="20">
        <input type="text" placeholder="@instagram" wire:model="instagram" class="w-full rounded-full border border-primary text-primary h-8 mt-2 placeholder:text-primary placeholder:opacity-60" maxlength="20">
        <input type="text" placeholder="seusite.com.br" wire:model="website" class="w-full rounded-full border border-primary text-primary h-8 mt-2 placeholder:text-primary placeholder:opacity-60" maxlength="30">
        <x-input-error :messages="$errors->get('redes_sociais')" class="mt-2" />
      </div>

      <!-- Schedule -->
      <div class="mb-4">
        <h4 class="underline text-primary text-left font-medium">Funcionamento</h4>
        @foreach ($schedule as $day => $data)
      <div class="flex flex-col ss:flex-row items-center ss:justify-between mb-2 mt-1 leading-none justify-center" wire:key="schedule-{{ $day }}">
      <!-- Toggle Button -->
      <div class="flex items-center gap-1">
        <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:model="schedule.{{ $day }}.active" class="sr-only peer">
        <div class="w-10 h-7 bg-gray-200 peer-focus:ring-secondary rounded-full peer peer-checked:bg-secondary transition-colors"></div>
        </label>
        <span class="text-primary font-medium">{{ $day }}</span>
      </div>

      <!-- Time Inputs -->
      <div x-data="{ active: @entangle('schedule.' . $day . '.active') }" x-show="active" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-y-75" x-transition:enter-end="opacity-100 transform scale-y-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-y-100" x-transition:leave-end="opacity-0 transform scale-y-75" class="flex flex-row items-center gap-2 mt-2 ss:mt-0 w-full ss:w-auto justify-center">
        <input type="time" wire:model="schedule.{{ $day }}.from" class="w-[100px] border border-primary rounded-full focus:outline-none focus:ring focus:ring-secondary h-7 transition-all">
        <span class="text-primary">a</span>
        <input type="time" wire:model="schedule.{{ $day }}.to" class="w-[100px] border border-primary rounded-full focus:outline-none focus:ring focus:ring-secondary h-7 transition-all">
      </div>
      </div>
    @endforeach
        <x-input-error :messages="$errors->get('funcionamento')" class="mt-2" />
      </div>

      <!-- Payment Methods -->
      <div>
        <h4 class="underline text-primary text-left font-medium">Formas de Pagamento</h4>
        <div class="flex flex-wrap gap-7">
        <div>
          <div class="flex items-center">
          <input type="checkbox" id="pix" name="pix" wire:model="pix" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg" for="pix">Pix</label>
          </div>
          <div class="flex items-center">
          <input type="checkbox" id="credito" name="credito" wire:model="credito" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg" for="credito">Cartão de Crédito</label>
          </div>
        </div>
        <div>
          <div class="flex items-center">
          <input type="checkbox" id="debito" name="debito" wire:model="debito" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg" for="debito">Cartão de Débito</label>
          </div>
          <div class="flex items-center">
          <input type="checkbox" id="boleto" name="boleto" wire:model="boleto" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg" for="boleto">Boleto</label>
          </div>
        </div>
        </div>
      </div>
      </div>

      <!-- Fixed Save Button -->
      <div class="py-3 flex justify-center">
      <x-custom-secondary-button width="w-3/4" class="underline" wire:click="saveData">
        Salvar
      </x-custom-secondary-button>
      </div>
    </div>
    </div>
  @endif
</div>