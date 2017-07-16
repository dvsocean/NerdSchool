<table>
    <tr>
        <td>
            <p>ID</p>
        </td>

        <td>
            <p>File</p>
        </td>

        <td>
            <p>Size</p>
        </td>

        <td>
            <p>Type</p>
        </td>

        <td>
            <p>Action</p>
        </td>
    </tr>
    @foreach($files as $file)
        <tr>
            <td>
                <p>{{$file->id}}</p>
            </td>

            <td>
                <a href="{{Auth::user()->nerd_directory}}/{{$file->file}}"><p>{{$file->file}}</p></a>
            </td>

            <td>
                <p>{{$file->file_size}} KB</p>
            </td>

            <td>
                <p>{{$file->type}}</p>
            </td>

            <td>
                <a href="{{url('/delete_from_nerd_server', ['id'=> $file->id])}}" class="btn btn-danger delete_this">Delete</a>
            </td>
        </tr>
    @endforeach
</table>