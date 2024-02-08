<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}</title>
<script defer src="https://unpkg.com/@alpinejs/ui@3.13.1-beta.0/dist/cdn.min.js"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-800 antialiased min-h-full flex">
  <main class="flex-1 py-30 px-40 max-w-2xl mx-auto">
    {{ $slot }}
  </main>
</body>
</html>