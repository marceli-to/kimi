<button {{ $attributes->merge(['type' => 'submit', 'name' => '', 'class' => 'group relative w-auto flex items-center justify-start bg-gray-100 shadow shadow-primary-200 hover:shadow-md hover:shadow-primary-200 rounded-lg px-16 py-12 text-primary-500 text-sm']) }}>
  {{ $icon ?? null }}
  <span class="font-mono font-bold uppercase tracking-wider">
    {{ $slot }}
  </span>
</button>
