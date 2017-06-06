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

                if(titleSelect.val().length < 3 || titleSelect.val().length > 30){
                    alert('Title must be between 3 and 20 characters long');
                    e.preventDefault();
                }

                if(textAreaSelect.val().length < 10){
                    alert('Your post must be at least 10 characters long');
                    e.preventDefault();
                }
            });

            $('#datepicker').datepicker();
            $('#datepicker').datepicker('setDate', new Date());
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

                    <!--PROJECT FILES OR DATABASE FOR ALL NERDS-->
                    <div class="col-md-12" align="right">
                        @if(Auth::user()->admin == 'yes')
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg">Database</button><br><br>
                        @endif
                    </div>
                    <!--PROJECT FILES OR DATABASE FOR ALL NERDS-->

                    <!--AJAX TO VERIFY EMAIL-->
                    <script>
                        $(function(){
                            $('.checkEmail').blur(function(){
//                                var email= $('.checkEmail').val();
//
//                                $.ajax({
//                                    url: "/checkEmailExists",
//                                    type: "POST",
//                                    data: {"email": email},
//                                    success: function(data){
//                                        $('#test').html(data);
//                                    },
//                                    error: document.write('ajax failed')
//                                });
                            });
                        });
                    </script>
                    <!--AJAX TO VERIFY EMAIL-->

                    <div id="test"></div>

                    <img src="{{$user->photo ? $user->photo->file : 'PLACEHOLDER/avatar.JPG'}}" height="150" width="150" class="img-circle"><br><br>


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
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <label>Notify by email &#8681;</label>
                            {!! Form::select('notifyEmail', ['yes' => 'Yes', 'no' => 'No'], null, ['id'=>'notifySelect', 'placeholder' => 'Click to select']) !!}
                            <p>Get notified when someone leaves you a comment</p>
                        </div>
                      </div>


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <label>About me:</label><br>
                                {!! Form::textarea('interest', null, ['class'=>'', 'placeholder'=>'Interest']) !!}<br><br>
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
                <br><br>
                <br><br>

                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <!--PLACEHOLDER-->
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <h3 align="center">Start a discussion</h3><br>
                            <form action="{{url('/posts')}}" method="POST" id="postForm">
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
                            <!--PLACEHOLDER-->
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
                            </p><br>
                        </div>

                        <div class="col-xs-12 col-md-8">
                            <label>Discussion</label><br>
                            <textarea rows="7" name="post" id="post"></textarea><br>

                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="posted_by" value="{{$user->name}}">
                            <input type="hidden" name="email" value="{{$user->email}}">

                            <input type="submit" value="Start"><br><br>
                            </form>
                        </div>

                        <div class="col-xs-12 col-md-2">
                            <p>
                                Your account will be notified when someone
                                responds to your thread. Just click the badge
                                icon next to your name.
                            </p>
                        </div>
                    </div>
                </div>

    <script type="text/javascript">
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name=token]').attr('content')}
        });
    </script>


@include('includes.footer')

</body>
</html>

@else
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Uknown user!!</title>
        @include('includes.header')
    </head>
    <body>

    <br><br>
    <br><br>
    <br><br>


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <img src="images/user_not_found.png" class="img-responsive">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <!--PLACEHOLDER-->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h1>User account not detected</h1><br>
                <h6>Please login or create an account</h6>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <!--PLACEHOLDER-->
            </div>
        </div>
    </div>



    @include('includes.footer')
    </body>
    </html>
@endif
