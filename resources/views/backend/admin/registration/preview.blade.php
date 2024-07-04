@extends('backend.master')
@section('title')
Admin :: Preview Online Registration
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(Auth::user()->role == '2')
        <a class="btn btn-sm btn-success" href="{{ route('manage_buy_package') }}">Manage Online Registration</a>
        @else
        <a class="btn btn-sm btn-success" href="{{ url('/dashboard') }}">Go to Dashboard</a>
        @endif
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="">Online Package Registration - {{ $registration_details->name }}</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>Issued / Modified by</td>
                            @if($registration_details->admin_id)
                            <td> {{ $registration_details->admin->name }}</td>
                            @else
                            <td> {{ $registration_details->name }} (Client)</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Marketing Person</td>
                            <td>{{$registration_details->marketing_person_name  }}</td>
                        </tr>
                        <tr>
                            <td>Registration Date</td>
                            <td> {{ $registration_details->created_at->format('d F Y'); }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td> {{ $registration_details->category }}</td>
                        </tr>
                        <tr>
                            <td>Package Name</td>
                            <td> {{ $registration_details->en_package_name }}</td>
                        </tr>
                        <tr>
                            <td>Bandwidth</td>
                            <td>{{ $registration_details->en_mbps_value }} MBPS</td>
                        </tr>
                        <tr>
                            <td>Monthly Fee</td>
                            <td>{{ $registration_details->en_amount }} TK</td>
                        </tr>
                        <tr>
                            <td>OTC</td>
                            <td>{{ $registration_details->en_otc_amount ?? 0}} TK</td>
                        </tr>
                        <tr>
                            <td>Advance Bill</td>
                            <td>{{ $registration_details->en_advance_bill_amount ?? 0}} TK</td>
                        </tr>
                        <tr>
                            <td class="bg-warning">Sub Total Amount</td>
                            <td class="bg-warning">{{$registration_details->subtotal ?? 0}} TK</td>
                        </tr>
                        <tr>
                            <td>Discount Monthly Fee</td>
                            <td>{{ $registration_details->en_discount_monthly_fee ?? 0}} Tk</td>
                        </tr>
                        <tr>
                            <td class="bg-success text-white fw-bold">Total Amount</td>
                            <td class="bg-success text-white fw-bold">{{$registration_details->formattedTotal ?? 0}} TK</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $registration_details->name }}</td>
                        </tr>
                        <tr>
                            <td>User ID</td>
                            <td>{{ $registration_details->username }}</td>
                        </tr>
                        <tr>
                            <td>PPOE Password</td>
                            <td>{{ $registration_details->ppoe_password }}</td>
                        </tr>
                        <tr>
                            <td>Connection Type</td>
                            @if ($registration_details->connection_type == '1')
                            <td>Fiber Optics</td>
                            @elseif ($registration_details->connection_type == '0')
                            <td>UTP</td>
                            @else
                            <td>Nothing Selected</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $registration_details->phone }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $registration_details->email }}</td>
                        </tr>
                        <tr>
                            <td>NID / Birth Certificate / Passport Number</td>
                            <td>{{ $registration_details->nid_number }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $registration_details->address }}</td>
                        </tr>
                        <tr>
                            <td>Remarks</td>
                            <td>{{ $registration_details->remarks }}</td>
                        </tr>
                        <tr>
                            <td>Photo</td>
                            <td> <img src="{{asset($registration_details->photo)}}" alt="" style="max-height: 150px"> </td>
                        </tr>
                        @if($registration_details->nid_have == 'yes')
                        <tr>
                            <td>NID Front Side</td>
                            <td> <img src="{{asset($registration_details->nid_front)}}" alt="" style="max-width: 300px"> </td>
                        </tr>
                        <tr>
                            <td>NID Back Side</td>
                            <td> <img src="{{asset($registration_details->nid_back)}}" alt="" style="max-width: 300px"> </td>
                        </tr>
                        @else
                        <tr>
                            <td>Birth Certificate</td>
                            <td> <img src="{{asset($registration_details->birth_certificate)}}" alt="" style="max-width: 300px"> </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection