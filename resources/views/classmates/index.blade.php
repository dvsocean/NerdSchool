@if(Auth::user())
        <!DOCTYPE HTML>
<html>
<head>
    <title>Classmates</title>
    <!--HEADER-->
    @include('includes.header')
    <!--HEADER-->
</head>
<body>
<?php $user= Auth::user(); ?>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!--NAV BAR-->
    @include('includes.navbar')
    <!--NAV BAR-->

    <div class="container">
        <div class="row">
            @if($nerds)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <br><br>
                    <h1 align="center">Classmates</h1><br>

                    <div class="table-responsive">
                        <table class="table-hover">
                            <tr>
                                <th><strong>Photo</strong></th>
                                <th><strong>Name</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Details</strong></th>
                                <th><strong>Project</strong></th>
                            </tr>
                            @foreach($nerds as $nerd)
                                <tr>
                                    <td><img src="{{$nerd->photo ? $nerd->photo->file : 'PLACEHOLDER/avatar.JPG'}}" height="62" width="62" class="img-circle"></td>
                                    <td>{{$nerd->name}}</td>
                                    <td><a href="mailto:{{$nerd->email}}">{{$nerd->email}}</a></td>
                                    <td><a href="{{route('details', ['id'=> $nerd->id])}}" class="btn btn-default">More</a></td>
                                    <td><a href="{{url('/view_files', ['id'=> $nerd->id])}}" class="btn btn-primary">View</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <br><br>
    <br><br>
    <br><br>
    <br><br>

@include('includes.footer')

</body>
</html>

@else
    @include('includes.error')
@endif
