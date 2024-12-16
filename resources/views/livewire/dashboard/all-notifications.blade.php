<div class="row">
    <div class="col-md-6">
        <h2 class="text-center">
            Read Notifications
        </h2>
        @forelse ( $readNotifications as $notification)
            <div class="row">
                <div class="col-sm-10">
                    <h4>{{ $notification['data']['title'] }}</h4>
                </div>
                <div class="col-sm-2">
                    {{ Time::humanReadableDiff($notification['created_at']) }}
                </div>
            </div>
        @empty
            <p>No Read Notifications</p>
        @endforelse
    </div>
    <div class="col-md-6">
        <h2 class="text-center">
            Unread Notifications
        </h2>
        @forelse ( $unreadNotifications as $notification)
            <div class="row">
                <div class="col-sm-10">
                    <h4>{{ $notification['data']['title']}}</h4>
                </div>
                <div class="col-sm-2">
                    {{ Time::humanReadableDiff($notification['created_at']) }}
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a wire:click="markAsRead('{{ $notification->id }}')" class="btn btn-xs  btn-primary">
                    Mark As Read
                </a>
            </div>
        @empty
            <p>No Unread Notifications</p>
        @endforelse
    </div>
</div>
