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
            <div class="mb-4">
                <x-input-label :for="'type'" :value="__('Select Type')" />
                <select
                    id="type"
                    name="type"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700
                       dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                       dark:focus:border-indigo-600 focus:ring-indigo-500
                       dark:focus:ring-indigo-600 rounded-md shadow-sm"
                >
                    <option value="">
                        {{ __('Select Type') }}
                    </option>
                    @foreach (\App\Http\Enums\BusinessTypeEnum::options() as $option)
                        <option
                            value="{{ $option['id'] }}"
                            @selected(old('type', $row?->type->value) == $option['id'])
                        >
                            {{ $option['name_en'] }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-2" />
            </div>

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
                    <x-input-label :for="'address_' . $lang" :value="__('Address') . ' (' . strtoupper($lang) . ')'" />
                    <x-text-input
                        :id="'address_' . $lang"
                        :name="'address_' . $lang"
                        type="text"
                        class="mt-1 block w-full"
                        :value="old('address_' . $lang, $row?->{'address_'.$lang})"
                    />
                    <x-input-error :messages="$errors->get('address_' . $lang)" class="mt-2" />
                </div>
            @endforeach

            <!-- Phone -->
            <div class="mb-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                              value="{{ old('phone', $row?->phone) }}" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

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

            <!-- File -->
            <div class="mb-4">
                <x-input-label for="file" :value="__('Image')" />
                <x-text-input id="file" name="file" type="file" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </div>

            <!-- Location -->
            <div class="mb-4">
                <x-input-label for="location" :value="__('Location')" />
                <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                              value="{{ old('location', $row?->location) }}" />
                <x-input-error :messages="$errors->get('location')" class="mt-2" />
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                <x-primary-button>{{ $row ? __('Update') : __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
