<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title') | Eco Cover Energy </title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('css/nifty.css') }}" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    {{-- <link href="{{ asset('css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet"> --}}

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ asset('icon-sets/icons/solid-icons/premium-solid-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('icon-sets/icons/line-icons/premium-line-icons.css') }}" rel="stylesheet">


    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ asset('plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('plugins/pace/pace.min.js') }}"></script>


    <!--Demo [ DEMONSTRATION ]-->
    {{-- <link href="css/demo/nifty-demo.min.css" rel="stylesheet"> --}}

    <!--Dark Theme-->
    <link href="{{ asset('css/themes/type-full/theme-dark-full.css') }}" rel="stylesheet">

    <!--Animate.css [ OPTIONAL ]-->
    <link href="{{ asset('plugins/animate-css/animate.min.css') }}" rel="stylesheet">





    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->

    @yield('styles')
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        <img src="{{ asset('img/ecologo.png') }}" alt="Eco Cover Energy Logo" class="brand-icon"
                            style="width:auto; height: 55px; margin-top: 10px; margin-left: 25%">
                        <!--<div class="brand-title">
                            <span class="brand-text" style="margin-left:10px"> ASAPro</span>
                        </div>-->
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->

                    </ul>
                    <ul class="nav navbar-top-links">

                        {{-- <li>
                            <!-- Bootstrap Select : Dark -->
                            <!--===================================================-->
                            <label for="project"><strong>Project:</strong></label>
                            <select id="project" class="selectpicker pad-top mar-rgt" data-style="btn-dark">
                                 @foreach (\App\Helper\Helper::getDomainProjectList() as $domain_project)
                                    {!! $domain_project !!}
                                @endforeach
                            </select>
                        </li> --}}


                        {{-- @include('layouts.notifications') --}}



                        @include('layouts.usermenu')


                        {{-- <li>
                            <a href="#" class="aside-toggle">
                                <i class="pli-dot-vertical"></i>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head" class="animated fadeInUp">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">@yield('pagetitle')</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    @include('layouts.breadcrumb')

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content" class="animated fadeInUp">

                    {{-- <hr class="new-section-sm bord-no"> --}}
                    @yield('content')



                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->



            @include('layouts.aside')

            @include('layouts.menu')


        </div>



        @include('layouts.footer')
        @yield('modals')

        @include('layouts.scrollbutton')
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->





    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="{{ asset('js/nifty.min.js') }}"></script>




    <!--=================================================-->

    <!--Demo script [ DEMONSTRATION ]-->
    {{-- <script src="{{ asset('js/demo/nifty-demo.min.js') }}"></script> --}}

    <script>
        $("#project").on("changed.bs.select",
            function(e, clickedIndex, newValue, oldValue) {

                window.location = this.value;
                console.log(this.value, clickedIndex, newValue, oldValue)
            });
    </script>

    <script>
        /// COOKIES

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        /// COOKIES
    </script>

    <script>
        $("#area-select").on("changed.bs.select",
            function(e, clickedIndex, newValue, oldValue) {
                setCookie('selectedArea', this.value, 365);
                console.log(this.value, clickedIndex, newValue, oldValue);
                location.reload();
            });


        var selectedArea = getCookie('selectedArea');

        if (selectedArea != "") {
            $('#area-select').selectpicker('val', selectedArea);
        } else {
            setCookie('selectedArea', 1, 365);
            $('#area-select').selectpicker('val', '1');
        }
    </script>

    @yield('modals')

    @yield('scripts')

</body>

</html>
