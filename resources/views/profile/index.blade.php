<?php use App\User; ?>
@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>{{Auth::user()->name}}</title>
    <!--HEADER-->
    @include('includes.header')
    <!--HEADER-->
</head>



    <!--DELETE NERD JAVASCRIPT-->
        <script>
            $(function(){
                var topicSelect= $('#topic');

                $('.desNerd').click(function(e){
                    if(!confirm('Are you sure you want to delete?')){
                      e.preventDefault();
                    }
                });

                $('#postForm').submit(function(e){
                    if(topicSelect = '0'){
                        alert('Needs content');
                        e.preventDefault();
                    }
                });
            });
        </script>
    <!--DELETE NERD JAVASCRIPT-->

</head>
<body>
<?php $user= Auth::user(); ?>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- NAVR BAR -->
    @include('includes.navbar')
    <!-- NAVR BAR -->

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <section id="main" class="main">
            <div class="inner">
                <header class="major">

                    <h1>{{$user->name}}'s Profile</h1><br>
                    @if (Session::has('message'))
                      <div class="alert alert-info text-center">{{ Session::get('message') }}</div><br>
                    @endif

                    <div class="col-md-12" align="right">
                        @if(Auth::user()->admin == 'yes')
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg">All Nerds</button>
                            @endif
                    </div>

                    <img src="{{$user->photo ? $user->photo->file : 'PLACEHOLDER/avatar.JPG'}}" height="150" width="150" class="img-circle"><br><br>


                    {!! Form::model($user, ['method'=> 'PATCH', 'action'=>['NerdController@update', $user->id], 'files'=> true]) !!}

                      {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}

                      <br><br>


                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                          {!! Form::text('name', null, ['class'=>'', 'placeholder'=>'Name']) !!}
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">
                          {!! Form::text('email', null, ['class'=>'', 'placeholder'=>'Email']) !!}
                        </div>
                      </div>

                      <br><br>

                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                          {!! Form::text('school', null, ['class'=>'', 'placeholder'=>'School']) !!}
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                          {!! Form::text('major', null, ['class'=>'', 'placeholder'=>'Major']) !!}
                        </div>
                      </div>

                      <br><br>

                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                          {!! Form::text('goal', null, ['class'=>'', 'placeholder'=>'Goal']) !!}
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                          {!! Form::text('interest', null, ['class'=>'', 'placeholder'=>'Interest']) !!}
                        </div>
                      </div>

                      <br><br>

                      <div class="col-xs-12 col-sm-12 col-md-12" align="left">
                        {!! Form::submit('Update', ['class'=>'']) !!}
                      </div>
                    {!! Form::close() !!}

                </header>
                <span class="image main"><!--PLACEHOLDER--></span>

            </div>
        </section>

        <!--MODAL-->
        <style>
            .modal-content {
                padding: 25px;
            }
        </style>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <?php $all_nerds= User::all(); ?>
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
                        </div>
                </div>
            </div>
        </div>
        <!--MODAL-->

        <section>
            <div class="inner">
                <h3>Start a discussion</h3>

                {{--{!! Form::open(['method'=> 'POST', 'action'=>['PostsController@store', 'id'=>$user->id], 'id'=>'postForm']) !!}--}}

                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('topic', 'Topic:') !!}--}}
                            {{--{!! Form::select('topic', ['', 'General', 'Web', 'Libraries', 'Frameworks', 'Bootstrap']) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-6">--}}
                        {{--{!! Form::label('title', 'Title:') !!}--}}
                        {{--{!! Form::text('title', null, ['class'=>'form-control']) !!}--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--{!! Form::label('post', 'Post:') !!}--}}
                        {{--{!! Form::textarea('post', null, ['class'=>'form-control']) !!}<br><br>--}}
                    {{--</div>--}}


                    {{--<div class="col-md-12">--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::submit('Start', ['class'=>''])!!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--{!! Form::close() !!}--}}

                <form action="" method="">
                    <select id="topic">
                        <option value="0">Sacramento</option>
                        <option value="1">LA</option>
                    </select><br><br>

                    <input type="submit" value="submit">
                </form>
            </div>
        </section>
    </div>


@include('includes.footer')

</body>
</html>

@else
    <html>
        <head>
            <title>Unknown User!</title>
        </head>
    <body>

        <br><br>
        <br><br>

        <h3 align="center">We dont know who you are! Please create an account and login.</h3>
    </body>
    </html>
@endif
