@props(['active' => false, 'route' => '', 'icon' => '', 'title' => ''])
<a href="{{ route($route) }}" 
  class="font-sans text-sm font-semi inline-flex items-center w-auto p-12 pr-20 -ml-8  hover:bg-gray-50 rounded-full hover:text-primary-600 transition-colors group {{ \MenuHelper::isActive($route) ? 'text-primary-600 bg-gray-50' : ''}}" 
  title="{{ $title }}"
  wire:navigate>
  <x-dynamic-component :component="'icons.'. $icon" class="size-20" />
  <span class="ml-8">
    {{ $title }}
  </span>
</a>