@props(['id', 'name', 'value' => null])
{{-- {{ dd($value) }} --}}
<?php
    if($value) {
        $value = new Datetime($value);
        $value = $value->format('m/d/Y'); 
    }
?>
<div>
    <div class="relative max-w-sm">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
        </svg>
        </div>
        <input id="{{ $id }}" data-id="{{ $id }}" name="riwayat[0][{{ $id }}]" value="{{ isset($value) ? $value : '' }}" datepicker type="text" class="bg-white border datepicker border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-dark-600 rounded-md shadow-sm block w-full ps-10 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500" placeholder="Select date">
    </div>
    {{-- @push('scripts') --}}
    <script type="module" src="{{ mix('resources/js/datepicker.js') }}" data-id="{{ $id }}" defer></script>
    {{-- @endpush --}}
</div>