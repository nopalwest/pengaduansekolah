@include('layouts.backend.sidebar')
@include('layouts.backend.navbar')
<div class="container-fluid">
    @yield('content')
</div>
{{-- /. container-fluid --}}
</div>
{{-- end main content --}}
@include('layouts.backend.footer')



