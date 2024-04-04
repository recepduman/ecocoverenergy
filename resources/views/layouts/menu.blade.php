            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">


                    <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
                    <!--It will only appear on small screen devices.-->
                    <!--================================
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <span class="brand-text">Nifty</span>
                        </a>
                        <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                    </div>
                    -->



                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="{{ asset('img/profile-photos/1.png') }}"
                                                alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse"
                                            aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name">{{ Auth::user()->name }}</p>
                                            <span class="mnp-desc">{{ Auth::user()->email }}</span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        {{-- <a href="#" class="list-group-item">
                                            <i class="pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="pli-gear icon-lg icon-fw"></i> Settings
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="pli-information icon-lg icon-fw"></i> Help
                                        </a> --}}
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="list-group-item">
                                            <i class="pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>


                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut" class="hidden">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                    <i class="pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                    <i class="pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                    <i class="pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                    <i class="pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--================================-->
                                <!--End shortcut buttons-->


                                <ul id="mainnav-menu" class="list-group">

                                    <li>
                                        <!-- Bootstrap Select : Dark -->
                                        <!--===================================================-->
                                        <label for="area-select" class="mar-lft"><strong>Firma:</strong></label>
                                        <select id="area-select" class="selectpicker pad-lft pad-rgt"
                                            data-style="btn-dark">
                                            <option value="1">ŞAHTAŞ</option>
                                            <option value="2">SİNTAÇ</option>
                                            <option value="3">BR MAĞAZACILIK</option>
                                            <option value="4">SANDALYECİ</option>
                                            {{-- @foreach (\App\Helper\Helper::getDomainProjectList() as $domain_project)
                                                {!! $domain_project !!}
                                            @endforeach --}}
                                        </select>
                                    </li>

                                    <li class="list-divider"></li>

                                    <!--Category name-->
                                    <li class="list-header">Navigation</li>
                                    <!--Menu list item-->
                                    {{-- <li>
                                        <a href="#">
                                            <i class="pli-home"></i>
                                            <span class="menu-title">Dashboard</span>
                                            <i class="arrow"></i>
                                        </a>

                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="index.html">Dashboard 1</a></li>
                                            <li><a href="dashboard-2.html">Dashboard 2</a></li>
                                            <li><a href="dashboard-3.html">Dashboard 3</a></li>

                                        </ul>
                                    </li> --}}



                                    <!--Menu list item-->
                                    <li class="{{ request()->is('dashboard') ? 'active-link' : '' }}">
                                        <a href="{{ route('dashboard') }}">
                                            <i class="pli-layout-grid"></i>
                                            <span class="menu-title">
                                                Ana Sayfa
                                            </span>
                                        </a>

                                        <!--Submenu-->
                                        {{-- <ul class="collapse {{ request()->is('reporting/*') ? 'in' : '' }}">
                                            <li class="{{ request()->is('reporting/newrelic') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.newrelic') }}"><i
                                                        class="pli-bar-chart"></i> Dashboard</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('reporting/visitsbycountries') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.visitsbycountries') }}"><i
                                                        class="pli-location-2"></i> Visits by Countries</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('reporting/loginsbycountries') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.loginsbycountries') }}"><i
                                                        class="pli-flag-2"></i> Logins by Countries</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('reporting/newrelicusersreport') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.newrelicusersreport') }}"><i
                                                        class="pli-conference"></i> User & Devices</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('reporting/newrelicscreenusagesbycountries') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.newrelicscreenusagesbycountries') }}"><i
                                                        class="pli-map"></i> Screen Usages by Countries</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('reporting/newreliccrashratesbyversions') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.newreliccrashratesbyversions') }}"><i
                                                        class="pli-line-chart"></i> Crash Rates by Versions</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('reporting/newreliccrashesbyuser') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.newreliccrashesbyuser') }}"><i
                                                        class="pli-bug"></i> Crashes by User</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('reporting/newreliccrashesbydate') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.newreliccrashesbydate') }}"><i
                                                        class="pli-target"></i> Crashes by Date</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('reporting/newrelicusagesbyversionandcountry') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.newrelicusagesbyversionandcountry') }}"><i
                                                        class="pli-pie-chart-3"></i> Usages by Version and Country</a>
                                            </li>
                                            <li
                                                class="{{ request()->is('reporting/newrelicperformancedashboard') ? 'active-link' : '' }}">
                                                <a href="{{ route('reporting.newrelicperformancedashboard') }}"><i
                                                        class="pli-server"></i> Performance Dashboard Usages</a>
                                            </li>
                                        </ul> --}}
                                    </li>

                                    <!--Menu list item-->
                                    <li class="{{ request()->is('temizlik') ? 'active-link' : '' }}">
                                        <a href="{{ route('temizlik') }}">
                                            <i class="pli-barricade"></i>
                                            <span class="menu-title">
                                                Temizlik
                                            </span>
                                        </a>
                                    </li>

                                    <!--Menu list item-->
                                    <li class="{{ request()->is('bakimonarim') ? 'active-link' : '' }}">
                                        <a href="{{ route('bakimonarim') }}">
                                            <i class="pli-worker"></i>
                                            <span class="menu-title">
                                                Bakım & Onarım
                                            </span>
                                        </a>
                                    </li>

                                    <!--Menu list item-->
                                    <li class="{{ request()->is('goruntulemeler/*') ? 'active-sub' : '' }}">
                                        <a href="#">
                                            <i class="pli-check"></i>
                                            <span class="menu-title">
                                                Görüntülemeler
                                            </span>
                                            <i class="arrow"></i>
                                        </a>

                                        <!--Submenu-->
                                        <ul class="collapse {{ request()->is('goruntulemeler/*') ? 'in' : '' }}">
                                            <li
                                                class="{{ request()->is('goruntulemeler/thermal') ? 'active-link' : '' }}">
                                                <a href="{{ route('goruntulemeler.thermal') }}"><i
                                                        class="pli-celsius"></i> Thermal</a>
                                            </li>
                                            <li class="{{ request()->is('goruntulemeler/el') ? 'active-link' : '' }}">
                                                <a href="{{ route('goruntulemeler.el') }}"><i class="pli-gopro"></i>
                                                    EL</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <!--Menu list item-->
                                    <li class="{{ request()->is('izleme') ? 'active-link' : '' }}">
                                        <a href="#">
                                            <i class="pli-bar-chart"></i>
                                            <span class="menu-title">
                                                İzleme
                                            </span>
                                        </a>
                                    </li>

                                    <li class="list-divider"></li>

                                    {{-- <!--Category name-->
                                    <li class="list-header">Components</li>


                                    <!--Menu list item-->
                                    <li class="active-sub">
                                        <a href="#">
                                            <i class="pli-file-html"></i>
                                            <span class="menu-title">Other Pages</span>
                                            <i class="arrow"></i>
                                        </a>

                                        <!--Submenu-->
                                        <ul class="collapse in">
                                            <li class="active-link"><a href="pages-blank.html">Blank Page</a></li>
                                            <li><a href="pages-pricing.html">Pricing<span class="label label-success pull-right">New</span></a></li>
                                            <li class="list-divider"></li>
                                            <li><a href="pages-404-alt.html">Error 404 alt</a></li>
                                        </ul>
                                    </li> --}}

                                </ul>

                                {{-- @include('layouts.menuwidget') --}}

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->
