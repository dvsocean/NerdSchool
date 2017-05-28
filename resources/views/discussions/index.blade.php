<?php use App\Post;use App\User; ?>
@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>Discussions</title>
    @include('includes.header')
    <?php $user= Auth::user(); ?>
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
                    <h1>Discussions</h1><br>

                    @foreach(auth()->user()->unreadNotifications as $notification)
                        @include('includes.notifications.'. snake_case(class_basename($notification->type)))<br>
                    @endforeach

                </header>
                <span><img src="page_images/discussions.png" height="150" width="300" class="center-block"/></span>
                <p class="text-center">The focus is on web technologies that allow us to create dynamic sites. The goal is to spend less
                    time struggling and more time coding, we'd love to have your input. These are the active discussions we currently have.
                </p>
                <br>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        @if (Session::has('post_message'))
                            <div class="alert alert-info text-center">{{ Session::get('post_message') }}</div><br>
                        @endif
                    </div>
                </div>
            </div>

            <?php $posts= Post::orderBy('created_at', 'desc')->paginate(10); ?>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table-hover">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Topic</th>
                                    <th>Post</th>
                                    <th>Author</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->discussion_date}}</td>
                                    <td><a href="{{route('each', ['id'=> $post->id])}}">{{str_limit($post->title, 15)}}</a></td>
                                    <td>{{$post->topic}}</td>
                                    <td>{{str_limit($post->post, 15)}}</td>
                                    <td>{{$post->posted_by}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <h4 class="text-center">{{$posts->links()}}</h4>
                        </div>
                    </div>
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