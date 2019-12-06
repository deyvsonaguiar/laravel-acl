@if(session('success'))
<div class="container">
    <div class="alert alert-success" role="alert">
        {{ session('success')}}
    </div>
</div>
@endif

@if(session('warning'))
<div class="container">
    <div class="alert alert-warning" role="alert">
        {{ session('warning')}}
    </div>
</div>
@endif

@if(session('danger'))
<div class="container">
    <div class="alert alert-danger" role="alert">
        {{ session('danger')}}
    </div>
</div>
@endif
