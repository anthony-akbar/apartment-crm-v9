<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Business House | Admin</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
    <!-- END: CSS Assets-->

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- Load the Latest Bootstrap 5 Stylesheet -->
    <!-- Load the Latest Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Load the Icon Picker's Stylesheet -->
    <link href="{{ asset('dist/css/bootstrapicons-iconpicker.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<!-- END: Head -->
<body class="py-5 md:py-0">
@include('sections.mobileMenu')
@include('sections.topMenu')
<div class="flex overflow-hidden">
    @include('sections.sidebar')
    <!-- BEGIN: Content -->
    <div class="content">
        @yield('content')
    </div>
    <!-- END: Content -->
</div>
<!-- BEGIN: Dark Mode Switcher-->
{{--<div data-url="side-menu-dark-dashboard-overview-4.html"
     class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
    <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
    <div class="dark-mode-switcher__toggle border"></div>
</div>--}}
<!-- END: Dark Mode Switcher-->

<!-- BEGIN: JS Assets-->
<script
    src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>--}}
<script src="{{ asset('dist/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<!-- END: JS Assets-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- Load the Latest Bootstrap 5 Framework -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Load the Icon Picker's JavaScript -->
<script src="{{ asset('dist/js/bootstrapicon-iconpicker.js') }}"></script>
<script>
    // initialize the icon picker and done
    $('.iconpicker').iconpicker({
        // customize the icon picker with the following options
        // THANKS FOR WATCHING!
        title: 'My Icon Picker',
        selected: false,
        defaultValue: false,
        placement: "bottom",
        collision: "none",
        animation: true,
        hideOnSelect: true,
        showFooter: true,
        searchInFooter: false,
        mustAccept: false,
        selectedCustomClass: "bg-primary",
        fullClassFormatter: function (e) {
            return e;
        },
        input: "input,.iconpicker-input",
        inputSearch: false,
        container: false,
        component: ".input-group-addon,.iconpicker-component",
        templates: {
            popover: '<div class="iconpicker-popover popover" role="tooltip"><div class="arrow"></div>' + '<div class="popover-title"></div><div class="popover-content"></div></div>',
            footer: '<div class="popover-footer"></div>',
            buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' + ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
            search: '<input type="search" class="form-control iconpicker-search" placeholder="Type to filter" />',
            iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
            iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
        }
    });
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1VDDWMRSTH"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'G-1VDDWMRSTH');

    $(".one, .two, .three, .four, .five, .six, .seven, .eight, .nine, .ten, .eleven").hover(
        function () {
            console.log($(this).attr('class'))
            let clas = $(this).attr('class')
            $('.' + clas).addClass('hover');
        }, function () {
            let clas = $(this).attr('class')
            console.log($('.' + clas))
            $('.' + clas.substring(0, clas.indexOf(' '))).removeClass('hover');
        }
    );
</script>
@yield('script')

</body>
</html>
