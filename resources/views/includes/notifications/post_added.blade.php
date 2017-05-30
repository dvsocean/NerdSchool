<a href="{{route('each', $notification->data['post']['id'])}}" class="alert alert-success">
    {{ucfirst($notification->data['user']['name'])}} replied to <strong>{{$notification->data['post']['title']}}</strong> on your
    <strong>{{$notification->data['post']['topic']}}</strong> thread
</a><br><br>
