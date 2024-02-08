@props(['route'])
<a href="{{ $route }}" 
  wire:navigate 
  class="text-sm text-gray-400 hover:text-primary-400 no-underline hover:underline underline-offset-4 leading-none">
  {{ $slot }}
</a>