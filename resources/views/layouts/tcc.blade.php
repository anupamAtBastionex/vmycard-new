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

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('landing/assets/css/style.css') }}">
      <!-- Stylesheets -->
      <!-- <link rel="stylesheet" href="./assets/css/docs.theme.min.css"> -->
      <!-- Owl Stylesheets -->
      <link rel="stylesheet" href="{{ asset('landing/assets/css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('landing/assets/css/owl.theme.default.min.css') }}">
      <script src="{{ asset('landing/assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('landing/assets/js/owl.carousel.js') }}"></script>

      @if ($setting['SITE_RTL'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif
    @if (isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">

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
                     <li><a href="#functions">Functions</a></li>
                     <li><a href="#">Pricing</a></li>
                     <li><a href="#contact">Contact</a></li>
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
            <div class="row">
               <div class="col-lg-12 col-md-12">

        <h2>1. Acceptance of Terms:</h2>
        <p>By accessing and using vmycards.com, you agree to comply with and be bound by these Terms and Conditions.</p>

        <h2>2. Use of the Website:</h2>
        <p>
        a. <strong>Eligibility:</strong> You must be at least 18 years old to use this Website.<br>
        b. <strong>User Account:</strong> You may need to create an account to access certain features. You are responsible for maintaining the confidentiality of your account information and are liable for all activities that occur under your account.
        </p>

        <h2>3. Intellectual Property:</h2>
        <p>
        a. <strong>Ownership:</strong> All content on the Website, including text, images, logos, and trademarks, is the property of vmycards.com and is protected by copyright and other intellectual property laws.<br>
        b. <strong>Limited License:</strong> You are granted a limited, non-exclusive, non-transferable license to access and use the content for personal, non-commercial purposes.
        </p>

        <h2>4. User Content:</h2>
        <p>
        a. <strong>Responsibility:</strong> You are responsible for any content you submit to the Website. You grant vmycards.com a non-exclusive, worldwide, royalty-free license to use, reproduce, modify, and distribute your content.<br>
        b. <strong>Prohibited Content:</strong> You may not submit content that is illegal, defamatory, obscene, or violates the rights of others.
        </p>

        <h2>5. Privacy Policy:</h2>
        <p>Your use of the Website is also governed by our <a href="https://vmycards.com/privacy-policy">Privacy Policy</a>, which outlines how we collect, use, and protect your information.</p>

        <h2>6. Limitation of Liability:</h2>
        <p>
        a. <strong>Disclaimer:</strong> The Website and its content are provided "as is" without any warranties, express or implied.<br>
        b. <strong>Limitation of Liability:</strong> vmycards.com shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of the Website.
        </p>

        <h2>7. Indemnification:</h2>
        <p>You agree to indemnify and hold vmycards.com, its employees, and affiliates harmless from any claims, liabilities, damages, losses, and expenses arising from your use of the Website or violation of these Terms.</p>

        <h2>8. Changes to Terms:</h2>
        <p>vmycards.com reserves the right to modify or update these Terms and Conditions at any time. Changes will be effective upon posting on the Website. Your continued use of the Website after changes constitutes acceptance of the updated Terms.</p>

        <h2>9. Governing Law and Jurisdiction:</h2>
        <p>These Terms are governed by and construed in accordance with the laws of [Your Jurisdiction]. Any disputes arising from these Terms shall be subject to the exclusive jurisdiction of the courts in [Your Jurisdiction].</p>

        <h2>10. Contact Information:</h2>
        <p>If you have any questions or concerns regarding these Terms and Conditions, you can contact us at <a href="mailto:info@metaspacechain.com">info@metaspacechain.com</a>.</p>

                  </div></div></div>

    </section>


<section>
<nav class="custom_navbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo footer_logo">
                    <h4><a href="{{ url('/') }}"><img src="{{ asset('landing/assets/img/logo-dark.png') }}"></a></h4>
                    </div>
                    <ul class="nav-links footer-nav-links ">
                    <li class="text-muted"></li>

                    <li class="text-muted">© {{ date('Y') }} &nbsp;{{ isset($langSetting['footer_text']) ? $langSetting['footer_text'] : 'Metaspace Technologies Private Limited | All Rights Reserved' }}
                        <br>
                        <span class="text-muted">
                        <a class="nav-link" href="{{ url('tc') }}"    style="font-size:12px; display:inline-block; padding:0px">
                                Term & Conditions
                            </a>
                        </span> &nbsp;&nbsp;
                        <span class="text-muted">
                        <a class="nav-link " href="{{ url('refund') }}"    style="font-size:12px; display:inline-block; padding:0px">
                                Refund & cancellation policy
                            </a>
                        </span>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

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

<!-- Modal -->
<div class="modal fade" id="t-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><h3>Terms and Conditions</h3></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <section class="tandcpage">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">

<div class="conatntwrap tc">

  <div>


<h2>1. Acceptance of Terms:</h2>
<p>By accessing and using vmycards.com, you agree to comply with and be bound by these Terms and Conditions.</p>

<h2>2. Use of the Website:</h2>
<p>
a. <strong>Eligibility:</strong> You must be at least 18 years old to use this Website.<br>
b. <strong>User Account:</strong> You may need to create an account to access certain features. You are responsible for maintaining the confidentiality of your account information and are liable for all activities that occur under your account.
</p>

<h2>3. Intellectual Property:</h2>
<p>
a. <strong>Ownership:</strong> All content on the Website, including text, images, logos, and trademarks, is the property of vmycards.com and is protected by copyright and other intellectual property laws.<br>
b. <strong>Limited License:</strong> You are granted a limited, non-exclusive, non-transferable license to access and use the content for personal, non-commercial purposes.
</p>

<h2>4. User Content:</h2>
<p>
a. <strong>Responsibility:</strong> You are responsible for any content you submit to the Website. You grant vmycards.com a non-exclusive, worldwide, royalty-free license to use, reproduce, modify, and distribute your content.<br>
b. <strong>Prohibited Content:</strong> You may not submit content that is illegal, defamatory, obscene, or violates the rights of others.
</p>

<h2>5. Privacy Policy:</h2>
<p>Your use of the Website is also governed by our <a href="https://vmycards.com/privacy-policy">Privacy Policy</a>, which outlines how we collect, use, and protect your information.</p>

<h2>6. Limitation of Liability:</h2>
<p>
a. <strong>Disclaimer:</strong> The Website and its content are provided "as is" without any warranties, express or implied.<br>
b. <strong>Limitation of Liability:</strong> vmycards.com shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of the Website.
</p>

<h2>7. Indemnification:</h2>
<p>You agree to indemnify and hold vmycards.com, its employees, and affiliates harmless from any claims, liabilities, damages, losses, and expenses arising from your use of the Website or violation of these Terms.</p>

<h2>8. Changes to Terms:</h2>
<p>vmycards.com reserves the right to modify or update these Terms and Conditions at any time. Changes will be effective upon posting on the Website. Your continued use of the Website after changes constitutes acceptance of the updated Terms.</p>

<h2>9. Governing Law and Jurisdiction:</h2>
<p>These Terms are governed by and construed in accordance with the laws of [Your Jurisdiction]. Any disputes arising from these Terms shall be subject to the exclusive jurisdiction of the courts in [Your Jurisdiction].</p>

<h2>10. Contact Information:</h2>
<p>If you have any questions or concerns regarding these Terms and Conditions, you can contact us at <a href="mailto:info@metaspacechain.com">info@metaspacechain.com</a>.</p>

    </div>
</div>
      </div>
    </div>
  </div>
</section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



</html>
@php
  exit();
@endphp
