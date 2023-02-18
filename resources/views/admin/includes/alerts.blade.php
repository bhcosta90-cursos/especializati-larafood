@if(session('success'))
    <div class='alert alert-success text-center'>
        {{ session('success') }}
    </div>
@endif

@if(session('warning'))
    <div class='alert alert-warning text-center'>
        {{ session('warning') }}
    </div>
@endif

@if(session('error'))
    <div class='alert alert-warning text-center'>
        {{ session('error') }}
    </div>
@endif
