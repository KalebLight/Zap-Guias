<div>
  @if ($isOpen)
    <div class="fixed inset-0 z-10 flex justify-center items-center overflow-auto">
    <div class="absolute inset-0 bg-gray-400 opacity-55 transition-opacity" wire:click="closeModal"></div>
    <div class="flex flex-col w-full max-w-xl mx-auto transform bg-white rounded-lg shadow-lg py-5 items-center justify-center">
      <!-- Modal Content -->
      <div class="w-full px-2 flex flex-col items-center">
      <div class="flex flex-col items-start ">
        <!-- Social Media -->
        <div>
        <h4 class="underline text-primary text-left font-medium">Redes Sociais</h4>
        <input type="text" placeholder="/facebook" wire:model="facebook" class="w-full rounded-full border border-primary text-primary placeholder:text-primary h-8 mt-1">
        <input type="text" placeholder="@instagram" wire:model="instagram" class="w-full rounded-full border border-primary text-primary placeholder:text-primary h-8 mt-2">
        </div>

        <!-- Schedule -->
        <div class="flex flex-col gap-4 mt-3 w-full">
        <h4 class="underline text-primary text-left font-medium">Funcionamento</h4>
        @foreach ($schedule as $day => $data)
      <div class="flex items-center justify-between" wire:key="schedule-{{ $day }}">
        <!-- Botão toggle -->
        <div>
        <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:model="schedule.{{ $day }}.active" class="sr-only peer  text-nowrap">
        <div class="w-10 h-6 bg-gray-200 peer-focus:ring-secondary rounded-full peer peer-checked:bg-secondary transition-colors"></div>
        </label>
        <!-- Nome do dia da semana -->
        <span class="text-primary font-medium">{{ $day }}</span>
        </div>



        <!-- Campos de horário -->
        <div x-data="{ active: @entangle('schedule.' . $day . '.active') }" x-show="active" class="flex items-center gap-2 transition-all duration-300">
        <input type="time" wire:model="schedule.{{ $day }}.from" class="w-[100px] border border-primary rounded-full focus:outline-none focus:ring focus:ring-secondary h-7 transition-all" placeholder="Hora">
        <span class="text-primary">a</span>
        <input type="time" wire:model="schedule.{{ $day }}.to" class="w-[100px] border border-primary rounded-full focus:outline-none focus:ring focus:ring-secondary h-7 transition-all">
        </div>
      </div>
    @endforeach
        </div>

        <!-- Payment Methods -->
        <div>
        <h4 class="underline text-primary text-left font-medium">Formas de Pagamento</h4>
        <!-- pix & credito -->
        <div class="flex gap-7">
          <!-- pix -->
          <div class="flex flex-row items-center">
          <input type="checkbox" id="pix" name="pix" wire:model="pix" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg" for="pix">Pix</label>
          </div>
          <!-- cartão de crédito -->
          <div class="flex flex-row items-center">
          <input type="checkbox" id="credito" name="credito" wire:model="credito" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg text-nowrap" for="credito">Cartão de Crédito</label>
          </div>
        </div>

        <div class="flex flex-row gap-7">
          <!-- cartão de débito -->
          <div class="flex flex-row items-center">
          <input type="checkbox" id="debito" name="debito" wire:model="debito" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg text-nowrap" for="debito">Cartão de Débito</label>
          </div>
          <!-- Boleto -->
          <div class="flex flex-row items-center">
          <input type="checkbox" id="boleto" name="boleto" wire:model="boleto" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg" for="boleto">Boleto</label>
          </div>
        </div>
        </div>
      </div>

      <!-- Save Button -->
      <x-custom-secondary-button width="w-3/4" class="underline mt-4" wire:click="saveSchedule">
        Salvar
      </x-custom-secondary-button>
      </div>
    </div>
    </div>
  @endif
</div>