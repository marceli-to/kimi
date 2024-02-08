@props(['value'])
<label {{ $attributes->merge(['class' => 'block font-mono font-semi text-sm text-gray-400 mb-12']) }}>
  {{ $value ?? $slot }}
</label>