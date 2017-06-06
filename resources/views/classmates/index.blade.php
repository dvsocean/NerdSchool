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
