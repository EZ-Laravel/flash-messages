<div id="flash-messages">
    @foreach (session('flash_notification', collect())->toArray() as $message)
        @if ($message['overlay'])
            <flash-modal
                title="{{ $message['title'] }}"
                message="{{ $message['message'] }}">
            </flash-modal>
        @else

            @if ($message["important"])
                <flash-message
                    icon="<i class='fas fa-exclamation-triangle'></i>"
                    level="{{ $message['level'] }}"
                    message="{{ $message['message'] }}"
                    :elevated="{{ json_encode($elevated) }}">
                </flash-message>
            @else
                <flash-message
                    level="{{ $message['level'] }}"
                    message="{{ $message['message'] }}"
                    :elevated="{{ json_encode($elevated) }}">
                </flash-message>
            @endif
        @endif
    @endforeach
</div>

{{ session()->forget('flash_notification') }}