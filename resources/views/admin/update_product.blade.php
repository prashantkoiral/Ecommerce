<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
     
        <!-- partial:partials/_navbar.html -->
        @include('admin.nevbar')
        <!-- partial -->
        @include('admin.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
  </body>
</html>