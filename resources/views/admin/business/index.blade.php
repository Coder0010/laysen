<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Businesses') }}
            </h2>

            <x-primary-button
                x-data
                x-on:click.prevent="$dispatch('open-modal', 'create-popup-model')"
            >
                {{ __('Add New') }}
            </x-primary-button>
            @include('admin.business.model', [
                'name' => 'create-popup-model',
                'route' => route('businesses.store'),
                'method' => 'POST',
            ])
        </div>
    </x-slot>

    <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <x-session-status class="p-2"/>
                    <div class="inline-block min-w-full align-middle w-full">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm text-gray-900 dark:text-gray-100">
                            <x-table :tableColumns="['type', 'name_en', 'address_en', 'phone',]"
                                     :showModelColumns="['type', 'name_en', 'name_ar', 'address_en', 'address_ar', 'phone', 'description_en', 'description_ar', 'file']"
                                     :data="$data"
                                     destroyRouteName="businesses.destroy"
                                     :actions="['business_edit', 'business_show', 'delete']"
                            ></x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
