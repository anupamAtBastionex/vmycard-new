@php
   // $logo=asset(Storage::url('uploads/logo'));
   $logo=\App\Models\Utility::get_file('uploads/logo/');
   $setting = App\Models\Utility::settings();
   $set_cookie = App\Models\Utility::cookie_settings();
   $langSetting=App\Models\Utility::langSetting();
@endphp
<!DOCTYPE html>
<html lang="en" dir="{{ $setting['SITE_RTL'] == 'on' ? 'rtl' : '' }}">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'vCardGo SaaS')}}</title>

      <link rel="icon" href="{{ $logo. '/favicon.png' }}" type="image/x-icon" />
      @include('layouts.fix-header')
      
<style type="text/css">
   .logo{
      max-width: 160px;
      width: 100%;
      height: 50px;
      padding: 0.33594rem 0;
   }
    .logo img {
       width: 100%;
       height: 100%;
       /* object-fit: scale-down; */
   }
   a.btn.theme-bg.try_theme_btn {
    background: #1363a9;
}
.blog{
    margin-bottom:50px;
}
.blog h2{
    font-size:1.25rem;
}

</style>

   </head>
   <body translate="no">
      <nav class="custom_navbar">
         <div class="first_side_vector">
            <img src="{{ asset('landing/assets/img/vector0.svg') }}" alt="vector0" class="img-fluid">
         </div>
         <div class="first_right_side_vector">
            <img src="{{ asset('landing/assets/img/vector.svg') }}" alt="vector" class="img-fluid">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="logo">
                     <!-- <h4>vCard<span>Go</span></h4> -->


                     <a href="{{ url('/') }}">
                     <img src="{{ asset('landing/assets/img/logo-dark.png') }}" alt=""
                              class="img-fluid" />
                  {{--   @if ($setting['cust_darklayout'] == 'on')
                        <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png').'?'.time() }}" alt=""
                              class="img-fluid" />
                     @else
                        <img src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png').'?'.time() }}" alt=""
                              class="img-fluid" />
                     @endif --}}
                  </a>
                  </div>
                  <ul class="nav-links">
                     <li><a href="{{ url('/') }}">Overview</a></li>
                     <li><a href="{{ url('/#functions') }}">Functions</a></li>
                     <li><a href="{{ url('/') }}">Pricing</a></li>
                     <li><a href="{{ url('/#contact') }}">Contact</a></li>
                     <li class="try-btn "><a href="{{ route('login') }}">{{__('Log in')}}</a></li>
                     @if(Utility::getValByName('signup_button') == 'on')
                     <li class="try-btn"><a href="{{ route('register') }}">{{__('Register')}}</a></li>
                     @endif
                  </ul>
                  <div class="burger">
                     <div class="line1"></div>
                     <div class="line2"></div>
                     <div class="line3"></div>
                  </div>
               </div>
            </div>
         </div>
      </nav>



<section class="blog">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 m-auto">
                <div class="blog-section">
                    <div class="blog-heading text-center">
                    <h3>
                    Frequently
                        <span>  Asked  Questions</span>
                    </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 pt-5">
            <ol class="faqui">
                <li>
                    <h4>What Is A Digital Business Card?</h4>
                    <p><b>Ans.-</b> It is a digital card for sending contact details electronically, replacing outdated visiting cards. It is a personalized, interactive digital card that simplifies networking for you. </p>
                </li>

                <li>
                    <h4>What Is A vMyCards Business Card?
                </h4>
                    <p><b>Ans.-</b> It is designed for professionals who attend meetings, tradeshows, or seminars to quickly share their business details without the hassle of manual sharing.</p>
                </li>
                <li>
                    <h4>Tell Us How vMyCards Works?
                </h4>
                    <p><b>Ans.-</b> You can start by taking a 30-day free trial that lets you create, design, and share the business information you want others to see with the help of powerful technologies like NFC.
                </p>
                </li>
                <li>
                    <h4>How Do I Share My Digital Business Card?
                </h4>
                    <p><b>Ans.-</b> Sharing your digital business card with vMyCards is simple; just tap your card on the back of a phone or access it through a QR code. But first, you need to sign up and create an account with us.
                </p>
                </li>
                <li>
                    <h4> How Many Digital Business Cards Can I Create?
                </h4>
                    <p><b>Ans.-</b> With vMyCards, you can create as many digital business cards as you need to suit various networking and business situations.
                </p>
                </li>
                <li>
                    <h4>Will My Digital Business Card Be Mobile Friendly?
                </h4>
                    <p><b>Ans.-</b> Yes, vMyCards ensures your digital business card is mobile-friendly, making it accessible and user-friendly on smartphones.</p>
                </li>
                <li>
                    <h4> Does vMyCards Require A Subscription?
                </h4>
                    <p><b>Ans.-</b> vMyCards offers unparalleled deals on pricing at a mere 30 Rupees per month! If this isn't convincing enough, you get the card for free. </p>
                </li>
                </ul>

                </div>
            </div>
    </div>

</section>
<section>
@include('layouts.fix-footer')
</section>

      <script
         src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
      <script id="rendered-js">
         const navSlide = () => {
           const burger = document.querySelector('.burger');
           const body = document.querySelector('body');
           const nav = document.querySelector('.nav-links');
           const navLinks = document.querySelectorAll('.nav-links li');

           //Toggle Nav v
           burger.addEventListener('click', () => {
             nav.classList.toggle('nav-active');

             //Animate Links
             navLinks.forEach((link, index) => {
               if (link.style.animation) {
                 link.style.animation = '';
               } else {
                 link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;

               }
             });

             //burger animation
             burger.classList.toggle('toggle');
             body.classList.toggle('scroll-hidden');


           });
         };

         navSlide();
         //# sourceURL=pen.js
      </script>
   </body>
   @if($set_cookie['enable_cookie'] == 'on')
   @include('layouts.cookie_consent')
   @endif
</html>
@php
  exit();
@endphp
