@props(['title' => ''])
<header {{ $attributes->merge(['class' => 'mb-8 font-mono text-xs text-primary-400 uppercase tracking-widest']) }}>
  {{ $title }}
</header>