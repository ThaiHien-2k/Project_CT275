<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <title><?=$this->e($title)?></title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link href="/css/animate.css" rel="stylesheet">
    <link href="../css/type.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?=$this->section("page_specific_css")?>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" style="background-image: url(http://localhost/css/pic/bg.webp); ">
        <div class="container" >
            <div class="navbar-header" >

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" >
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <strong> <a class="navbar-brand" href="/home" style="color: white">
                    <?=$this->e($title)?>
                </a></strong>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right" >
                    <!-- Authentication Links -->
                    <?php if (! \App\SessionGuard::isUserLoggedIn()): ?>
                            <li > <a href="/login" ><span style="color: red;">Login</span></a></li>
                            <li> <a href="/register"><span style="color: red">Register</span></a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?=$this->e(\App\SessionGuard::user()->name)?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="/logout"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <?=$this->section("page")?>
    <footer class="footer" style="background-image: url(http://localhost/css/pic/bg.webp)">
      <div class="container">
        <p class="text-muted" ><strong>Copyright &copy; 2022 by Thành Lộc & Thái Hiền</strong>
        </p>
           
      </div>
    </footer>    

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/wow.min.js"></script>

    <?=$this->section("page_specific_js")?>
</body>
</html>
