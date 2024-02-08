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
<body class="font-sans h-full antialiased min-h-full px-24 flex items-center justify-center">
  <div class="w-full max-w-sm">
    <div class="bg-white shadow-lg shadow-gray-200 rounded-xl p-24">
      <x-application-logo class="h-48 mb-36 w-auto mx-auto" />
      {{ $slot }}
    </div>
  </div>
</body>
</html>
