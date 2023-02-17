@props(['trigger'])
<div x-data={show:false} @click.away="show=false" class="relative">
    {{-- trigger button --}}
    <div @click="show=!show">
        {{ $trigger }}
    </div>
    {{-- dropdown content --}}
    <div class="flex flex-col absolute bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display:none" x-show='show'>
        {{ $slot }}
    </div>

</div>