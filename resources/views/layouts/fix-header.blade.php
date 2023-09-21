
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .fab{
                font-size: 24px;
                padding: 7px 7px;
                color: #fff;
            }
            .fas{
                color:#333;
            }

    .socialLink{
                font-size: 10px !important;
                display: inline-block !important;
                padding: 0px !important;
                background: #333 !important;
                border-radius: 50% !important;
    }


    </style>


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5TX399K8');</script>
<!-- End Google Tag Manager -->

<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '677863144263844');
  fbq('track', 'PageView');
</script>
