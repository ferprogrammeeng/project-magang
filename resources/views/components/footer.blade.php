<footer class="main-footer">
  <div class="float-right d-none d-sm-inline">Anything you want</div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
 

<!-- dependencies script -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
<!-- dependencies script END -->

<!-- custom script -->
<script type="text/javascript">const baseURL = "{{ route('Admin.permohonan') }}";</script>
<script src="{{ asset('js/admin.js') }}" type="text/javascript"></script>

@if (session('alert'))
  <x-alert msg="{{ session('alert')['msg'] }}" type="{{ session('alert')['type'] }}" color="{{ session('alert')['color'] }}" />
@endif
<!-- custom script END -->


</body>
</html>
