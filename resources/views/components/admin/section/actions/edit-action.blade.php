@props([
    'row',
])
<x-primary-button
    x-data
    x-on:click.prevent="$dispatch('open-modal', 'edit-popup-model-{{ $row->id }}')">
    {{ __('Edit') }}
</x-primary-button>
@include('admin.sections.model', [
    'row' => $row,
    'route' => route('sections.update', $row),
    'method' => 'PUT',
    'name' => 'edit-popup-model-' . $row->id
])
