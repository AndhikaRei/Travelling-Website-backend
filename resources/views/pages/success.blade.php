@extends('layouts.success')

@section('title')
    Checkhout Success
@endsection

@section('content')
    <main>
        <!-- Details Header -->
        <section class="section-details-header"></section>
        <!-- Details Content -->
        <div class="section-sukses d-flex align-items-center">
            <div class="col text-center">
                <img src="{{url('frontend/images/ic mail.png')}}" alt="">
                <h1>Yay ! Success</h1>
                <p>
                    We've sent you email for trip
                    <br>
                    instruction please read it as well
                </p>
                <div class="btn btn-home">
                    <a href="{{route('home')}}"> Go to Home</a>
                </div>
            </div>
        </div>
    </main>
@endsection


