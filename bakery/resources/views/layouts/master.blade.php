<!DOCTYPE html>
<html lang="en">

<head>
    <title>Canada | Bakery </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    @include('layouts.styles')
    <style>
        .fixed-button.active {
            display: none;
            bottom: 50px;
            opacity: 1;
        }

    </style>
</head>

<body>
    <!-- Pre-loader start -->

    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('layouts.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('layouts.sidebar')
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        @yield('page_header')
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                @yield('content')
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.scripts')

</body>

</html>
