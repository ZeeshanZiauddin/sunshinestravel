<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/main.js'])


</head>

<body>
    <!-- ====== Navbar Section Start -->
    <x-navbar />
    <!-- ====== Navbar Section End -->
    {{ $slot }}

    <x-footer />
    <!-- ====== Footer Section End -->

    <!-- ====== Back To Top Start -->
    <a href="javascript:void(0)"
        class="back-to-top fixed bottom-8 left-auto right-8 z-[999] hidden h-10 w-10 items-center justify-center rounded-md bg-primary text-white shadow-md transition duration-300 ease-in-out hover:bg-dark">
        <span class="mt-[6px] h-3 w-3 rotate-45 border-l border-t border-white"></span>
    </a>
    <!-- ====== Back To Top End -->

</body>

</html>
