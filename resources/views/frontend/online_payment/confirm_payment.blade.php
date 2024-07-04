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

                <center><h3>PAYMENT DETAILS</h3></center>
                <form action='' method="POST" id="payment">
                    @csrf
                    <div class="panel panel-default">
                        <table class="table w-100 mt-4">
                            <tr>
                                <td>Name</td>
                                <td><?php echo $name; ?></td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><?php echo $email; ?></td>
                            </tr>


                            <tr>
                                <td>Phone Number</td>
                                <td><?php echo $phone; ?></td>
                            </tr>

                            <tr>
                                <td>User Id</td>
                                <td><?php echo $user_id; ?></td>
                            </tr>

                            <tr>
                                <td>Amount</td>
                                <td><?php echo $amount; ?></td>
                            </tr>
                        </table>
                    </div>

                    <center class="mt-5">
                        <button type="submit" name="cancel" value="1" class="btn btn-danger payment"><i class="fa fa-ban"></i> Cancel</button>
                        <a href="{{ route('online_payment', ['edit' => 'yes']) }}" class="btn btn-info"><i class="fa fa-edit"></i> Back to edit</a>
                        <button type="submit" name="confirm" value="1" class="btn btn-success payment"><i class="fa fa-credit-card-alt"></i>Confirm Pay Now</button>
                    </center>
                </form>
            </div>
        </div>
    </div>




    <!-- online payment end -->
@endsection
