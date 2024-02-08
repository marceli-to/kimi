<x-app-layout>
  <h1 class="text-5xl text-primary-600 text-center">Rechnen mit Kimi</h1>
  @php
    $type = request()->query('type');
    $amount = request()->query('amount');
  @endphp
  <livewire:math_tasks type="{{ $type ?? 'add_sub' }}" amount="{{ $amount ?? '10' }}" />
</x-app-layout>
