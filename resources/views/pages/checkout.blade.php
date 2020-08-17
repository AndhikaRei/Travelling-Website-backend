@extends('layouts.checkout')

@section('title')
    Checkhout Page
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
                                <li class="breadcrumb-item">Details</li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <!-- Left Content -->
                    <div class="col-md-8 pl-0">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h1>Who's Going?</h1>
                            <h2>{{$item->travel_package->title}}, {{$item->travel_package->location}}</h2>
                            <div class="attendee ">
                                <table class="table table-responsive-sm text-center mt-4 mb-5">
                                    <thead>
                                        <tr>
                                            <td>PICTURE</td>
                                            <td>NAME</td>
                                            <td>NATIONALITY</td>
                                            <td>VISA</td>
                                            <td>PASSPORT</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{$detail->username}}" alt="foto" width="60", class="rounded-circle">
                                                </td>
                                                <td class="align-middle">{{$detail->username}}</td>
                                                <td class="align-middle">{{$detail->nationality}}</td>
                                                <td class="align-middle">{{$detail->is_visa ? '30 Days' : 'N/A'}}</td>
                                                <td class="align-middle">{{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}</td>
                                                <td class="align-middle">
                                                    <a href="{{route('checkout-remove',$detail->id)}}">
                                                        <img src="{{url('frontend/images/ic_cross.png')}}" width="20" alt="delete">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-centered">
                                                    No Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="member">
                                <h1>Add Member</h1>
                                <form class="form-inline" method="POST" action="{{ route('checkout-create', $item->id) }}">
                                    @csrf
                                    <label for="username" class="sr-only">Name</label>
                                    <input type="text" name="username" class="form-control mb-2 mr-sm-2" id="inputUsername" placeholder="Username" />
                                    <label for="nationality" class="sr-only">Name</label>
                                    <input type="text" name="nationality" class="form-control mb-2 mr-sm-2" style="width: 50px;" id="inputNationality" placeholder="Nationality"/>
                                    <label for="is_visa" class="sr-only">Visa</label>
                                        <select name="is_visa" id="inputVisa" class="custom-select mb-2 mr-sm-2" required>
                                            <option value="" selected>VISA</option>
                                            <option value="1">30 Days</option>
                                            <option value="0">N/A</option>
                                        </select>
                                    <label for="doePassport" class="sr-only">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" name="doe_passport" class="form-control datepicker" id="doePassport" placeholder="DOE Passport"/>
                                    </div>
                                    <button type="submit" class="btn btn-addnow mb-2 px-4">
                                        Add Now
                                    </button>
                                </form>
                            </div>
                            <div class="notes mt-3 pl-3 py-1">
                                <h2>Note</h2>
                                <p>You can only register people that already registered their account on this website</p>
                            </div>
                        </div>
                    </div>
                    <!-- Right Content -->
                    <div class="col-mg-4 pr-0">
                        <div class="card card-details card-right">
                            <h2 class="">INFORMATION</h2>
                            <table class="checkout-info">
                                <tr>
                                    <th>Member</th>
                                    <td class="text-right">{{$item->details->count()}}</td>
                                </tr>
                                <tr>
                                    <th>Additional Visa</th>
                                    <td class="text-right">${{ $item->additional_visa}}</td>
                                </tr>
                                <tr>
                                    <th>Trip Price</th>
                                    <td class="text-right">${{$item->travel_package->price}}/person</td>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <td class="text-right">${{$item->transaction_total}}</td>
                                </tr>
                                <tr>
                                    <th>Total Pay (Unique Code)</th>
                                    <td class="text-right">
                                        <span class="text-blue text-total">${{$item->transaction_total}}</span><span class="text-orange text-total">.{{mt_rand(0,99)}}</span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h2>PAYMENTS</h2>
                            <p>
                                Please complete the payment before 
                                <br>
                                you continue the trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{url('frontend/images/ic Money.png')}}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT REIHAN ID</h3>
                                        <p>
                                            Bank Central Asia
                                            <br>
                                            165 555 111
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{url('frontend/images/ic Money.png')}}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT REIHAN ID</h3>
                                        <p>
                                            Bank Central Asia
                                            <br>
                                            165 555 111
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{route('checkout-success', $item->id)}}" class="btn btn-block btn-joinnow">
                                JOIN THE TRIP
                            </a>
                        <div class="text-center mt-3 cancel-pay">
                            <a href="{{route('details', $item->travel_package->slug)}}" class="text-muted">
                                CANCEL PAYMENTS
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
    <script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker ({
                format :'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons : {
                    rightIcon : '<img src="{{url('frontend/images/ic_date.png')}}"/>'
                }
            }) ;
        }) ;
    </script>  
@endpush