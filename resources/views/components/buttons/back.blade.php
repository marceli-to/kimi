@props(['route', 'title'])
<a href="{{ route($route) }}" wire:navigate class="bg-white block shadow shadow-primary-200 hover:shadow-md hover:shadow-primary-200 rounded-lg p-12 pl-32 text-primary-500 text-sm relative">
  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-10 text-primary-500">
    <x-icons.arrow-long-left class="size-16" />
  </div>
  <span class="block">{{ $title }}</span>
</a>