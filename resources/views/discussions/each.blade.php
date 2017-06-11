<?php use App\Post;use App\User; ?>
@if(Auth::user())
<?php $user= Auth::user(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>{{str_limit($post->title, 15)}}</title>
    @include('includes.header')

    <style>
        .timestamp, .well_timestamp {
            text-align: right;
        }
    </style>
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
                    <p><strong><img src="{{$post->user->photo ? '../'.$post->user->photo->file : '../PLACEHOLDER/avatar.JPG'}}" height="50" width="50" class="img-circle"> by {{ucfirst($post->posted_by)}} :</strong> {{$post->post}}</p><br>
                    <form action="{{route('add_post', ['id'=> $post->id])}}" method="POST" id="sp_form" name="sp_form" enctype="multipart/form-data" accept-charset="UTF-8">
                        {!! csrf_field() !!}
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input type="hidden" name="topic" value="{{$post->topic}}">
                        <textarea rows="5" class="form-control decline" name="single_post" id="single_post" pattern="[A-Za-z]"></textarea><br>
                        <p>You may attach a JPG, PNG, GIF, PHP, SQL, TXT, and HTML file</p>
                        <input type="file" name="image" id="myFile"><br>
                        <input type="submit" value="Reply">
                    </form>

                    <div class="timestamp">
                        <p>Thread started {{$post->created_at->diffForHumans()}}</p>
                    </div>
                </div>

                @if(isset($singles))
                    @foreach($singles as $single)
                        <div class="well">
                            <p><img src="../{{$single->user->photo ? $single->user->photo->file : '../PLACEHOLDER/avatar.JPG'}}" height="30" width="30" class="img-circle">
                                <strong>{{ucfirst($single->user->name)}}:</strong> {{$single->single_post}}</p>
                            @foreach($single->single_images as $img)
                                    @if($img->type == 'php')
                                        <a href="../../post_files/{{$img->post_image}}" download><img src="../../PLACEHOLDER/php.png" height="100" width="100" class="img-rounded"></a>

                                        @elseif($img->type == 'html')
                                        <a href="../../post_files/{{$img->post_image}}" download><img src="../../PLACEHOLDER/html.jpg" height="100" width="100" class="img-rounded"></a>

                                        @elseif($img->type == 'txt')
                                        <a href="../../post_files/{{$img->post_image}}" download><img src="../../PLACEHOLDER/txt.png" height="100" width="100" class="img-rounded"></a>

                                        @elseif($img->type == 'sql')
                                        <a href="../../post_files/{{$img->post_image}}" download><img src="../../PLACEHOLDER/sql.jpg" height="100" width="100" class="img-rounded"></a>

                                @elseif($img->type == 'jpg' || $img->type == 'png' || $img->type == 'JPG' || $img->type == 'jpeg' || $img->type == 'gif' || $img->type == 'PNG')
                                        <a href="{{url('larger_view', ['id'=> $img->id])}}"><img src="../../post_images/{{$img->post_image}}" height="100" width="100" class="img-rounded"></a>
                                    @endif
                                @endforeach
                            <div class="well_timestamp">
                                {{$single->created_at->diffForHumans()}}
                            </div>
                        </div>
                    @endforeach
                @endif
                <h4 class="text-center">
                    {{$singles->links()}}
                </h4>
            </div>

        </section>
    </div>

<!--JAVASCRIPT FILE-->
@include('includes.word_validation')
<!--JAVASCRIPT FILE-->

@include('includes.footer')


</body>
</html>
@else
    @include('includes.error')
@endif