@extends('layouts.app')

@section('title')
    Details Page
@endsection

@section('content')
    <main>
        <!-- Details Header -->
        <section class="section-details-header"></section>
        <!-- Details Content -->
        <section class="section-details-content">
            <div class="container">
                <!-- Breadcrumb -->
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Paket Travel</li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <!-- Left Content -->
                    <div class="col-md-8 pl-0">
                        <div class="card card-details">
                            <h1>{{$item->title}}</h1>
                            <h2>{{$item->location}}</h2>
                            @if ($item->galleries->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img
                                        class="xzoom"
                                        id="xzoom-default"
                                        src="{{Storage::url($item->galleries->last()->image)}}"
                                        xoriginal="{{Storage::url($item->galleries->last()->image)}}"
                                        />
                                        <div class="xzoom-thumbs">
                                            <?php $i=1; ?>
                                            @foreach ($item->galleries as $gallery)
                                                <?php if($i!=1) { ?>
                                                    <a href="{{Storage::url($gallery->image)}}"
                                                        ><img
                                                        class="xzoom-gallery"
                                                        width="130"
                                                        src="{{Storage::url($gallery->image)}}"
                                                        xpreview="{{Storage::url($gallery->image)}}"
                                                    /></a>
                                                <?php } ?>
                                                <?php $i=$i+1; ?>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <h2>Tentang Wisata</h2>
                            <p> {{$item->about}} </p>
                            <div class="features row">
                                <div class="col-md-4 border-right">
                                    <img src="{{url('frontend/images/ic event.png')}}" alt="" class="feature-image">
                                    <div class="description ">
                                        <h3>Featured Events</h3>
                                        <p>{{$item->featured_events}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-right">
                                    <img src="{{url('frontend/images/ic bahasa.png')}}" alt="" class="feature-image">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{$item->language}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{url('frontend/images/ic food.png')}}" alt="" class="feature-image">
                                    <div class="description">
                                        <h3>Food</h3>
                                        <p>{{$item->foods}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right Content -->
                    <div class="col-mg-4 pr-0">
                        <div class="card card-details card-right">
                            <h2>Members are Going</h2>
                            <div class="members-image">
                                <img src="{{url('frontend/images/Mask Group 4.png')}}" alt="">
                                <img src="{{url('frontend/images/Mask Group 4.png')}}" alt="">
                                <img src="{{url('frontend/images/Mask Group 4.png')}}" alt="">
                                <img src="{{url('frontend/images/Mask Group 4.png')}}" alt="">
                                <img src="{{url('frontend/images/Mask Group 4.png')}}" alt="">
                                <img src="{{url('frontend/images/Group 1.png')}}" alt="">
                            </div>
                            <hr>
                            <h2 class="">INFORMATION</h2>
                            <table class="trip-info">
                                <tr>
                                    <th>Date of Departure</th>
                                    <td class="text-right">{{\Carbon\Carbon::create($item->departure_date)->format('F n, Y')}}</td>
                                </tr>
                                <tr>
                                    <th>Durations</th>
                                    <td class="text-right">{{$item->duration}}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td class="text-right">{{$item->type}}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td class="text-right">${{$item->price}}.00/person</td>
                                </tr>
                            </table>
                        </div>
                        @auth
                            <form action="{{route('checkout_process', $item->id)}}", method="POST">
                                @csrf
                                <div class="join-container">
                                    <button class="btn btn-block btn-joinnow", type="Submit">
                                        Join Now
                                    </button>
                                </div>
                            </form>
                        @endauth
                        @guest
                            <div class="join-container">
                                <a href="{{route('login')}}" class="btn btn-block btn-joinnow">
                                    Login or Register to Join
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </section>
    </main>  
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
    <script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom ({
                zoomWidth : 500,
                title : false,
                tint :'#333',
                Xoffset : 15
            }) ;
        }) ;
    </script>    
@endpush