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
            <input type="text" id="text" name="text" value="{{ old('text', $dhikr->text ?? '') }}"
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
                value="{{ old('target_count', $dhikr->target_count ?? '') }}"
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
