<div class="alert alert-success">
    <a href="{{route('each', $notification->data['post']['id'])}}">
        {{ucfirst($notification->data['user']['name'])}} replied to <strong>{{$notification->data['post']['title']}}</strong> on your
        <strong>{{$notification->data['post']['topic']}}</strong> thread
    </a>
</div>
