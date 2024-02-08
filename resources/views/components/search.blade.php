<div class="max-w-sm relative">
  <div class="absolute inset-y-0 left-0 flex items-center pl-12 text-primary-500 z-20">
    @if ($search)
      <button wire:click="resetSearch()" class="size-16">
        <x-icons.cross class="w-full h-auto" />
      </button>
    @else
      <x-icons.magnifier class="size-16" />
    @endif
  </div>
  <input  
    type="text" 
    placeholder="Search..." 
    class="w-192 border-transparent shadow shadow-primary-200 focus:shadow-md focus:shadow-primary-200 rounded-lg p-12 pl-36 font-sans text-sm  placeholder:font-sans placeholder:text-sm placeholder:text-primary-500 focus:border-transparent focus:ring-0"
    wire:model.live.debounce.300ms="search">
</div>