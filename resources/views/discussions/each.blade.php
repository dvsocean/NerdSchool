<?php use App\Post;use App\User; ?>
@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>{{str_limit($post->title, 15)}}</title>
    @include('includes.header')
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!--NAV BAR-->
@include('includes.navbar')
<!--NAV BAR-->

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <section id="main" class="main">
            <div class="inner">
                <header class="major">
                    <h1>{{str_limit($post->title, 20)}}</h1>
                </header>
                <span><img src="../page_images/nerd_talk.png" height="150" width="300" class="center-block"/></span>
                <br><br>

                <div class="well">
                    <p><strong>{{$post->posted_by}}</strong>: {{$post->post}}</p><br>

                    <form action="{{route('add_post', ['id'=> $post->id])}}" method="PATCH">
                        <textarea rows="5" class="form-control" name="start_discussion"></textarea><br>
                        <input type="submit" value="Reply">
                    </form>
                </div>

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