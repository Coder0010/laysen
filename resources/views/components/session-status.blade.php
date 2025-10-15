@php
    $statues = [
        'success' => 'text-green-600 dark:text-green-400',
        'error' => 'text-red-600 dark:text-red-400'
    ];
@endphp
@foreach ($statues as $status => $class)
    @if (session($status))
        <div {{ $attributes->merge(['class' => $class]) }} style="text-align: center;">
            {{ session($status) }}
        </div>
    @endif
@endforeach
