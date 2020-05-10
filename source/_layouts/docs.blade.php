@extends('_layouts.master')

@section('body')


    <section class="jumbotron bg-white m-0">
        <div class="container">
            <h1 class="jumbotron-heading">
                {{ $page->title }}
            </h1>
            <p class="lead font-weight-bold pt-3 pb-2">
                {{  $page->description }}
            </p>
        </div>
    </section>


    <div class="container">

        <div class="row mb-5">
            <div class="col-md-3">



                <nav class="nav-docs">
                    <h4 class="text-primary font-thin text-uppercase">GETTING STARTED</h4>
                    <ul class="toc-links">
                        <li><a href="#">Process Flow</a></li>
                        <li><a href="#">Design Philosophy</a></li>
                        <li><a href="#">Connections</a></li>
                        <li><a href="#">Porta ac consectetur ac</a></li>
                        <li><a href="#">Vestibulum at eros</a></li>
                    </ul>
                </nav>

            </div>
            <div class="col-md-9">
                <div id="docs">
                    @yield('docs')
                </div>
            </div>
        </div>

    </div>


@endsection
