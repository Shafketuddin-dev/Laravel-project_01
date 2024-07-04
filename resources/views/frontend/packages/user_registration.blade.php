<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8">
    <title>OSCL - New Connection Registration Form</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<style type="text/css">
body {
       font-family: "Roboto", sans-serif;
}

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        max-width: 200px;
        max-height: 150px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .float-right {
        float: right;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
	<div class="logo text-center">
       <img src="{{ asset($image) }}" alt="">
    </div>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">New Connection Form</h1>
    </div>
        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                <tr>
                    <td>
                        <div class="box-text">
                        <p class="m-0 pt-5 text-bold">Registration Date : <span class="gray-color">{{ $userInfo->created_at->format('d F Y') }} </span></p>
                        <p class="m-0 pt-5 text-bold">Package Category: <span class="gray-color">{{ $userInfo->category }} </span></p>
                        <p class="m-0 pt-5 text-bold">Connection Type: 
                            <span class="gray-color">
                            @if ($userInfo->connection_type == '1')
                            Fiber Optics
                            @elseif ($userInfo->connection_type == '0')
                            UTP
                            @else
                            N/A
                            @endif
                            </span>
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="box-text">
                            <p class="m-0 pt-5 text-bold">User ID: <span class="gray-color">{{ $userInfo->username }} </span></p>
                            <p class="m-0 pt-5 text-bold">Password: <span class="gray-color">{{ $userInfo->ppoe_password }} </span></p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <td>
                    <div class="box-text">
                        <p>Name : {{ $userInfo->name }}</p>
                        <p>Phone : {{ $userInfo->phone }}</p>
                        <p>Email : {{ $userInfo->email ?? 'N/A'}}</p>
                        <p>NID / Birth Certificate / Passport No : {{ $userInfo->nid_number }}</p>
                        <p>Address : {{ $userInfo->address }}</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <img src="{{ asset($userInfo->photo) }}" alt="" style="max-height: 120px; width: 120px; float: right; margin-top: -61px;">
                    </div>
                </td>
            </tr>
        </table>
    </div>
        <div class="table-section bill-tbl w-100 mt-10">
            <table class="table w-100 mt-10">
                @if($userInfo->nid_have == 'yes')
                <tr>
                    <th class="w-50">NID Front Side</th>
                    <th class="w-50">NID Back Side</th>
                </tr>
                <tr>
                    <td>
                        <div class="box-text" style="margin-right: 10px;">
                            <img src="{{ asset($userInfo->nid_front) }}" alt="" style="height: 160px; width: 320px;">
                        </div>
                    </td>
                    <td>
                        <div class="box-text">
                            <img src="{{ asset($userInfo->nid_back) }}" alt="" style="height: 160px; width: 320px;">
                        </div>
                    </td>
                </tr>
                @else
                <tr>
                    <th class="w-100">Birth Certificate / Passport</th>
                </tr>
                <tr>
                    <td class="text-center">
                        <img src="{{ asset($userInfo->birth_certificate) }}" alt="" style="max-width: 400px; max-height: 280px;">
                    </td>
                </tr>
                @endif
            </table>
        </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Package Name</th>
                <th class="w-50">Bandwidth</th>
                <th class="w-50">Monthly Bill</th>
                <th class="w-50">OTC</th>
                <th class="w-50">Advance Bill</th>
            </tr>
            <tr align="center">
                <td> {{ $userInfo->en_package_name }} </td>
                <td> {{ $userInfo->en_mbps_value }} MBPS</td>
                <td> {{ $userInfo->en_amount }} TK</td>
                <td> {{ $userInfo->en_otc_amount }} TK</td>
                <td> {{ $userInfo->en_advance_bill_amount }} TK</td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <td colspan="7">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Sub Total</p>
                            <p>Discount on Running Bill</p>
                            <p>Running Month Bill</p>
                            <p>Total Payable</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>{{ $userInfo->subtotal ?? 0}} TK</p>
                            <p>{{ $userInfo->en_discount_monthly_fee ?? 0}} TK</p>
                            @php
                                $running_month_bill = $userInfo->en_amount - $userInfo->en_discount_monthly_fee;
                            @endphp
                                <p>{{ $running_month_bill ?? 0}} TK</p>
                            <p>{{ $userInfo->formattedTotal }} TK</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div style="position: fixed; bottom: 0px;">
        <p style="line-height: 20px;"><strong>Office Address:</strong> {{ $address }}</p>
    </div>
    <br>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <td style="font-size: 10px;">
                    <h3 class="text-center">Terms & Conditions</h3> 
                    {!! $tc->en_payment_mode !!}
                    {!! $tc->en_documentation !!}
                    {!! $tc->en_after_sales_service !!}
                    {!! $tc->en_client_responsibility !!}
                    {!! $tc->en_others !!}
                    {!! $tc->en_contact_termination !!}
                </td>
            </tr>
            <tr>
                <td style="font-size: 11px;"> <mark>*Terms & conditions approved by client, this is why doesn’t require any signature</mark> </td>
            </tr>
        </table>
    </div>
</html>