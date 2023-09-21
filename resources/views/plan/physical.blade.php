@extends('layouts.admin')
@php
    $dir = asset(Storage::url('uploads/plan'));
    $qr_path = \App\Models\Utility::get_file('qrcode');
    $SER=env('APP_URL');   //$_SERVER['HTTP_ORIGIN'];
@endphp
@section('page-title')
    {{ __('Plans') }}
@endsection

@section('title')
    Physical Card
@endsection
@section('action-btn')
    @can('create plan')
        <div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center justify-content-between justify-content-md-end"
            data-bs-placement="top">
            @if (App\Models\Utility::getPaymentIsOn() && \Auth::user()->type == 'super admin')
                <a href="#" data-size="lg" data-url="{{ route('plans.create') }}" data-ajax-popup="true"
                    data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create New Plan') }}"
                    class="btn btn-sm btn-primary">
                    <i class="ti ti-plus"></i>
                </a>
            @endif
        </div>
    @endcan
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Physical Card</li>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


@push('custom-scripts')
        <script src="{{ asset('custom/js/purpose.js') }}"></script>
        @if (isset($plan->enable_qr_code) && $plan->enable_qr_code == 'on')
            <script src="{{ asset('custom/js/jquery.qrcode.min.js') }}"></script>
        @else
            <script src="{{ asset('custom/js/jquery.qrcode.js') }}"></script>
            <script type="text/javascript" src="https://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
        @endif
@endpush

@push('css-page')
    <style>
        .shareqrcode img {
            width: 65%;
            height: 65%;
            padding: 10px 10px;
        }
        .shareqrcode canvas {
            width: 65%;
            height: 65%;
            padding: 10px 10px;
        }


        .postion-r {
    position: relative;
    background-size: cover;
    width: 500px;
    height: 295px;
}
 

.info {
    padding: 0px;
    list-style: none;
}

.pos-a {
    position: absolute;
    display: inline-block;
    font-weight: 600;
    font-size: 14px;
    color:#fff;
}
.img-logo {
    left: 0px;
    right: 0px;
    text-align: 0px;
    top: 0px;
    bottom: 0px;
    width: 188px;
    position: absolute;
    transform: translate(-4px, 123px);
}


.email {
    bottom: 78px;
    left: 37px;
}

.call {
    bottom: 32px;
    left: 37px;
}

.address {
    bottom: 32px;
    left: 300px;
}
.url {
    bottom: 78px;
    left: 300px;
}

.caption-front img {
    width: 197px;
    height: auto;
}
li.name-crdowner {
    font-weight: bold;
    font-size: 24px;
    position: absolute;
    top: 28px;
    color:#fff;
    left: 18px;
}
li.degnition {
    font-weight: bold;
    color:#fff;
    position: absolute;
    top: 134px;
    left: 83px;
}

li.name-crdowner {
    font-weight: bold;
    font-size: 23px;
    position: absolute;
    top: 105px;
    color: #000;
    left: 58px;
    color: #fff;
}
li.qrcode {
    position: absolute;
    right: 77px;
    top: 82px;
}
li.qrcode img {
    width: 100px !IMPORTANT;
    height: 100px;
}


.flip-card {
    background-color: transparent;
    width: 626px;
    height: 325px;
    /* perspective: 1000px; */
    /* margin: 0px; */
    margin: auto;
    /* background: #ccc; */
    padding: 10px;
    border: 2px dashed #ccc;
    border-radius: 15px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
  background-image: url("{{ $SER }}/assets/card-images/1FrontBlank.png");
  display: flex;
    justify-content: center;
    align-items: center;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
  background-image: url("{{ $SER }}/assets/card-images/1BackBlank.png");
}

.card-display{
    width: 626px;
    height: 325px;
}
img.spingif {
    position: absolute;
    z-index: 1;
    top: 114px;
    margin: auto;
    left: 0px;
    right: 0px;
}
    </style>
@endpush
@section('content')
 <div class=" row justify-content-center">
    <div class="col-12 col-lg-5">
    <img src="{{ $SER }}/assets/card-images/loader3.gif" class="spingif d-none " />
        <div class="card-display">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="{{ $logo_white }}" width="150px" >
                            </div>
                            <div class="flip-card-back">
                                <ul class="info">
                                    <li class="qrcode">  <div class="shareqrcode">-</div> </li>
                                    <li class="name-crdowner" style="color:#fff">{{ $title }}</li>
                                    <li class="degnition">{{ $designation }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
         <style>
.ot {
    overflow-y: hidden !IMPORTANT;
    overflow-x: scroll !IMPORTANT;
}
.w-maxhere {
    display: flex;
    padding: 10px 0px;
}
.ot::-webkit-scrollbar {
    height: 15px;
}
.ot::-webkit-scrollbar-thumb {
    background: pink;
    border-radius: calc(15px / 2);
}

.flip-box-m, .flip-box-m img {
    height: 150px;
    width: 200px !important;
    margin: 20px !important;
}

.ot .custom-control-input{ display: none}
input[type="radio"]:checked + label img {
    border-radius: 14px;
    box-shadow: 5px 4px 15px rgba(22, 44, 78, 0.25);
    border-color: #162C4E;
    padding: 5px;
}


input[type="radio"]:checked + label img {
    border-radius: 14px;
    box-shadow: 5px 4px 15px rgba(22, 44, 78, 0.25);
    border-color: #162C4E;
    padding: 5px;
    border: 2px solid #008ecc;
}
</style>
<hr/>
         <div class="row justify-content-center  d-flex flex-row flex-nowrap overflow-auto ot mt-5">
         @php $jj=""; @endphp
                @foreach (range(1, 4) as $key=>$value)
                    @if($value==1)
                        @php $jj="checked"; @endphp
                    @else
                @php $jj=""; @endphp
            @endif
         <div class="col-12 col-lg-3">
    <div class=" ">
        <input type="radio" {{ $jj }} class="custom-control-input  card_design_id_{{ $value }}" value="{{ $value }}"
            id="ck2{{ $value }}" name="card_design_id">
        <label class="Dcng_phy_card L136" id="vvn_{{$key}}" data-card_design_id="{{ $value }}" for="ck2{{ $value }}">
            <img src="{{ asset('assets/card-images/' . $value . 'FrontBlank.png') }}" alt=""
                data-card_design_id="{{ $value }}" class="img-fluid">
        </label>
    </div>
</div>
@endforeach
</div>
         <script>
            // generate_qr();

            function seAutoTemplate(desid, vcid, vid) {
                $('.spingif').removeClass('d-none');
                $('.flip-card').addClass('d-none');
            var currentURL = window.location.href;
            var url = new URL(currentURL);
            var baseUrl2 = url.protocol + '//' + url.host;
            $.ajax({
                url: '/get_dyn_phycard', // Laravel route URL
                type: 'POST',
                data: { card_design_id: desid, rdo_vcard_id: vcid },
                success: function (response) {
                    $('.spingif').addClass('d-none');
                    $('.flip-card').removeClass('d-none');
                   $('.card-display').html(response.html);
                },
                error: function (error) {
                console.log('Error:', error);
                }
            });
            }
            $(".Dcng_phy_card").click(function(){
                var rdo_vcard_id = 1; //document.querySelector('input[name="rdo_vcard_id"]:checked');
                var card_design_id_val = $(this).attr('data-card_design_id');
                seAutoTemplate(card_design_id_val, rdo_vcard_id.value, 0);
            });



            $(document).ready(function() {
                @if ($businessData)
                    var slug = '{{ $businessData->slug }}';
                    var url_link = `{{ url('/') }}/${slug}`;

                    $(`.qr-link`).text(url_link);
                    @if (isset($plan->enable_qr_code) && $plan->enable_qr_code == 'on')
                        var foreground_color =
                            `{{ isset($qr_detail->foreground_color) ? $qr_detail->foreground_color : '#000000' }}`;
                        var background_color =
                            `{{ isset($qr_detail->background_color) ? $qr_detail->background_color : '#ffffff' }}`;
                        var radius = `{{ isset($qr_detail->radius) ? $qr_detail->radius : 26 }}`;
                        var qr_type = `{{ isset($qr_detail->qr_type) ? $qr_detail->qr_type : 0 }}`;
                        var qr_font = `{{ isset($qr_detail->qr_text) ? $qr_detail->qr_text : 'vCard' }}`;
                        var qr_font_color =
                            `{{ isset($qr_detail->qr_text_color) ? $qr_detail->qr_text_color : '#f50a0a' }}`;
                        var size = `{{ isset($qr_detail->size) ? $qr_detail->size : 9 }}`;

                        $('.shareqrcode').empty().qrcode({
                            render: 'image',
                            size: 500,
                            ecLevel: 'H',
                            minVersion: 3,
                            quiet: 1,
                            text: url_link,
                            fill: foreground_color,
                            background: background_color,
                            radius: .01 * parseInt(radius, 10),
                            mode: parseInt(qr_type, 10),
                            label: qr_font,
                            fontcolor: qr_font_color,
                            image: $("#image-buffers")[0],
                            mSize: .01 * parseInt(size, 10)
                        });
                    @else
                        $('.shareqrcode').qrcode(url_link);
                    @endif
                @endif
            });
         </script>
         @endsection