<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
    class="{{ $theme == 'dark' ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ __('dhikrs.add_dhikr_title') }} - Tasbeeh</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#bca37f",
                        "background-light": "#f6f8f8",
                        "background-dark": "#121212",
                        "text-light": "#f6f8f8",
                        "text-dark": "#1a1a1a",
                    },
                    fontFamily: {
                        "display": ["Inter", "Cairo", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-text-dark dark:text-text-light font-display min-h-screen">

    <!-- Header -->
    <header class="border-b border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">📿 Tasbeeh</h1>
                <div class="flex items-center gap-3">
                    <!-- Language Switcher -->
                    <a href="{{ route('locale.switch', ['locale' => 'en']) }}"
                        class="px-3 py-2 text-sm font-medium rounded-lg hover:bg-primary/10 transition-colors {{ app()->getLocale() == 'en' ? 'bg-primary/20 text-primary' : '' }}">
                        EN
                    </a>
                    <a href="{{ route('locale.switch', ['locale' => 'ar']) }}"
                        class="px-3 py-2 text-sm font-medium rounded-lg hover:bg-primary/10 transition-colors {{ app()->getLocale() == 'ar' ? 'bg-primary/20 text-primary' : '' }}">
                        AR
                    </a>

                    <!-- Dark Mode Toggle -->
                    <a href="{{ route('theme.switch', ['theme' => $theme == 'dark' ? 'light' : 'dark']) }}"
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-primary/20 hover:bg-primary/30 transition-colors">
                        @if ($theme == 'dark')
                            <span class="material-symbols-outlined text-lg text-primary">dark_mode</span>
                        @else
                            <span class="material-symbols-outlined text-lg text-primary">light_mode</span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('dhikrs.index') }}"
                class="inline-flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-xl">arrow_back</span>
                <span>{{ __('dhikrs.back_to_list') }}</span>
            </a>
        </div>

        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold mb-2">{{ __('dhikrs.add_new') }}</h2>
            <p class="text-gray-600 dark:text-gray-400">{{ __('dhikrs.add_dhikr_subtitle') }}</p>
        </div>

        <!-- Form Card -->
        <div class="max-w-2xl">
            <div
                class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-800 overflow-hidden">

                <!-- Card Header -->
                <div
                    class="bg-gradient-to-br from-primary/20 to-primary/5 p-6 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl text-primary">add_circle</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">{{ __('dhikrs.dhikr_info') }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('dhikrs.fill_data') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('dhikrs.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    <!-- Text Field -->
                    <div class="space-y-2">
                        <label for="text" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            {{ __('dhikrs.dhikr_text') }}
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-gray-400">text_fields</span>
                            </div>
                            <input type="text" id="text" name="text" value="{{ old('text') }}"
                                placeholder="{{ __('dhikrs.dhikr_text_placeholder') }}"
                                class="block w-full pr-10 pl-4 py-3 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-gray-900 dark:text-white placeholder-gray-400">
                        </div>
                        @error('text')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('dhikrs.dhikr_text_help') }}</p>
                    </div>

                    <!-- Target Count Field -->
                    <div class="space-y-2">
                        <label for="target_count" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            {{ __('dhikrs.target_count_label') }}
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-gray-400">tag</span>
                            </div>
                            <input type="number" id="target_count" name="target_count"
                                value="{{ old('target_count') }}"
                                placeholder="{{ __('dhikrs.target_count_placeholder') }}" min="1" max="1000"
                                class="block w-full pr-10 pl-4 py-3 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-gray-900 dark:text-white placeholder-gray-400">
                        </div>
                        @error('target_count')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('dhikrs.target_count_help') }}</p>
                    </div>
                    <!-- Action Buttons -->
                    <div class="flex flex-col-reverse sm:flex-row gap-3 pt-4">
                        <a href="{{ route('dhikrs.index') }}"
                            class="flex-1 inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <span class="material-symbols-outlined text-lg ml-2">close</span>
                            {{ __('dhikrs.cancel') }}
                        </a>
                        <button type="submit"
                            class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-primary text-text-dark font-semibold rounded-lg hover:bg-primary/90 transition-colors shadow-lg hover:shadow-xl">
                            <span class="material-symbols-outlined text-lg ml-2">check_circle</span>
                            {{ __('dhikrs.save') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </main>

</body>

</html>
