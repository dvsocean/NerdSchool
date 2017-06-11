<?php use App\User; ?>
@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>{{Auth::user()->name}}</title>
    <meta name="_token" content="{{ csrf_token() }}" />
    <!--HEADER-->
    @include('includes.header')
    <!--HEADER-->

    <style>
        .well {
            text-align: left;
            list-style-type: none;;
        }

        a:link {
            text-decoration: none;
        }

        .control-box {
            padding-right: 10px;
        }
    </style>
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

<!--MAIN PROFILE SECTION MAIN PROFILE SECTION MAIN PROFILE SECTION MAIN PROFILE SECTION -->
                    <h1>{{$user->name}}'s Profile</h1><br>
                    @if (Session::has('message'))
                      <div class="alert alert-info text-center">{{ Session::get('message') }}</div><br>
                    @endif

                    <!--PROJECT FILES OR DATABASE FOR ALL NERDS-->
                    <div class="col-md-12" align="right">
                        @if(Auth::user()->admin == 'yes')
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg">Database</button><br><br>
                        @endif
                    </div>
                    <!--PROJECT FILES OR DATABASE FOR ALL NERDS-->

                    <div id="test"></div>
                        <img src="{{$user->photo ? $user->photo->file : 'PLACEHOLDER/avatar.JPG'}}" height="200" width="200" class="img-circle"><br><br>

                    {!! Form::model($user, ['method'=> 'PATCH', 'action'=>['NerdController@update', $user->id], 'files'=> true]) !!}

                      {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}

                      <br><br>


                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Name:</label><br>
                          {!! Form::text('name', null, ['class'=>'', 'placeholder'=>'Name']) !!}
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Email:</label><br>
                          {!! Form::text('email', null, ['class'=>'checkEmail', 'placeholder'=>'Email']) !!}
                        </div>
                      </div>

                      <br><br>

                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>School:</label><br>
                          {!! Form::text('school', null, ['class'=>'', 'placeholder'=>'School']) !!}
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Major:</label><br>
                          {!! Form::text('major', null, ['class'=>'', 'placeholder'=>'Major']) !!}
                        </div>
                      </div>

                      <br><br>

                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Goal:</label><br>
                          {!! Form::text('goal', null, ['class'=>'', 'placeholder'=>'Goal']) !!}
                            <br><br>
                            <p>
                                Uploading a profile picture provides the rest of
                                us with the ability to see who you are. Every time
                                you add a comment or create a discussion, your image
                                gets included. Or, you can use the GIF format to
                                exaggerate it a bit.<br><br>
                            </p>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>About me:</label><br>
                            {!! Form::textarea('interest', null, ['class'=>'', 'placeholder'=>'Describe yourself a little']) !!}<br><br>
                        </div>
                      </div>


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <!--PLACEHOLDER-->
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <!--PLACEHOLDER-->
                            </div>
                        </div>


                    <div class="row" align="right">
                        <div class="col-md-4">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-md-4">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-md-4">
                            {!! Form::submit('Update Profile', ['class'=>'update_profile']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                </header>
                <span class="image main"><!--PLACEHOLDER--></span>
            </div>
        </section>
    </div>
<!--MAIN PROFILE SECTION MAIN PROFILE SECTION MAIN PROFILE SECTION MAIN PROFILE SECTION -->



<!-- START A DISCUSSION AREA START A DISCUSSION AREA START A DISCUSSION AREA START A DISCUSSION AREA -->
                <br><br>
                <br><br>

                <div class="container">





                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <h3 align="center">Start a discussion</h3><br>
                            <form action="{{url('/posts')}}" method="POST" id="postForm" name="postForm" enctype="multipart/form-data">
                                <select id="topic" name="topic">
                                    <option value="0">Select a topic &#8681;</option>
                                    <option value="Server">Server</option>
                                    <option value="Client">Client</option>
                                    <option value="Linux">Linux</option>
                                    <option value="PHP">PHP</option>
                                    <option value="SQL">SQL</option>
                                    <option value="Laravel">Laravel</option>
                                    <option value="Javascript">Javascript</option>
                                    <option value="JQuery">JQuery</option>
                                    <option value="HTML">HTML</option>
                                    <option value="CSS">CSS</option>
                                    <option value="General">General</option>
                                </select><br><br>
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <input type="file" name="attachment">
                        </div>
                    </div>






                    <div class="row">
                        <div class="col-xs-12 col-md-2">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <label for="title">Title</label><br>
                            <input type="text" name="title" id="title">
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <label>Date</label><br>
                            <input type="text" name="discussion_date" id="datepicker"><br><br>
                        </div>

                        <div class="col-xs-12 col-md-2">
                            <!--PLACEHOLDER-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-2">
                            <p>
                                Modify the discussion by
                                opening it through the <strong>discussions</strong> page. You may
                                also post files or photos.
                                <br><br>

                                <strong>Note</strong>: words that are part of
                                SQL statements will automatically be mis-spelled
                                to prevent database issues.
                            </p><br>
                        </div>

                        <div class="col-xs-12 col-md-8">
                            <label>Discussion</label><br>
                            <textarea rows="7" name="post" id="post"></textarea><br>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="posted_by" value="{{$user->name}}">
                            <input type="hidden" name="email" value="{{$user->email}}">
                            <input type="submit" value="Start Discussion"><br><br>
                            </form>
                        </div>

                        <div class="col-xs-12 col-md-2">
                            <p>
                                Your account will be notified when someone
                                responds to your thread. Just click the badge
                                icon next to your name.
                                <br><br>

                                You may optionally select to be notified by email.
                                Don't forget to checkout the settings page.
                            </p>
                        </div>
                    </div>
                </div>
<!-- START A DISCUSSION AREA START A DISCUSSION AREA START A DISCUSSION AREA START A DISCUSSION AREA -->


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

    <script type="text/javascript">
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name=token]').attr('content')}
        });
    </script>

<!--JAVASCRIPT FILE-->
@include('includes.validation_and_deletes')
<!--JAVASCRIPT FILE-->

@include('includes.footer')

</body>
</html>

@else
    @include('includes.error')
@endif
