@if(Auth::user())
        <!DOCTYPE HTML>
<html>
<head>
    <title>Classmates</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{asset('css/stylesmix.css')}}">

    <!--WEBPACK-->
    <link rel="stylesheet" href="{{asset('css/stylesmix.css')}}">
    <!--WEBPACK-->

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!--BOOTSTRAP CSS-->


</head>
<body>
<?php $user= Auth::user(); ?>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <a href="index.html" class="logo"><!--PLACEHOLDER--></a>
        <nav>
            <ul>
                <li><a href="#menu">Menu</a></li>
            </ul>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
            @if($user)
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/profile')}}">Profile</a></li>
                <li><a href="{{url('/discussions')}}">Discussions</a></li>
                <li><a href="{{url('/classmates')}}">Classmates</a></li>
            @endif
        </ul>
        <ul class="actions vertical">
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                    {{ csrf_field() }}
                </form>
        </ul>
    </nav>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <section id="main" class="main">
            <div class="inner">
                <header class="major">

                    <h1>Classmates 101</h1><br>

                            @if($nerds)
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                          <tr>
                                              <th>Photo</th>
                                              <th>Name</th>
                                              <th>Email</th>
                                              <th>College</th>
                                              <th>Interest</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                          @foreach($nerds as $nerd)
                                          <tr>
                                              <td><img src="{{$nerd->photo ? $nerd->photo->file : 'PLACEHOLDER/avatar.JPG'}}" height="62" width="62" class="img-circle"</td>
                                              <td>{{$nerd->name}}</td>
                                              <td><a href="mailto:{{$nerd->email}}">{{$nerd->email}}</a></td>
                                              <td>{{$nerd->school}}</td>
                                              <td>{{$nerd->interest}}</td>
                                          </tr>
                                          @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                              @endif




                </header>
                <span class="image main"><!--PLACEHOLDER--></span>

            </div>
        </section>

    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <ul class="icons">
                <li><a href="https://github.com/dvsocean/nerdschool" class="icon alt fa-github"><span class="label">Github</span></a></li>
                <li><a href="https://www.linkedin.com/in/daniel-ocean-4ab9918a/" class="icon alt fa fa-linkedin"><span class="label">Instagram</span></a></li>
                <li><a href="mailto:dvsocean@icloud.com" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
            </ul>
        </div>
        <p class="copyright">&copy; Nerdschool, Walnut, CA</p>
    </footer>

</div>

<!-- Scripts -->
<script src="{{asset('js/scriptsmix.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- BOOTSTRAP JS-->

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