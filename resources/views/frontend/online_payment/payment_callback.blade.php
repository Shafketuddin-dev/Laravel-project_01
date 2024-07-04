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
        .callback{
            padding: 80px 20px;
            margin: 0 auto;
        }
        .callback .fa{
            font-size: 100px;
        }
        .text-red{
            color: red;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="payment-form mt-5">
                <div class="callback">
                    <center>
                        <?php if($type == 'success'){ ?>
                            <i class="fa fa-check-circle text-success mb-4"></i>                     
                            <h2><?php echo $message; ?></h2>
                        <?php } ?>

                        <?php if($type == 'error'){ ?>
                            <i class="fa fa-times-circle text-warning mb-4"></i>                       
                            <h2><?php echo $message; ?></h2>
                        <?php } ?>          
                    </center>
                </div>
            </div>
        </div>
    </div>




    <!-- Terms Condition end -->
@endsection
