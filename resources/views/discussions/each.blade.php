<?php use App\Post;use App\User; ?>
@if(Auth::user())
<?php $user= Auth::user(); ?>
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
                    {{--<h1>{{str_limit($post->title, 20)}}</h1>--}}
                </header>
                <span><h2>{{$post->title}}</h2></span>
                <a href="{{url('/discussions')}}" class="btn btn-default">All Discussions</a>
                <br><br>


                <div class="well">
                    <p><strong>Original question:</strong> {{$post->post}}</p><br>

                    <form action="{{route('add_post', ['id'=> $post->id])}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <textarea rows="5" class="form-control" name="single_post"></textarea><br>
                        <input type="file" name="image"><br>
                        <input type="submit" value="Reply">
                    </form>
                </div>

                @if(isset($singles))
                    @foreach($singles as $single)
                        <div class="well">
                            <p><strong>{{$single->user->name}}:</strong> {{$single->single_post}}</p>
                            @foreach($single->single_images as $img)
                                <img src="../../post_images/{{$img->post_image}}" height="100" width="100" class="img-rounded">
                                @endforeach
                        </div>
                    @endforeach
                @endif
                <h4 class="text-center">
                   {{--{{$singles->link()}}--}}
                </h4>
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