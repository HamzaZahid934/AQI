<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Pakistan AQI</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-b from-white via-slate-50 to-indigo-50 text-slate-800 antialiased">
  <header class="sticky top-0 z-30 border-b border-slate-200/60 bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <div class="h-9 w-9 rounded-lg bg-gradient-to-br from-indigo-600 to-sky-500 shadow ring-1 ring-indigo-400/40"></div>
        <h1 class="text-xl md:text-2xl font-bold tracking-tight">Dashboard</h1>
      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="inline-flex items-center gap-2 rounded-lg bg-sky-600 px-4 py-2 text-white shadow hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Logout</button>
      </form>
    </div>
  </header>

  <main class="max-w-7xl mx-auto px-6 py-10">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
      <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:col-span-2">
        <h2 class="text-lg font-semibold text-slate-900">Welcome, {{ auth()->user()->name }}</h2>
        <p class="mt-1 text-sm text-slate-500">This is your private dashboard.</p>
        <div class="mt-6 rounded-xl border border-slate-200 p-4">
          <p class="text-sm text-slate-600">You can return to the public AQI tool anytime.</p>
          <a href="{{ route('home') }}" class="mt-3 inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Go to AQI Tool</a>
        </div>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <h3 class="font-semibold text-slate-900">Account</h3>
        <ul class="mt-3 space-y-2 text-sm text-slate-600">
          <li><span class="font-medium">Name:</span> {{ auth()->user()->name }}</li>
          <li><span class="font-medium">Email:</span> {{ auth()->user()->email }}</li>
        </ul>
      </div>
    </div>
  </main>
</body>
</html>


