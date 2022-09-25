
  @if (session()->has('success'))
<div class="alert alert-success">
    @if(is_array(session('success')))
    <strong class="d-block d-sm-inline-block-force">Well done!</strong> Your Data saved successfuly.
    @else
        {{ session('success') }}
    @endif
</div>
@endif