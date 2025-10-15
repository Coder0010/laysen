<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Sections') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <x-session-status class="p-2"/>
                    <div class="inline-block min-w-full align-middle w-full">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm text-gray-900 dark:text-gray-100">
                            <x-table :tableColumns="['name_en', 'name_ar']"
                                     :showModelColumns="['name_en', 'name_ar', 'slug', 'description_en', 'description_ar']"
                                     :data="$data"
                                     :actions="['section_edit', 'delete']"
                            ></x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
