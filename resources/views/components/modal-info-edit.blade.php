<div>
  @if ($isOpen)
    <!-- Overlay -->
    <div class="fixed inset-0 z-50 flex justify-center items-center">
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-gray-400 opacity-55 transition-opacity" wire:click="closeModal"></div>

    <!-- Modal Container -->
    <div class="relative flex flex-col w-full max-w-xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden" style="max-height: calc(100vh - 64px); margin-top: 32px; margin-bottom: 32px;">
      <!-- Modal Content with Scroll -->
      <div class="flex-1 overflow-y-auto px-5 py-5">
      <!-- Social Media -->
      <div class="mb-4 bg-danger">
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
      <div class="flex items-center justify-between h-6 mb-2" wire:key="schedule-{{ $day }}">
      <!-- Toggle Button -->
      <div class="flex items-center gap-1">
        <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:model="schedule.{{ $day }}.active" class="sr-only peer">
        <div class="w-10 h-6 bg-gray-200 peer-focus:ring-secondary rounded-full peer peer-checked:bg-secondary transition-colors"></div>
        </label>
        <span class="text-primary font-medium">{{ $day }}</span>
      </div>

      <!-- Time Inputs -->
      <div x-data="{ active: @entangle('schedule.' . $day . '.active') }" x-show="active" class="flex items-center gap-2 transition-all duration-300">
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
        <div class="flex items-center">
          <input type="checkbox" id="pix" name="pix" wire:model="pix" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg" for="pix">Pix</label>
        </div>
        <div class="flex items-center">
          <input type="checkbox" id="credito" name="credito" wire:model="credito" class="w-4 h-4 text-secondary border-primary rounded focus:ring-secondary focus:ring-2 checked:bg-secondary checked:border-transparent">
          <label class="ml-1 text-lg" for="credito">Cartão de Crédito</label>
        </div>
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