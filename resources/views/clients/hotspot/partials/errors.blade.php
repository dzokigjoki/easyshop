<style>
  .m-0 {
    margin: 0 !important;
  }
</style>
@if (isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
  <ul class="m-0">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif