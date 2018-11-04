@extends('_layouts.master')

@section('body')
    <section class="jumbotron text-white bg-primary websocket">
        <div class="container">
            <p class="jumbotron-support jumbotron-shadow">Asynchronous WebSocket server.</p>
            <h1 class="jumbotron-heading jumbotron-shadow">
                WebSockets for PHP
            </h1>
            <p class="lead font-weight-bold pt-3 pb-3 jumbotron-shadow ">
                Ratchet is a loosely coupled PHP library providing developers with tools to create real time,
                bi-directional applications between clients and servers over WebSockets. This is not your Grandfather's
                Internet.
            </p>

            <p>
                <a href="#" class="btn btn-link text-white-50 my-2">Documentation</a>
                <a href="https://github.com/cboden/Ratchet-examples"
                   class="btn btn-link text-white-50 my-2">Examples</a>
            </p>
        </div>
    </section>


    <div class="pt-4 pt-md-5 ml-5 mr-5 pb-5">
        <div class="row">
            <div class="col-12 col-md">
                <h2>Feature</h2>
            </div>
            <div class="col-6 col-md">
                <h5 class="pb-4">
                    <span class="pb-2 border-bottom">Fast & Easy</span>
                </h5>
                <p class="small">Write your own chat (aka "Hello World!" for sockets) application in a matter of
                    minutes.</p>
                <a href="#" class="mb-1">Learn more »</a>
            </div>
            <div class="col-6 col-md">
                <h5 class="pb-4">
                    <span class="pb-2 border-bottom">Components</span>
                </h5>
                <p class="small">Ratchet provides many components for you to pick and choose from to easily add
                    functionality.</p>
                <a href="#" class="mb-1">Learn more »</a>
            </div>
            <div class="col-6 col-md">
                <h5 class="pb-4">
                    <span class="pb-2 border-bottom">Compatible</span>
                </h5>
                <p class="small">Ratchet is fully PSR-4 compliant, so it naturally plays well with others.</p>
                <a href="#" class="mb-1">Learn more »</a>
            </div>
            <div class="col-6 col-md">
                <h5 class="pb-4">
                    <span class="pb-2 border-bottom">React Based</span>
                </h5>
                <p class="small">Create connections with conversational experiences.</p>
                <a href="#" class="mb-1">Learn more »</a>
            </div>
        </div>
    </div>

    <!--
    <div class="pt-4 pt-md-5 ml-5 mr-5 pb-5 border-top">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <i>Integer sed porta ligula.</i>
                   Aenean euismod, eros eget tristique bibendum, odio sapien ultrices metus, et auctor augue justo ut arcu.
                   Nam sodales, felis ut eleifend viverra, tortor nisl porta ligula, eget mattis felis ex ut ex.
                   Quisque <a href="#"> blandit condimentum neque</a>, eu pharetra nibh commodo dignissim.
                   Nullam ipsum tortor, malesuada vel nibh at, commodo volutpat lectus.</p>
            </div>
        </div>
    </div>
    -->

    <div class="pt-4 pt-md-5 ml-5 mr-5 pb-5 border-top">
        <div class="container">
            <div class="row clients v-center">
                <div class="col col-md">
                    <img src="/assets/images/client1.png">
                </div>
                <div class="col col-md">
                    <img src="/assets/images/client2.png">
                </div>
                <div class="col col-md">
                    <img src="/assets/images/client3.png">
                </div>
                <div class="col col-md">
                    <img src="/assets/images/client4.png">
                </div>
                <div class="col col-md">
                    <img src="/assets/images/client5.png">
                </div>
                <div class="col col-md">
                    <img src="/assets/images/client6.jpg">
                </div>
                <div class="col col-md">
                    <img src="/assets/images/client7.png">
                </div>
            </div>
        </div>
    </div>


    <section class="jumbotron m-0 bg-dark text-white">
        <div class="container position-relative">
            <p class="jumbotron-back jumbotron-shadow">Connect...</p>
            <h1 class="jumbotron-heading jumbotron-shadow">
                Looking for more? <br>
                Here are a few places to explore.
            </h1>
            <p class="mt-5">
                <a href="#" class="btn btn-link my-2">Product roadmap</a>
                <a href="https://groups.google.com/forum/#!forum/ratchet-php" target="_blank" class="btn btn-link my-2">Developer
                    communities</a>
                <a href="#" class="btn btn-link my-2">Twitter</a>
                <a href="#" class="btn btn-link my-2">GitHub</a>
            </p>
        </div>
    </section>

    <section class="jumbotron bg-white m-0">
        <div class="container">
            <p class="jumbotron-support">Build up your application through simple interfaces</p>
            <h1 class="jumbotron-heading">
                Review the documentation to <br> get started.
            </h1>
            <p class="lead font-weight-bold pt-3 pb-2">
                Learn what makes WebSockets different from the traditional HTTP request/response pattern.
            </p>
            <p>
                <a href="#" class="btn btn-outline-secondary my-2">Begin tutorial »</a>
            </p>
        </div>
    </section>
@endsection
