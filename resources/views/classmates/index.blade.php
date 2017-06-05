@if(Auth::user())
        <!DOCTYPE HTML>
<html>
<head>
    <title>Classmates</title>
    <!--HEADER-->
    @include('includes.header')
    <!--HEADER-->
</head>
<body>
<?php $user= Auth::user(); ?>

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

                    <h1>Classmates</h1><br>

                            @if($nerds)
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="table-responsive">
                                      <table class="table-hover">
                                          <tr>
                                              <th><strong>Photo</strong></th>
                                              <th><strong>Name</strong></th>
                                              <th><strong>Email</strong></th>
                                              <th><strong>More</strong></th>
                                          </tr>
                                          @foreach($nerds as $nerd)
                                              <tr>
                                                  <td><img src="{{$nerd->photo ? $nerd->photo->file : 'PLACEHOLDER/avatar.JPG'}}" height="62" width="62" class="img-circle"</td>
                                                  <td>{{$nerd->name}}</td>
                                                  <td><a href="mailto:{{$nerd->email}}">{{$nerd->email}}</a></td>
                                                  <td><a href="{{route('details', ['id'=> $nerd->id])}}" class="btn btn-default">View</a></td>
                                              </tr>
                                          @endforeach
                                      </table>
                                  </div>
                              </div>
                              @endif


                </header>
                <span class="image main"><!--PLACEHOLDER--></span>

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
