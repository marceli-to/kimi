@props([
  'sortable' => false, 
  'sortableDirection' => 'asc',
  'sortableField' => null,
  'field' => 'name'
])
@if ($sortable)
  <th class="text-left text-gray-400 text-xs p-16">
    <button wire:click="sortBy('{{ $sortableField }}')" class="uppercase font-mono tracking-widest flex items-center space-x-4">
      <span>{{ $slot }}</span>
      @if ($sortableField === $field)
        <span>
          @if ($sortableDirection === 'asc')
            <x-icons.chevron-up class="w-10 h-10 text-gray-400" />
          @else
            <x-icons.chevron-down class="w-10 h-10 text-gray-400" />
          @endif
        </span>
      @endif
    </button>
  </th>
@else
  <th class="text-left text-gray-400 text-xs uppercase font-mono tracking-widest p-16">
    {{ $slot }}
  </th> 
@endif
