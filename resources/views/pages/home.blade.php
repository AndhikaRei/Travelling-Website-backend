@extends('layouts.app')

@section('title')
    AndhikaTravel
@endsection
    
@section('content')
    
    {{-- Hero Title --}}
    <header class="text-center">
        <h1>
            Explore The Beautiful World
            <br>
            As Easy One Click
        </h1>
        <p>
            You will see beatiful
            <br>
            moment you never see before
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">
            Get Started
        </a>
    </header>

    {{-- Main Content --}} 
    <main>
        <!-- Statiscik -->
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-4 col-md-2 stats-detail">
                    <h2> 20K</h2>
                    <p>Members</p>
                </div>
                <div class="col-4 col-md-2 stats-detail">
                    <h2> 12</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-4 col-md-2 stats-detail">
                    <h2> 3K</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-4 col-md-2 stats-detail">
                    <h2> 7</h2>
                    <p>Partners</p>
                </div>
            </section>
        </div>
        <!-- Wisata Popular -->
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-header">
                        <h2>Wisata Popular</h2>
                        <p>
                            Something you never try
                            <br>
                            before this world
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular-content" id="pop-content">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card card-travel text-center d-flex flex-column" style="background-image: url('{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}')">
                            <div class="travel-country">{{$item->location}}</div>
                            <div class="travel-location">{{$item->title}}</div>
                            <div class="travel-button mt-auto">
                                <a href="{{route('details', $item->slug)}}" class="btn btn-view-details">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Network -->
        <section class="section-network" id="network">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-lg-left">
                        <h2>Our Network</h2>
                        <p>
                            Companies are trusted us 
                            <br>
                            more than just a trip 
                        </p>
                    </div>
                    <div class="col-md-8 modal-dialog-centered">
                        <img src="frontend/images/Item.png" alt="Logo-network">
                    </div>
                </div>
            </div>
        </section>

        <!--Testimonial-->
        <section class="section-testimonial" id="testimonial">
            <div class="section-testimonial-heading">
                <div class="container">
                    <div class="row">.
                        <div class="col-4 col-md-12 col-lg-12 text-center">
                            <h2>They Are Loving Us</h2>
                            <p>
                                Moments were giving them 
                                <br>
                                the best experience
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-testimonial-content">
                <div class="container">
                    <div class="section-popular-travel row justify-content-center">
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="card-testimonial text-center">
                                <div class="testimonial-content">
                                    <img src="frontend/images/Reihan.png" alt="">
                                    <h3>Reihan</h3>
                                    <p>
                                        "It was amazing and I could 
                                        not  stop saying hooray for 
                                        every single moment.
                                        It was perfecto"
                                    </p>
                                    <hr>
                                </div>
                                <p class="trip-to mt-2">
                                    Trip to Ubud, Bali
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="card-testimonial text-center">
                                <div class="testimonial-content">
                                    <img src="frontend/images/Veronica.png" alt="">
                                    <h3>Veronica</h3>
                                    <p>
                                        "The trip was amazing and i saw
                                        something that was very 
                                        beautiful and i want to visit
                                        this place again"
                                    </p>
                                    <hr>
                                </div>
                                <p class="trip-to mt-2">
                                    Trip to Nusa Penida, NTT
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="card-testimonial text-center">
                                <div class="testimonial-content">
                                    <img src="frontend/images/Tamara.png" alt="">
                                    <h3>Tamara</h3>
                                    <p>
                                        "I love it when the waves was 
                                        shaking harder, although 
                                        i was scared too. I do this again "
                                    </p>
                                    <hr>
                                </div>
                                <p class="trip-to mt-2">
                                    Trip to Danau Toba, Sulut
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Double Button -->
        <section class="section-doublebutton" id="doublebutton">
            <div class="container">
                <div class="row col-12 justify-content-center">
                    <a href="#" class="btn btn-ineedhelp px-4"> I Need Help</a>
                    <a href="{{route('register')}}" class="btn btn-getstarted px-4">Get Started</a>
                </div>
            </div>
        </section>
    </main>
@endsection