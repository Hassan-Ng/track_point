@extends('layouts.app')
@section('title', 'Login | Track Point')
@section('content')
<main class="flex-1 p-8 overflow-y-auto my-scroller-2 flex items-center justify-center">
    <div class="main-child grow bg-[--secondary-bg-color] p-10 rounded-xl shadow-md max-w-md text-sm w-full fade-in">
        <h4 class="text-xl font-semibold text-center text-[--primary-color]">Track Point</h4>
        <h1 class="text-3xl font-bold text-center mt-2 text-[--primary-color]">Login</h1>

        <form id="login-form" method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <!-- User Name -->
            <div class="form-group">
                <label class="block text-sm font-medium text-[--secondary-text] mb-1">User Name</label>
                <input type="text" name="username" value="{{ old('username') }}" class="w-full rounded-lg bg-[--h-bg-color] border-gray-500 text-[--text-color] px-3 py-2 border focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out" value="{{ old('username') }}" placeholder="Confirm your user name" required />
                @error('username') <!-- Display error message for 'name' -->
                    <div class="text-[--border-error] text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Password -->
            <div class="form-group">
                <label class="block text-sm font-medium text-[--secondary-text] mb-1">Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="w-full rounded-lg bg-[--h-bg-color] border-gray-500 text-[--text-color] px-3 py-2 border focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out" placeholder="Enter your password" required />
                @error('password') <!-- Display error message for 'name' -->
                    <div class="text-[--border-error] text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- login Button -->
            <button type="submit" class="bg-[--primary-color] text-[--text-color] px-5 py-2 rounded-lg hover:bg-blue-600 transition-all duration-300 ease-in-out font-medium">Login</button>
        </form>
    </div>
</main>
@endsection