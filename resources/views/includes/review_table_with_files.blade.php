<div class="table-responsive">
    <table class="table-hover">
        <tr>
            <td>
                <strong><p>User ID</p></strong>
            </td>

            <td>
                <strong><p>Name</p></strong>
            </td>

            <td>
                <strong><p>Email</p></strong>
            </td>

            <td>
                <strong><p>File</p></strong>
            </td>

            <td>
                <strong><p>Size</p></strong>
            </td>

            <td>
                <strong><p>Action</p></strong>
            </td>

            <td>
                <strong><p>Action</p></strong>
            </td>

            <td>
                <strong><p>Action</p></strong>
            </td>
        </tr>
        @foreach($reviews as $review)
            <tr>
                <td>
                    <p>{{$review->user_id}}</p>
                </td>

                <td>
                    <p>{{$review->name}}</p>
                </td>

                <td>
                    <p>{{$review->email}}</p>
                </td>

                <td>
                    <p>{{$review->file}}</p>
                </td>

                <td>
                    <p>{{$review->size}} KB</p>
                </td>

                <td>
                    <a href="{{url('/reviewed', ['id'=>$review->id])}}" class="btn btn-success review_button"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Verified</a>
                </td>

                <td>
                    @if(!$review->user->reviewed)
                        <a href="{{url('/future_files', ['id'=> $review->user_id])}}" class="btn btn-success allow_button">Allow</a>
                    @endif
                </td>

                <td>
                    @if(!$review->user->reviewed)
                        <a href="{{url('/reject', ['id'=>$review->id])}}" class="btn btn-danger reject_button">Reject</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>