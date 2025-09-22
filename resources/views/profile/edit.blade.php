<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile - Pakistan AQI</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-b from-white via-slate-50 to-indigo-50 text-slate-800 antialiased">
  <header class="sticky top-0 z-30 border-b border-slate-200/60 bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <a href="{{ route('home') }}" class="flex items-center space-x-3">
        <div class="h-9 w-9 rounded-lg bg-gradient-to-br from-indigo-600 to-sky-500 shadow ring-1 ring-indigo-400/40"></div>
        <span class="text-lg font-semibold">Pakistan AQI</span>
      </a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="inline-flex items-center gap-2 rounded-lg bg-sky-600 px-4 py-2 text-white shadow hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Logout</button>
      </form>
    </div>
  </header>

  <main class="max-w-2xl mx-auto px-6 py-10">
    <div class="text-center mb-8">
      <h1 class="text-2xl font-bold text-slate-900">Edit Profile</h1>
      <p class="mt-1 text-sm text-slate-600">Update your account information</p>
    </div>

    @if (session('success'))
      <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
        {{ session('success') }}
      </div>
    @endif
    @if ($errors->any())
      <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
      <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        <div>
          <label class="block text-sm font-medium text-slate-700">Name</label>
          <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="input w-full mt-1" />
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-700">Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="input w-full mt-1" />
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
          <div>
            <label class="block text-sm font-medium text-slate-700">New Password (optional)</label>
            <input type="password" name="password" class="input w-full mt-1" />
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="input w-full mt-1" />
          </div>
        </div>
        <div class="flex items-center justify-end gap-2">
          <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-lg bg-slate-200 px-4 py-2 text-slate-700 shadow hover:bg-slate-300 focus:outline-none focus:ring-2 focus:ring-slate-400">Cancel</a>
          <button type="submit" class="btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>


