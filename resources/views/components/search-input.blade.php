<div class="relative w-full">
  @props(['disabled' => false])
  <input @disabled($disabled) {{ $attributes->merge([
  'class' => 'border-primary focus:border-secondary rounded-full focus:ring-indigo-500 custom-input text-primary placeholder-primary w-full lg:h-[50px] h-[36px] pl-10 flex items-center',
  'style' => 'line-height: normal;',
]) 
  }}>
  <img src="{{ asset('images/glass-icon.svg') }}" alt="Search Icon" class="absolute top-1/2 transform -translate-y-1/2 left-3 w-4 h-4">
</div>