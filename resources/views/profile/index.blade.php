<!DOCTYPE HTML>
<html>
<head>
    <title>{{Auth::user()->name}}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{asset('css/stylesmix.css')}}">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

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
          <li><a href="{{url('/')}}">Home</a></li>
        <ul class="actions vertical">
          @if(Auth::user())
              <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                      Logout {{Auth::user()->name}}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
            @else
                <li><a href="{{url('/register')}}" class="button special fit">Register</a></li>
                <li><a href="/login" class="button fit">Log In</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
        </ul>
    </nav>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <section id="main" class="main">
            <div class="inner">
                <header class="major">
                    <h1>{{Auth::user()->name}}'s Profile</h1><br>
                    <img src="images/pic04.jpg" class="img-circle" height="82" width="82">
                </header>
                <span class="image main"><!--PLACEHOLDER--></span>

                <form method="post" action="#">
                    <div class="row uniform">
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="name" id="name" value="{{Auth::user()->name}}" placeholder="" />
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                            <input type="email" name="email" id="email" value="{{Auth::user()->email}}" placeholder="" />
                        </div>

                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="school" id="school" value="{{Auth::user()->school}}" placeholder="--school--" />
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                            <input type="text" name="career" id="career" value="{{Auth::user()->major}}" placeholder="--major--" />
                        </div>
                        <!-- Break -->
                        <div class="12u$">
                            <div class="select-wrapper">
                                <select name="category" id="category">
                                    <option value="">College Student</option>
                                    <option value="1">Hobby/Passion</option>
                                    <option value="1">Always been tech savvy</option>
                                    <option value="1">Here to better myself</option>
                                    <option value="1">Curious</option>
                                </select>
                            </div>
                        </div>
                        <!-- Break -->
                        <div class="6u 12u$(small)">
                            <input type="checkbox" id="copy" name="copy">
                            <label for="copy">TEST</label>
                        </div>
                        <div class="6u$ 12u$(small)">
                            <input type="checkbox" id="human" name="human">
                            <label for="human">Notifications</label>
                        </div>
                        <!-- Break -->
                        <div class="12u$">
                            <textarea name="message" id="message" placeholder="A bit about you" rows="6"></textarea>
                        </div>
                        <!-- Break -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Update" class="special" /></li>
                            </ul>
                        </div>
                    </div>
                </form>

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

</body>
</html>
