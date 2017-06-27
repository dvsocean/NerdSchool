<?php use App\Post;
use App\User; ?>
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

                <script>
                    $(function(){
                        function notifyRead(){
                            $.get('/markAsRead');
                        }

                        $('#markAsRead').click(function(){
                            notifyRead();
                        });
                    });
                </script>



                <header class="major">
                    <h1>Discussions</h1><br>
                </header>
                <span><img src="page_images/discussions.png" height="150" width="300" class="center-block"/></span>
                <p class="text-center">Focus is on web technologies that allow us to create dynamic sites. The goal is to spend less
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

                        @if (Session::has('error_message'))
                            <div class="alert alert-danger text-center">{{ Session::get('error_message') }}</div><br>
                        @endif

                            <div id="markAsRead" class="text-center">
                                @foreach($user->unreadNotifications as $notification)
                                    @include('includes.notifications.'. snake_case(class_basename($notification->type)))<br>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>

            <?php $posts= Post::orderBy('created_at', 'desc')->paginate(15); ?>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table-hover">
                                <tr>
                                    <td><strong>Comments</strong></td>
                                    <td><strong>Last updated</strong></td>
                                    <td><strong>Title</strong></td>
                                    <td><strong>Thread</strong></td>
                                    <td><strong>Author</strong></td>
                                </tr>

                                @foreach($posts as $post)
                                <tr>
                                    <td>{{count($post->singles)}}</td>
                                    <td>{{$post->singles->pluck('updated_at')->last() ? $post->singles->pluck('updated_at')->last()->diffForHumans() : 'No updates yet'}}</td>
                                    <td><a href="{{route('each', ['id'=> $post->id])}}">{{str_limit($post->title, 15)}}</a></td>
                                    <td>{{$post->topic}}</td>
                                    <td>{{ucfirst($post->posted_by)}}</td>
                                </tr>
                                @endforeach
                            </table>
                            <h4 class="text-center">{{$posts->links()}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <br><br>


@include('includes.footer')
</body>
</html>




@else
    @include('includes.error')
@endif