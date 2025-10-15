@props([
    'row',
])
<x-primary-button
    x-data
    x-on:click.prevent="$dispatch('open-modal', 'edit-popup-model-{{ $row->id }}')">
    {{ __('Edit') }}
</x-primary-button>
@include('admin.business.model', [
    'row' => $row,
    'route' => route('businesses.update', $row),
    'method' => 'PUT',
    'name' => 'edit-popup-model-' . $row->id
])
