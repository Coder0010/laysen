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
            <!-- Key -->
            <div class="mb-4">
                <x-input-label for="key" :value="__('Key')" />
                <x-text-input id="key" name="key" type="text" class="mt-1 block w-full"
                              value="{{ old('key', $row?->key) }}" />
                <x-input-error :messages="$errors->get('key')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label :for="'value'" :value="__('value')" />
                <textarea
                    id="value"
                    name="value"
                    rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100"
                    style="resize: none"
                >{{ old('value', $row?->{'value'}) }}</textarea>
                <x-input-error :messages="$errors->get('value')" class="mt-2" />
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button>{{ $row ? __('Update') : __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
