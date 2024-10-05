<x-dashboard.dashboard-layout>
    <x-slot:optional_header_styles>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('message'))
                    var sessionMessageModal = new bootstrap.Modal(document.getElementById('sessionMessageModal'));
                    sessionMessageModal.show();
                @endif
            });
        </script>
        <script>
            function confirmDeletion() {
                return confirm('Are you sure you want to remove this image?');
            }
        </script>
        <style>
            .image-container {
                position: relative;
                display: inline-block;
            }
            .category-image {
                display: block;
                max-width: 200px;
                height: auto;
            }
            .remove-image-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: red;
                color: white;
                border: none;
                padding: 5px 10px;
                font-size: 16px;
                cursor: pointer;
                border-radius: 50%;
                opacity: 0.7;
            }
            .remove-image-btn:hover {
                opacity: 1;
            }
        </style>
    </x-slot:optional_header_styles>
    <x-dashboard.dashboard-breadcrumb title="{{'Categories'}}" />
    @include('components.dashboard.session-show')
    <a href="{{route('dashboard.categories.create')}}" class="btn btn-primary my-2">Add New Category</a>
    @livewire('category.show-categories',[
        'lazy'                  =>true,
    ])
</x-dashboard.dashboard-layout>
