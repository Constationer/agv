@include('layouts.head')

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            @include('layouts.navbar')
            @yield('content')

        </div>

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <span id="year"></span> <a href="javascript:void(0);">Zanex</a>. Designed
                        with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> Spruko
                        </a> All rights reserved
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
    </div>

    @include('layouts.script')
    @stack('scripts')

</body>

</html>
