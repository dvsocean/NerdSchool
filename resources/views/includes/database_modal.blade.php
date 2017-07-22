<!--MODAL-->
<style>
    .modal-content {
        padding: 25px;
    }
</style>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php use App\User;

            $all_nerds= User::paginate(10); ?>
            <div class="table-responsive">
                <table class="table-striped">
                    <thead>
                    <td>ID</td>
                    <td>Photo</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>School</td>
                    <td>Delete</td>
                    </thead>
                    <tbody>
                    @foreach($all_nerds as $nerd)
                        <tr>
                            <td>{{$nerd->id}}</td>
                            <td><img src="{{$nerd->photo ? $nerd->photo->file : 'PLACEHOLDER/avatar.JPG'}}" height="62" width="62" class="img-circle"></td>
                            <td>{{$nerd->name}}</td>
                            <td>{{$nerd->email}}</td>
                            <td>{{$nerd->school}}</td>
                            <td>
                                <a href="{{route('destroy', ['id'=> $nerd->id])}}" class="btn btn-danger desNerd">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <h4 align="center">{{$all_nerds->links()}}</h4>
            </div>
        </div>
    </div>
</div>
<!--MODAL-->