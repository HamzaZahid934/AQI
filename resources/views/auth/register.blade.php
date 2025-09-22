<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <title>Sign Up - Pakistan AQI</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <style>
    .auth-card { 
      box-shadow: 0 10px 30px rgba(79,70,229,.15); 
    }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-b from-white via-slate-50 to-indigo-50 text-slate-800 antialiased">

  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">
      <div class="w-full rounded-2xl border border-slate-200 bg-white p-8 auth-card">
        <div class="mb-6 text-center">
          <div class="mx-auto h-12 w-12 rounded-xl bg-brand-gradient"></div>
          <h2 class="mt-4 text-2xl font-bold tracking-tight text-slate-900">Create new account</h2>
        </div>

        @if ($errors->any())
          <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
            <ul class="list-disc pl-5 space-y-1">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
          @csrf
          <div>
            <label class="block text-sm font-medium text-slate-700">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required 
              class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500" />
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Email address</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="input w-full mt-1" />
          </div>
            <div>
              <label class="block text-sm font-medium text-slate-700">Password</label>
              <input type="password" name="password" required class="input w-full mt-1" />
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700">Confirm Password</label>
              <input type="password" name="password_confirmation" required class="input w-full mt-1" />
            </div>
          <button type="submit" class="btn-primary w-full justify-center">Create Account</button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-600">
          Already have an account?
          <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-semibold">Sign in</a>
        </p>
      </div>
    </div>
  </div>

</body>
</html>
