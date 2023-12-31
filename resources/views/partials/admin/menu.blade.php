@php
    $users = \Auth::user();
    $profile = \App\Models\Utility::get_file('uploads/avatar');
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_logo = Utility::getValByName('company_logo');
    $company_small_logo = Utility::getValByName('company_small_logo');
    $currantLang = $users->currentLanguage();
    $fullLang = \App\Models\Languages::where('code', $currantLang)->first();
    $languages = Utility::languages();
    
    $businesses = App\Models\Business::allBusiness();
    $currantBusiness = $users->currentBusiness();
    //$bussiness_id = !empty($users->current_business)?$users->current_business:'';
    $bussiness_id = $users->current_business;
@endphp

<!-- [ Header ] start -->
@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <header class="dash-header transprent-bg">
    @else
        <header class="dash-header">
@endif

<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        <ul class="list-unstyled">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="theme-avtar avatar avatar-sm rounded-circle">
                        <img
                            src="{{ !empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . '/avatar.png' }}" /></span>
                    <span class="hide-mob ms-2">{{ __('Hi') }}, {{ \Auth::user()->name }}</span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown">
                    <a href="{{ route('profile') }}" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span>{{ __('Profile') }}</span>
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i class="ti ti-power"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
    @if (Auth::user()->type != 'super admin')
        @can('create business')
            <div class="d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top">
                <a href="#" data-size="xl" data-url="{{ route('business.create') }}" data-ajax-popup="true"
                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-original-title="{{ __('Create your new bussiness') }}"
                    data-title="{{ __('Create New Business') }}"
                    class="btn cust-btn-creat  d-inline-flex align-items-center rounded  shadow-sm border border-success ">
                    <i class="ti ti-plus me-2"></i>
                    <span class="hide-mob">{{ __('Create Bussiness') }}</span>
                </a>
            </div>
        @endcan
        {{-- //business Display Start --}}
        <ul class="list-unstyled">
            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle arrow-none me-0 cust-btn shadow-sm border border-success"
                    data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"
                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-original-title="{{ __('Select your bussiness') }}">
                    <i class="ti ti-credit-card"></i>
                    <span class="drp-text hide-mob">{{ __(ucfirst($currantBusiness)) }}</span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    @foreach ($businesses as $key => $business)
                        <a href="{{ route('business.change', $key) }}" class="dropdown-item">
                            <i
                                class="@if ($bussiness_id == $key) ti ti-checks text-primary @elseif($currantBusiness == $business) ti ti-checks text-primary @endif "></i>
                            <span>{{ ucfirst($business) }}</span>
                        </a>
                    @endforeach
                    <div class="dropdown-divider m-0"></div>
                </div>
            </li>
        </ul>

        {{-- //business Display End --}}
    @endif
    <ul class="list-unstyled">
        <li class="dropdown dash-h-item drp-language">
            <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <i class="ti ti-world nocolor"></i>
                <span class="drp-text hide-mob">{{ ucFirst($fullLang->fullName) }}</span>
                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
            </a>
            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                @foreach (App\Models\Utility::languages() as $code => $lang)
                    <a href="{{ route('change.language', $code) }}"
                        class="dropdown-item {{ $currantLang == $code ? 'text-primary' : '' }}">
                        <span>{{ ucFirst($lang) }}</span>
                    </a>
                @endforeach
                <div class="dropdown-divider m-0"></div>
                @if (Auth::user()->type == 'super admin')
                    <a href="#" data-size="md" data-url="{{ route('create.language') }}" data-ajax-popup="true"
                        data-bs-toggle="tooltip" title="{{ __('Create') }}"
                        data-title="{{ __('Create New Language') }}" class="dropdown-item text-primary">
                        {{ __('Create Language') }}
                    </a>
                @endif
                @if (Auth::user()->type == 'super admin')
                    <a class="dropdown-item text-primary"
                        href="{{ route('manage.language', [$currantLang]) }}">{{ __('Manage Language') }}</a>
                @endif
            </div>
        </li>
    </ul>
</div>
</header>
<!-- [ Header ] end -->
