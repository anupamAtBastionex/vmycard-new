@extends('layouts.auth')
@section('content')
@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
@endphp
<div class="w-100">
            <div class="row justify-content-between align-item-center">
              <div class="col-sm-8 col-lg-4">
                <div class="row justify-content-center mb-3">
                   
                </div>
                <div class="card shadow zindex-100 mb-0">
                  <div class="card-body px-md-5 py-5">
                      <h4 class="text-primary font-weight-normal mb-1"><strong>{{__('Reset Password')}}</strong></h4>
                      <form action="{{ route('password.update') }}" method="POST" class="pt-3 text-left needs-validation" novalidate="">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token')}}">
                        <label class="d-block position-relative mb-3">
                          <p class="text-sm mb-2">{{ __('E-Mail Address') }}</p>
                          <input type="email" id="email" name="email"  class="text-sm rounded-6 w-100 form-control py-3 px-3 border text-grayDark @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autofocus>
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                          @enderror
                        </label>
                        <label class="d-block position-relative mb-3">
                          <p class="text-sm mb-2">{{ __('Password') }}</p>
                          <input type="password" id="password" name="password"  class="text-sm rounded-6 w-100 form-control py-3 px-3 border text-grayDark @error('password') is-invalid @enderror" required autocomplete="new-password">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                          @enderror
                        </label>
                        <label class="d-block position-relative mb-3">
                          <p class="text-sm mb-2">{{ __('Confirm Password') }}</p>
                          <input type="password" id="password" name="password_confirmation"  class="text-sm rounded-6 w-100 form-control py-3 px-3 border text-grayDark @error('password') is-invalid @enderror" required autocomplete="new-password">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                          @enderror
                        </label>            
                        <button type="submit" class="btn btn-primary px-4 py-2 text-xs"><span class="d-block py-1">{{ __('Reset Password') }}</span></button>
                      </form>
                    </div>
                </div>
                
            </div>
            <div class="col-sm-8 col-lg-4 img-card-side">
                <div class="auth-img-content">
                    <img src="{{ asset('assets/images/auth/img-auth-3.svg') }}" alt="" class="img-fluid">
                    <h3 class="text-white mb-4 mt-5"> {{ __('“Attention is the new currency”') }}</h3>
                    <p class="text-white">
                        {{ __('The more effortless the writing looks, the more effort the writer
                                                    actually put into the process.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>                  
@endsection

