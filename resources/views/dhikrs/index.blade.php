<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
    class="{{ $theme == 'dark' ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الأذكار - Tasbeeh</title>
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
        <!-- Session Success Message -->
        @if (session('success'))
            <div
                class="bg-green-100 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-300 p-4 rounded-lg mb-6 flex items-center gap-3">
                <span class="material-symbols-outlined">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-bold mb-2">{{ __('dhikrs.list_title') }}</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ __('dhikrs.page_subtitle') }}</p>
            </div>
            <a href="{{ route('dhikrs.create') }}"
                class="inline-flex items-center justify-center px-6 py-3 bg-primary text-text-dark font-semibold rounded-full hover:bg-primary/90 transition-colors shadow-lg hover:shadow-xl">
                <span class="material-symbols-outlined mr-2">add</span>
                {{ __('dhikrs.add_new') }}
            </a>
        </div>

        <!-- Dhikrs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($dhikrs as $dhikr)
                <!-- Card -->
                <div
                    class="bg-white dark:bg-gray-900 rounded-xl shadow-md hover:shadow-xl transition-shadow border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <div
                        class="bg-gradient-to-br from-primary/20 to-primary/5 p-6 border-b border-gray-200 dark:border-gray-800">
                        <div class="flex items-start justify-between mb-3">
                            <span class="text-4xl">📿</span>
                            <span class="px-3 py-1 text-xs font-semibold bg-primary/20 text-primary rounded-full">
                                {{ $dhikr->target_count }} - {{ __('dhikrs.times') }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">{{ $dhikr->text }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('dhikrs.target') }} -
                            {{ $dhikr->target_count }}</p>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="#"
                            class="block w-full text-center px-4 py-3 bg-primary text-text-dark font-semibold rounded-lg hover:bg-primary/90 transition-colors shadow-md hover:shadow-lg">
                            <span class="material-symbols-outlined text-sm align-middle mr-1">play_arrow</span>
                            {{ __('dhikrs.start_counting') }}
                        </a>
                        <div class="flex gap-2">
                            <a href="{{ route('dhikrs.edit', $dhikr->id) }}"
                                class="flex-1 text-center px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                                <span class="material-symbols-outlined text-sm align-middle">edit</span>
                                {{ __('dhikrs.edit') }}
                            </a>
                            <button
                                class="flex-1 px-4 py-2 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 font-medium rounded-lg hover:bg-red-200 dark:hover:bg-red-900/50 transition-colors">
                                <span class="material-symbols-outlined text-sm align-middle">delete</span>
                                {{ __('dhikrs.delete') }}
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
</body>

</html>
