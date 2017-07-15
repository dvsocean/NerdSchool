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
                    <a href="{{url('/reviewed', ['id'=>$review->id])}}" class="btn btn-success" id="review_button">Reviewed</a>
                </td>

                <td>
                    <a href="{{url('/future_files')}}" class="btn btn-success" id="allow_button">Allow All</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>