@extends('layouts.app')
@section('content')


@if(session('mesaj1')) 
    <div class="notification green"> 
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0"> 
            <div> 
              <span class="icon"><i class="mdi mdi-account-edit"></i></span> 
              <b>{{session('mesaj1')}}</b> 
            </div> 
            <button type="button" class="button small textual --jb-notification-dismiss">{{ __('messages.bagla') }}</button> 
          </div> 
        </div> 
    @endif 
    @if(session('mesaj2')) 
    <div class="notification red"> 
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0"> 
            <div> 
              <span class="icon"><i class="mdi mdi-alert"></i></span> 
              <b>{{session('mesaj2')}}  </b> 
            </div> 
            <button type="button" class="button small textual --jb-notification-dismiss">{{ __('messages.bagla') }}</button> 
          </div> 
        </div> 
    @endif 
    @if(session('mesaj3')) 
    <div class="notification blue"> 
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0"> 
            <div> 
              <span class="icon"><i class="mdi mdi-hand-okay"></i></span> 
              <b>{{session('mesaj3')}}</b> 
            </div> 
            <button type="button" class="button small textual --jb-notification-dismiss">{{ __('messages.bagla') }}</button> 
          </div> 
        </div> 
    @endif

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
    {{ __('messages.profil') }}
    </h1>
  </div>
</section>

  <section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            {{ __('messages.editprofil') }}
          </p>
        </header>
        <div class="card-content">
        <form method="post" action="{{route('Prupdate')}}" enctype="multipart/form-data">
              @csrf
            <div class="field">
              <label class="label"> {{ __('messages.profilfoto') }}</label>
              <div class="field-body">
                <div class="field file">
                  <label class="upload control">
                    <a class="button blue">
                    {{ __('messages.logoyukle') }}
                    </a>
                    <input type="file" name="Ufoto">
                  </label>
                </div>
              </div>
            </div>
            <hr>
            <div class="field">
              <label class="label"> {{ __('messages.ad') }}</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="text" autocomplete="on" name="ad" value="{{Auth::user()->ad}}" class="input" required="">
                  </div>
                  <p class="help">{{ __('messages.adreq') }}</p>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label"> {{ __('messages.soyad') }}</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="text" autocomplete="on" name="soyad" value="{{Auth::user()->soyad}}" class="input" required="">
                  </div>
                  <p class="help">{{ __('messages.soyadreq') }}</p>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label"> {{ __('messages.telefon') }}</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="text" autocomplete="on" name="telefon" value="{{Auth::user()->telefon}}" class="input" required="">
                  </div>
                  <p class="help">{{ __('messages.telreq') }}</p>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label"> {{ __('messages.email') }}</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="email" autocomplete="on" name="email" value="{{Auth::user()->email}}" class="input" required="">
                  </div>
                  <p class="help">{{ __('messages.emailreq') }}</p>
                </div>
              </div>
            </div>
            
            <div class="field spaced">
                <label class="label">Password</label>
                <p class="control icons-left">
                    <input class="input" type="password" name="password" placeholder="Parol" >
                    <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                </p>
            </div>
           <!--
            <div class="field spaced">
                <label class="label">Təkrar Password</label>
                <p class="control icons-left">
                    <input class="input" type="password" name="tparol" placeholder="Təkrar parol" >
                    <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                </p>
            </div>
            <hr>
            -->
            <div class="field">
              <div class="control">
                <button type="submit" class="button green">
                {{ __('messages.yenile') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            {{ __('messages.profil') }}
          </p>
        </header>
        <div class="card-content">
          <div class="image w-48 h-48 mx-auto">
            <img src="{{Auth::user()->Ufoto}}" class="rounded-full">
          </div>
          <hr>
          <div class="field">
            <label class="label"> {{ __('messages.ad') }}</label>
            <div class="control">
              <input type="text" readonly="" value="{{Auth::user()->ad}}" class="input is-static">
            </div>
          </div>
          <hr>
          <div class="field">
            <label class="label"> {{ __('messages.soyad') }}</label>
            <div class="control">
              <input type="text" readonly="" value="{{Auth::user()->soyad}}" class="input is-static">
            </div>
          </div>
          <hr>
          <div class="field">
            <label class="label"> {{ __('messages.telefon') }}</label>
            <div class="control">
              <input type="text" readonly="" value="{{Auth::user()->telefon}}" class="input is-static">
            </div>
          </div>
          <hr>
          <div class="field">
            <label class="label"> {{ __('messages.telefon') }}</label>
            <div class="control">
              <input type="text" readonly="" value="{{Auth::user()->email}}" class="input is-static">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          {{ __('messages.paroldeyis') }}
        </p>
      </header>
      <div class="card-content">
      <form method="post" action="{{route('Parolupdate')}}">
          @csrf
          <div class="field">
            <label class="label">{{ __('messages.hazirkisifre') }}</label>
            <div class="control">
              <input type="password" name="password" class="input" required="">
            </div>
            <p class="help">{{ __('messages.hazirkisifreyaz') }}</p>
          </div>
          <hr>
          <div class="field">
            <label class="label">{{ __('messages.yenisifre') }}</label>
            <div class="control">
              <input type="password" name="newpassword" class="input" required="">
            </div>
            <p class="help">{{ __('messages.yenisifreyaz') }}</p>
          </div>
          <div class="field">
            <label class="label">{{ __('messages.tesdiqet') }}</label>
            <div class="control">
              <input type="password" name="tnewpassword" class="input" required="">
            </div>
           
          </div>
          <hr>
          <div class="field">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
   
  </section>



@endsection
