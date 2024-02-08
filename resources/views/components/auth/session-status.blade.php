@props(['status'])
@if ($status)
  <div {{ $attributes->merge(['class' => 'font-mono text-sm text-green-600']) }}>
    {{ $status }}
  </div>
@endif
