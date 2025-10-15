@props([
    'row' => null,
    'route' => '',
    'method' => 'POST',
    'name' => 'modal',
])

<x-modal :name="$name"
         :show="session('open_popup_modal') === $name"
         focusable>
    <div class="max-h-[80vh] overflow-y-auto p-6 space-y-6 bg-white dark:bg-gray-800 rounded-lg">
        <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
            @csrf
            @if($method !== 'POST')
                @method($method)
            @endif
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                {{ $row ? __('Update') : __('Add') }}
            </h2>

            @foreach(['en', 'ar'] as $lang)
                <div class="mb-4">
                    <x-input-label :for="'name_' . $lang" :value="__('Name') . ' (' . strtoupper($lang) . ')'" />
                    <x-text-input
                        :id="'name_' . $lang"
                        :name="'name_' . $lang"
                        type="text"
                        class="mt-1 block w-full"
                        :value="old('name_' . $lang, $row?->{'name_'.$lang})"
                    />
                    <x-input-error :messages="$errors->get('name_' . $lang)" class="mt-2" />
                </div>
            @endforeach

            @foreach(['en', 'ar'] as $lang)
                <div class="mb-4">
                    <x-input-label :for="'description_' . $lang" :value="__('Description') . ' (' . strtoupper($lang) . ')'" />
                    <textarea
                        id="description_{{ $lang }}"
                        name="description_{{ $lang }}"
                        rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100"
                        style="resize: none"
                    >{{ old('description_' . $lang, $row?->{'description_'.$lang}) }}</textarea>
                    <x-input-error :messages="$errors->get('description_' . $lang)" class="mt-2" />
                </div>
            @endforeach

            <!-- Buttons -->
            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button>{{ $row ? __('Update') : __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
