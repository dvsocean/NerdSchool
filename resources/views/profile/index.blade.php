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
                var titleSelect= $('#title');
                var textAreaSelect= $('#post');

                $('.desNerd').click(function(e){
                    if(!confirm('Are you sure you want to delete?')){
                      e.preventDefault();
                    }
                });

                $('#postForm').submit(function(e){
                    if(topicSelect.val() < 1){
                        alert('Please select a topic');
                        e.preventDefault();
                    }

                    if(titleSelect.val().length < 3){
                        alert('Title must be at least 3 characters long');
                        e.preventDefault();
                    }

                    if(textAreaSelect.val().length < 10){
                        alert('Your post must be at least 10 characters long');
                        e.preventDefault();
                    }
                });

                $('#datepicker').datepicker();
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
                        @else
                            <a href="{{url('/project_files')}}" class="btn btn-primary">Project Files</a>
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




                {{--{!! Form::open(['method'=> 'POST', 'action'=>['PostsController@index', 'id'=>$user->id], 'id'=>'postForm']) !!}--}}

                    {{--<div class="col-md-6">--}}
                        {{--<div class="">--}}
                            {{--{!! Form::label('topic', 'Topic:') !!}--}}
                            {{--{!! Form::select('topic', ['', 'General', 'Web', 'Libraries', 'Frameworks', 'Bootstrap']) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-6">--}}
                        {{--{!! Form::label('title', 'Title:') !!}--}}
                        {{--{!! Form::text('title', null, ['class'=>'']) !!}--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12">--}}
                        {{--{!! Form::label('post', 'Post:') !!}--}}
                        {{--{!! Form::textarea('post', null, ['class'=>'']) !!}<br><br>--}}
                    {{--</div>--}}


                    {{--<div class="col-md-12">--}}
                        {{--<div class="">--}}
                            {{--{!! Form::submit('Start', ['class'=>''])!!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--{!! Form::close() !!}--}}

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-md-4">
                            <h3 align="center">Start a discussion</h3><br>
                            <form action="{{url('/posts')}}" method="POST" id="postForm">
                                <select id="topic">
                                    <option value="0">Select a topic &#8681;</option>
                                    <option value="1">Server</option>
                                    <option value="2">Front end</option>
                                    <option value="3">PHP</option>
                                    <option value="4">Javascript</option>
                                    <option value="5">General</option>
                                </select><br><br>
                        </div>

                        <div class="col-md-4">
                            <!--PLACEHOLDER-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-md-4">
                            <label for="title">Title</label><br>
                            <input type="text" name="title" id="title">
                        </div>

                        <div class="col-md-4">
                            <label>Date</label><br>
                            <input type="text" name="date" id="datepicker"><br><br>
                        </div>

                        <div class="col-md-2">
                            <!--PLACEHOLDER-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-md-8">
                            <label>Discussion</label><br>
                            <textarea rows="7"></textarea><br>

                            <input type="submit" value="Start">
                            </form>
                        </div>

                        <div class="col-md-2">
                            <!--PLACEHOLDER-->
                        </div>
                    </div>
                </div>
    </div>

@include('includes.footer')
@include('includes.jquery-ui')
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
