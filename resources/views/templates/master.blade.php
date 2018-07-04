<!DOCTYPE html>
<html>


@include('layouts.partials.header')



<body>

       @include('layouts.navigations.loading')
       @include('layouts.navigations.navbar-top')

        @include('layouts.sidebars.admin-sidebar')



    <main class="container" style="min-height: 600px">
         @yield('content')
    </main>
  
  @include('layouts.partials.footer')
  @include('layouts.partials.scripts')
</body>
</html>