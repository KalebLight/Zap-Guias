<select wire:model.change="{{$wireModel}}" class="block mt-1 border-primary focus:border-secondary rounded-full shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 xl:w-[570px] sm:w-[440px] w-[350px] lg:h-[50px] h-[36px] font-light ">
    <option value="">{{ $firtOption }}</option>
    @foreach ($options as $option)
        <option value="{{ $option }}">{{ $option }}</option>
    @endforeach
</select>