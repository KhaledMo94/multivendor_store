<x-dashboard.dashboard-layout>
    <x-dashboard.dashboard-breadcrumb title="{{'notifications'}}" />
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
                @livewire('dashboard.all-notifications')
        </div><!-- /.container-fluid -->
    </div>
</x-dashboard.dashboard-layout>
