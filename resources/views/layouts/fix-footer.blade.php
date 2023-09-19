<nav class="custom_navbar  pb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="pull-left " style="display:inline-block; width:50%">
                         <h4><a href="{{ url('/') }}"><img src="{{ asset('landing/assets/img/logo-dark.png') }}"></a></h4>

                    <i class="fas fa-home" ></i>&nbsp;&nbsp; B-2, Sector-4, Noida, Gautam Buddh Nagar, Uttar Pradesh, India, 201301
                    <br> <i class="fas fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp; contact@metaspacechain.com
                    </div>


                    <ul class="nav-links footer-nav-links " style="width:50%">
                    <li class="text-muted"></li>

                    <li class="text-muted">© {{ date('Y') }} &nbsp;{{ isset($langSetting['footer_text']) ? $langSetting['footer_text'] : 'Metaspace Technologies Private Limited | All Rights Reserved' }}
                        <br>
                        <span class="text-muted">
                        <a class="nav-link" href="{{ url('tc') }}"    style="font-size:12px; display:inline-block; padding:0px">
                                Term & Conditions
                            </a>
                        </span>
                        <span class="text-muted">
                        <a class="nav-link " href="{{ url('refund') }}"    style="font-size:12px; display:inline-block; padding:10px">
                                Refund & cancellation policy
                            </a>
                        </span>
                        <span class="text-muted">
                        <a class="nav-link " href="{{ url('privacy-policy') }}"    style="font-size:12px; display:inline-block; padding:0px; padding-right:10px">
                                Privacy Policy
                            </a>
                        </span>
                        <span class="text-muted">
                        <a class="nav-link " href="{{ url('faqs') }}"    style="font-size:12px; display:inline-block; padding:0px">
                                Faqs
                            </a>
                        </span>
                        <br>
                        <style>
                          ul.socil-link a {
                                                padding: 0px 11px!IMPORTANT;
                                            }
                        </style>
                        <div class="text-left">
                        <ul class="socil-link">
                                <li class="t"><a href=""><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li class="f"><a href=""><i class="fa-brands fa-facebook-f f"></i></a></li>
                                <li class="y"> <a href=""><i class="fa-brands fa-youtube y"></i></a></li>
                                <li class="i"><a href=""><i class="fa-brands fa-instagram i"></i></a></li>
                                <li class="w"><a href=""><i class="fa-brands fa-linkedin "></i></a></li>
                            </ul>
                            <!-- <a href="" target="_blank"  class="socialLink"> <i class="fab fa-facebook" aria-hidden="true"></i> </a>&nbsp;
                            <a href="" target="_blank"  class="socialLink"> <i class="fab fa-linkedin" aria-hidden="true"></i> </a> &nbsp;
                            <a href="" target="_blank"  class="socialLink"> <i class="fab fa-instagram" aria-hidden="true"></i> </a> &nbsp; -->
                        </div>
                    </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>


<style>


    ul.socil-link {
    display: flex;
    justify-content: end;
}
ul.socil-link li {
    margin: 0px 7px;
}
</style>
    <footer class="d-none">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
            <a href="{{ url('/') }}"><img src="{{ asset('landing/assets/img/logo-dark.png') }}"></a>
            </div>

            <div class="col-12 col-lg-4">


            <ul>
<li> <i class="fas fa-home" ></i> B-2, Sector-4, Noida, Gautam Buddh Nagar, Uttar Pradesh, India, 201301</li>
<li><i class="fas fa-envelope" aria-hidden="true"></i>  contact@metaspacechain.com</li>
</ul>

            <ul class="socil-link">
                                <li class="t"><a href=""><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li class="f"><a href=""><i class="fa-brands fa-facebook-f f"></i></a></li>
                                <li class="y"> <a href=""><i class="fa-brands fa-youtube y"></i></a></li>
                                <li class="i"><a href=""><i class="fa-brands fa-instagram i"></i></a></li>
                                <li class="w"><a href=""><i class="fa-brands fa-linkedin "></i></a></li>
                            </ul>

            </div>



        </div>
    </div>

<div class="container">
    <div class="row">
    <p class="text-muted text-center">© {{ date('Y') }} &nbsp;{{ isset($langSetting['footer_text']) ? $langSetting['footer_text'] : 'Metaspace Technologies Private Limited | All Rights Reserved' }}</p>
    </div>
</div>

    </footer>
