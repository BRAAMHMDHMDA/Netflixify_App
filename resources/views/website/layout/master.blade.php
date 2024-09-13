<!doctype html>
<html lang="en">

    @include('website.layout._head')

    <body>
        <div style='min-height: calc(100vh - 133px); margin-bottom: 80px'>
            <!-- Start of banner section-->
            <section id="banner">
                @include('website.layout._navbar')
                @yield('banner')
            </section>
            <!-- end of banner section-->

            @yield('content')
        </div>

        @include('website.layout._footer&scripts')
    </body>
</html>
