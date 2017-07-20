<div class="table-responsive">
    <table class="table-hover">
        <tr>
            <td>
                <p>File</p>
            </td>

            <td>
                <p>Size</p>
            </td>

            <td>
                <p>Type</p>
            </td>
        </tr>
        @foreach($user->server as $srvr)
            <tr>
                <td>
                    <a href="{{url($user->nerd_directory.'/'.$srvr->file)}}"><p>{{$srvr->file}}</p></a>
                </td>

                <td>
                    <p>{{$srvr->file_size}} KB</p>
                </td>

                <td>
                    <p>{{$srvr->type}}</p>
                </td>
            </tr>
        @endforeach
    </table>
</div>