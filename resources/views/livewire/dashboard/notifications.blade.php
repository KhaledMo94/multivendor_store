<li class="nav-item dropdown">
    <a class="nav-link" onclick="$('#showNotification').toggle()" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{ $notifications->count() }}</span>
    </a>

    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="showNotification">
        <span class="dropdown-header">{{ $notifications->count() }} Notifications</span>
        {{-- <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
        </a> --}}
        {{-- <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
        </a> --}}
        @forelse ( $notifications as $notification )
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> {{ $notification['data']['title'] }}
            <span class="float-right text-muted text-sm">{{ Time::humanReadableDiff($notification->created_at) }}</span>
        </a>
        @empty

        @endforelse
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>
