@include('layout.header')
    <section class="pt-5 pb-5">
        <div class="container-fluid">
           <div class="row">
                <div class="col-md-3">
                    @include('layout.sidebar')
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
           </div>
        </div>
    </section>
@include('layout.footer')