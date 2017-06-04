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

                <script>
                    $(function(){
                        $('#sp_form').submit(function(e){

                            if($("#single_post").val().length < 3){
                                alert('Body must contain at least 3 characters to be considered a post');
                                e.preventDefault();
                            }

                            if($("#myFile")[0].files[0].size > 4000000){
                                alert("FILE TOO BIG, LIMIT 4MB");
                                e.preventDefault();
                            }
                        });
                    });
                </script>


                <div class="well">
                    <p><strong>Original question by {{ucfirst($post->posted_by)}} :</strong> {{$post->post}}</p><br>

                    <form action="{{route('add_post', ['id'=> $post->id])}}" method="POST" id="sp_form" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input type="hidden" name="topic" value="{{$post->topic}}">
                        <textarea rows="5" class="form-control decline" name="single_post" id="single_post"></textarea><br>
                        <p>You may attach a JPG, PNG, GIF, PHP, SQL, TXT, and HTML file</p>
                        <input type="file" name="image" id="myFile"><br>
                        <input type="submit" value="Reply">
                    </form>
                </div>



                @if(isset($singles))
                    @foreach($singles as $single)
                        <div class="well">
                            <p><strong>{{ucfirst($single->user->name)}}:</strong> {{$single->single_post}}</p>
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
                        </div>
                    @endforeach
                @endif
                <h4 class="text-center">
                    {{$singles->links()}}
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