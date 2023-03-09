<footer class="main-footer">
  <div class="float-right d-none d-sm-inline">Anything you want</div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
 

<!-- custom script -->
<script type="text/javascript">const baseURL = "{{ route('Admin.permohonan') }}";</script>
<script src="{{ asset('js/admin.js') }}" type="text/javascript"></script>

@if (session('alert'))
  <x-alert msg="{{ session('alert')['msg'] }}" type="{{ session('alert')['type'] }}" color="{{ session('alert')['color'] }}" />
@endif
<!-- custom script END -->


</body>
</html>
