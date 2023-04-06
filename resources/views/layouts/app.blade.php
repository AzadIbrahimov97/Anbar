<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Anbar</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="{{url('css/main.css?v=1628755089081')}}">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
<body>

<div id="app">

<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
    <div class="navbar-item">
      <div class="control">
        <form method="get" action="@yield('axtar')#cedvel">
          <input placeholder="{{ __('messages.axtar') }}..." name="sorgu" class="input">
        </form>
      </div>
    </div>
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <select class="changeLang">
  <option value="az" {{session()->get('locale')=='az' ? 'selected' : ''}}>AZ</option>
  <option value="en" {{session()->get('locale')=='en' ? 'selected' : ''}}>EN</option>
</select>
</nav>


<!--------MENU START------->
<aside class="aside is-placed-left is-expanded">
  <div class="menu is-menu-main">
    <p class="menu-label">{{ __('messages.anbar') }}</p>
    <ul class="menu-list">
      
      <li class="--set-active-tables-html">
        <a href="{{route('brands')}}">
          <span class="icon"><i class="mdi mdi-tag-multiple"></i></span>
          <span class="menu-item-label">{{ __('messages.brandss') }}</span>
        </a>
      </li>
      <li class="--set-active-tables-html">
        <a href="{{route('clients')}}">
          <span class="icon"><i class="mdi mdi-human-male-male"></i></span>
          <span class="menu-item-label">{{ __('messages.clients') }}</span>
        </a>
      </li>
      <li class="--set-active-tables-html">
        <a href="{{route('products')}}">
          <span class="icon"><i class="mdi mdi-dolly"></i></span>
          <span class="menu-item-label">{{ __('messages.mehsul') }}</span>
        </a>
      </li>
      <li class="--set-active-tables-html">
        <a href="{{route('staff')}}">
          <span class="icon"><i class="mdi mdi-hail"></i></span>
          <span class="menu-item-label">{{ __('messages.isci') }}</span>
        </a>
      </li>
      <li class="--set-active-tables-html">
        <a href="{{route('departments')}}">
          <span class="icon"><i class="mdi mdi-clipboard-text-multiple"></i></span>
          <span class="menu-item-label">{{ __('messages.sobeler') }}</span>
        </a>
      </li>
      <li class="--set-active-tables-html">
        <a href="{{route('xerc')}}">
          <span class="icon"><i class="mdi mdi-cash"></i></span>
          <span class="menu-item-label">{{ __('messages.xercler') }}</span>
        </a>
      </li>
      <li class="--set-active-forms-html">
        <a href="{{route('orders')}}">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">{{ __('messages.orderss') }}</span>
        </a>
      </li>
      <li class="--set-active-profile-html">
        <a href="{{route('profil')}}">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">{{ __('messages.profil') }}</span>
        </a>
      </li>

      <li class="--set-active-tables-html">
        <a href="{{route('logout')}}">
          <span class="icon"><i class="mdi mdi-power"></i></span>
          <span class="menu-item-label">{{ __('messages.cixis') }}</span>
        </a>
      </li>
      <li>
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">{{ __('messages.haqqinda') }}</span>
          <span class="icon"><i class="mdi mdi-plus"></i></span>
        </a>
        <ul>
          <li>
            <a href="#void"></a>
              <span>{{ __('messages.rey') }}
          </li>
        </ul>
      </li>
   
  </div>
</aside>

<!---<a href="{{route('brands')}}">Brands</a><br>
<a href="{{route('clients')}}">Clients</a><br>
<a href="{{route('products')}}">Products</a><br>
<a href="{{route('staff')}}">Staff</a><br>
<a href="{{route('xerc')}}">Xerc</a><br>
<a href="{{route('orders')}}">Orders</a><br>---->
    @yield('content')

<!--CEDVEL START-->

<!---------------Footer------------>
<footer class="footer">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
    <div class="flex items-center justify-start space-x-3">
      <div>
        © 2023
      </div>

      <div>
        <p>Proggammed By: <a href="https:www.bestcinema.space" target="_blank"><b>Azad Ibrahimov</b></a></p>
      </div>
      <a href="https://github.com/justboil/admin-one-tailwind" style="height: 20px">
        <img src="https://img.shields.io/github/v/release/justboil/admin-one-tailwind?color=%23999">
      </a>
    </div>
  </div>
</footer>




</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="js/chart.sample.min.js"></script>


<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
</script>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->


</body>
</html>
<script>
  Let url = "{{route('changeLang')}}"
  $('.changeLang').change(function(){
    window.location.href = url + "?lang=" +$(this).val()
  })
  </script>
<script>
  let url = "{{route('changeLang')}}"
  $('.changeLang').change(function(){
    window.location.href = url + "?lang=" + $(this).val()
  })
</script>
