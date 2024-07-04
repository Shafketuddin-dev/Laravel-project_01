@extends('frontend.master')
@section('title')
    Online Payment:: One Sky Communications Limited
@endsection
@section('content')
    <!-- online payment start -->
    <section class="single_page_top_section bg_rules"
        style="background:  url('{{ asset('frontendAssets') }}/static_images/page-title-bg.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb flat">
                        <a href="{{ route('/') }}"> {{ $menu->{app()->getLocale() . '_menu_home'} }} </a>
                        <a href="javascript:void(0)" class="active"> {{ $menu->{app()->getLocale() . '_menu_online_pay'} }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style type="text/css">
        .payment-form{
            width: 60%;
            margin: 0 auto;
            background-color: white;
            -webkit-box-shadow: -5px 1px 29px 0px rgba(224,215,224,1);
            -moz-box-shadow: -5px 1px 29px 0px rgba(224,215,224,1);
            box-shadow: -5px 1px 29px 0px rgba(224,215,224,1);
        }
        .payment-form form{
            padding: 20px;
        }
        .border-red{
            border: 1px solid #a94442 !important;
        }
        .text-red{
            color: #a94442 !important;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="payment-form mt-5">
                <br>
                <center><img src="{{ asset('frontendAssets/img/card.jpg') }}"/></center><br>

                <?php if( session()->has('error_msg') ){ ?>
                <div class="form-group" style="padding: 0px 15px">
                    <div class="alert alert-danger">{{ session()->get('error_msg') }}</div> 
                </div>
                <?php } ?>

                <?php if( session()->has('success_msg') ){ ?>
                <div class="form-group" style="padding: 0px 15px">
                    <div class="alert alert-success">{{ session()->get('success_msg') }}</div> 
                </div>
                <?php } ?>

                <center><h3>PAYMENT DETAILS</h3> <small class="text-red">All field(s) are required</small></center>
                
                <form method="POST" id="payment">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Full name" class="form-control @error('name') border-red @enderror" value="{{ old('name', $name ?? '') }}" required>
                        
                        @error('name')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" class="form-control @error('email') border-red @enderror" value="{{ old('email', $email ?? '') }}" required>
                        
                        @error('email')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="phone" placeholder="Phone Number" class="form-control @error('phone') border-red @enderror" value="{{ old('phone', $phone ?? '') }}" required>
                        
                        @error('phone')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="user_id" placeholder="User ID" class="form-control @error('user_id') border-red @enderror" value="{{ old('user_id', $user_id ?? '') }}" required>
                        
                        @error('user_id')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="number" name="amount" min="500" placeholder="Amount" class="form-control @error('amount') border-red @enderror" value="{{ old('amount', $amount ?? '') }}" required>
                        
                        @error('amount')
                            <small class="text-red">{{ $message }}</small>
                        @enderror
                    </div>

                  <center>
                    <button type="submit" name="payment" value="1" class="btn btn-success payment"><i class="fa fa-credit-card-alt"></i> Pay Now</button>
                  </center>

                  
                </form>
            </div>
        </div>
    </div>

    <!-- Terms Condition end -->
@endsection
