<?php use App\Post;use App\User;use Illuminate\Support\Facades\Auth; ?>
@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>New Discussion</title>
    @include('includes.header')
    <?php $user= Auth::user(); ?>
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!--NAV BAR-->
@include('includes.navbar')
<!--NAV BAR-->

    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-4">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <h3 align="center">Start a discussion</h3><br>
                <form action="{{url('/posts')}}" method="POST" id="postForm" name="postForm" enctype="multipart/form-data">
                    <div class="select-wrapper">
                        <select id="topic" name="topic">
                            <option value="0">Select a topic</option>
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
                        </select>
                    </div><br><br>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-4">
                <!--PLACEHOLDER-->
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-4">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <fieldset>
                    <legend>Add a file</legend>
                    <p>You may attach a JPG, PNG, GIF, SQL, TXT, DOCX, CSS or HTML file</p>
                    <input type="file" name="attachment"><br><br>
                </fieldset><br><br>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-4">
                <!--PLACEHOLDER-->
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12 col-md-2">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <label for="title">Title</label><br>
                <input type="text" name="title" id="title">
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <label>Date</label><br>
                <input type="text" name="discussion_date" id="datepicker"><br><br>
            </div>

            <div class="col-xs-12 col-md-2">
                <!--PLACEHOLDER-->
            </div>
        </div>





        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-2">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-xs-12 col-sm-6 col-md-8">
                <label>Discussion</label><br>
                <textarea rows="7" name="post" id="post"></textarea><br>
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <input type="hidden" name="posted_by" value="{{$user->name}}">
                <input type="hidden" name="email" value="{{$user->email}}">
                <input type="submit" value="Start Discussion"><br><br>
                </form>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-2">
                <!--PLACEHOLDER-->
            </div>
        </div>
    </div>


@include('includes.validation_and_deletes')
@include('includes.footer')

</body>
</html>
@else
    @include('includes.error')
@endif