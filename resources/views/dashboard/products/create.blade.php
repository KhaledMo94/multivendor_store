<x-dashboard.dashboard-layout optional_styles_and_scripts="tagify">
    <x-slot name='optional_header_styles'>
        <!-- Tagify CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.8/tagify.css" rel="stylesheet">
        <!-- Tagify JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.8/tagify.min.js"></script>
    </x-slot>
    <x-slot name='optional_footer_scripts'>
        <script src="{{ asset('vendor/pharaonic/pharaonic.tagify.min.js') }}"></script>
    </x-slot>

    <x-dashboard.dashboard-breadcrumb title='Create New Product' />

    @livewire('product.product-form')
    
</x-dashboard.dashboard-layout>