<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('metronic/plugins/global/plugins.bundle.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('metronic/plugins/custom/cropper/cropper.bundle.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('metronic/css/style.bundle.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('metronic/css/custom.css') }}" />
    @stack('custom-css')

</head>
<body id="kt_app_body"
      data-kt-app-layout="dark-sidebar"
      data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true"
      data-kt-app-sidebar-fixed="true"
      data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true"
      data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true"
      data-kt-app-toolbar-enabled="true"
      class="app-default">

<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

        @include('admin.header')

        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

            @include('admin.sidebar')

            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">

                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                            @yield('breadcrumb')
                            @yield('buttons')
                        </div>
                    </div>


                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <div id="kt_app_content_container" class="app-container container-fluid">
                            @include('admin.partials.flash')
                            @yield('content')
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<!--<script>var hostUrl = "assets/";</script>-->

<script src="{{ asset('metronic/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('metronic/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('metronic/plugins/custom/cropper/cropper.bundle.js') }}"></script>
<x-head.tinymce-config/>



@stack('custom-js')

</body>
</html>
