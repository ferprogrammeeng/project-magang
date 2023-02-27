<x-header />

<x-navbar :$page :filter="$active" />

<x-sidebar :$active />

<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      {{ $slot }}
    </div>
  </div>
</div>


<x-footer />