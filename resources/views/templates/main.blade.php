@include('templates.head')
@include('templates.nav')
@include('templates.sidebar')
<div class="page-wrapper">
    <div class="page-content">
        @yield('content')
    </div>
</div>
</div>
@include('templates.footer')
@include('templates.scripts')
