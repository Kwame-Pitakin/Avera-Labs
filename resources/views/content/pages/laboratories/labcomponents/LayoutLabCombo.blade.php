<!DOCTYPE html>
<html 
lang="en"
class="light-style layout-navbar-fixed layout-menu-fixed"
dir="ltr"
data-theme="theme-default"
data-assets-path="../assets/"
data-template="vertical-menu-template-no-customizer"
>
<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
  />

  <meta name="description" content="" />

  <title>Avera Labs - @yield('title')</title>

   <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  @include('scriptsAndstyles.styles')
  

</head>
<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      @include('layouts.sections.menu.aside')

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        @include('layouts.sections.menu.navbar')

        <!-- / Navbar -->
        <!-- contet wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          @yield('content')

        <!-- / Content -->
        @include('layouts.masterfooter')
        </div>
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
</div>
    <!-- / Layout wrapper -->

    @include('scriptsAndstyles.scripts')

</body>
</html>
