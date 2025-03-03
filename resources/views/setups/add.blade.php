@extends('layouts.app')
@section('title', 'Add Setups | Track Point')
@section('content')
<!-- Main Content -->
    <main class="flex-1 overflow-y-auto flex items-center justify-center">
        <div class="main-child grow">
            <h1 class="text-4xl font-bold mb-5 text-center text-[--primary-color]  uppercase">
                Track Point
            </h1>

            <!-- Form -->
            <form id="add-setups-form" action="{{route('addSetups')}}" method="post"
                class="bg-[--secondary-bg-color] rounded-lg shadow-xl p-8 border border-[--h-bg-color] pt-12 max-w-lg mx-auto  relative overflow-hidden">
                @csrf
                <div
                    class="form-title text-center absolute top-0 left-0 w-full bg-[--primary-color] py-1 shadow-lg uppercase font-semibold text-sm">
                    <h4>Add New Setups</h4>
                </div>
                <!-- Step 1: Basic Information -->
                <div id="step1" class="space-y-6 ">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                        <!-- type -->
                        <div class="form-group">
                            <label for="type" class="block text-sm font-medium text-[--secondary-text] mb-2">Type</label>
                            <div class="relative">
                                <select id="type" name="type"
                                    class="w-full rounded-md bg-[--h-bg-color] border-gray-500 text-[--text-color] px-3 py-2 border appearance-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out">
                                    <option value="">-- select type --</option>
                                    <option value="pcs_category" {{ old('type') == 'pcs_category' ? 'selected' : '' }}>Pcs Category</option>
                                    <option value="pcs_size" {{ old('type') == 'pcs_size' ? 'selected' : '' }}>Pcs Size</option>
                                    <option value="pcs_season" {{ old('type') == 'pcs_season' ? 'selected' : '' }}>Pcs Season</option>
                                </select>
                            </div>
                            @error('type') <!-- Display error message for 'name' -->
                                <div class="text-[--border-error] text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- title -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-[--secondary-text] mb-2">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="w-full rounded-md bg-[--h-bg-color] border-gray-500 text-[--text-color] px-3 py-2 border focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out"
                                placeholder="Enter your title" required />
                            @error('title') <!-- Display error message for 'name' -->
                                <div class="text-[--border-error] text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- login Button -->
                        <button type="submit"
                            class="w-full bg-[--primary-color] text-[--text-color] px-4 py-3 rounded-md hover:bg-blue-600 transition-all duration-300 ease-in-out font-medium uppercase">
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection