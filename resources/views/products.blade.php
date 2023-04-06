@extends('layouts.app')

@section('title')
Products
@endsection

@section('axtar')
/products
@endsection

@section('content')
  
<section class="section main-section">
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
@empty($edit)
    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-dolly"></i></span>
          {{ __('messages.mehsul') }}
        </p>
      </header>
      <div class="card-content">
        <form method="post" action="{{route('products')}}" enctype="multipart/form-data">
            @csrf
                  <select name="brand_id">
    <option value="">{{ __('messages.bsec') }}</option>
    @foreach($brands as $brand)
    <option value="{{$brand->id}}">{{$brand->brand}}</option>
    @endforeach
    </select>
          <hr>
          <div class="field">
            <label class="label">{{ __('messages.mehsull') }}:</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.mehsulad') }}" name="mehsul" required="">
                  <span class="icon left"><i class="mdi mdi-star-circle"></i></span>
                </div>
              </div>
          <hr>
          <div class="field">
            <label class="label">{{ __('messages.alis') }}:</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.alqiymet') }}" name="alish" required="">
                  <span class="icon left"><i class="mdi mdi-cash-minus"></i></span>
                </div>
              </div>

          <hr>
          <div class="field">
            <label class="label">{{ __('messages.satis') }}:</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.satqiymet') }}" name="satish" required="">
                  <span class="icon left"><i class="mdi mdi-cash-plus"></i></span>
                </div>
              </div>
          <hr>
          <div class="field">
            <label class="label">{{ __('messages.miqdar') }}:</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.mehsulmiq') }}" name="miqdar1" required="">
                  <span class="icon left"><i class="mdi mdi-numeric"></i></span>
                </div>
              </div>
          <hr>
        <div class="field">
          <label class="label">{{ __('messages.foto') }}</label>
          <div class="field-body">
            <div class="field file">
              <label class="upload control">
                <a class="button blue">
                {{ __('messages.logoyukle') }}
                </a>
                <input type="file" name="Pfoto">
              </label>
            </div>
          </div>
        </div><br>
         <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
              {{ __('messages.daxilet') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

      </div>
    </div>
    @endempty


    @isset($sil_id)
   <div id="sample-modal" class="modal active">
   <div class="modal-background --jb-modal-close"></div>
   <div class="modal-card">
      <header class="modal-card-head">
         <p class="modal-card-title"><b>{{ __('messages.sil') }}</b></p>
      </header>
      <section class="modal-card-body">
         <p>{{ __('messages.siz') }} <b>{{$ad}}</b> {{ __('messages.mehmesaj') }}</p>
         
      </section>
      <footer class="modal-card-foot">
         <a href="{{route('products')}}" button class="button --jb-modal-close">{{ __('messages.legv') }}</button></a>
         <a href="{{route('yes2',$sil_id)}}"button class="button red --jb-modal-close">{{ __('messages.tesdiq') }}</button></a>
      </footer>
   </div>
   </div>
   @endisset
 

   @isset($edit)
  
                  <form method="post" action="{{route('pupdate',$edit->id)}}" enctype="multipart/form-data">
                     @csrf
                    <div class="card mb-6">
                      <div class="card-content">
                        <select name="brand_id">
                            <option value="">{{ __('messages.bsec') }}</option>
                            @foreach($brands as $brand)
                              @if($edit->brand_id==$brand->id)
                              <option selected value="{{$brand->id}}">{{$brand->brand}}</option>
                              @else
                              <option value="{{$brand->id}}">{{$brand->brand}}</option>
                              @endif
                            @endforeach
                        </select><br>
                     <!--File upload START-->
                     <div class="field">
                        <img src="{{url($edit->Pfoto)}}" width="100" height="50"><br>
                        <div class="field-body">
                           <div class="field file">
                           <div class="field-body">
                              <label class="upload control">
                                 <a class="button blue">
                                 {{ __('messages.mehfoto') }}
                                 </a>
                                 <input type="file" name="Pfoto" required="">
                              </label>
                           </div>
                        </div>
                     </div>
                     <hr>
                        <!--File upload END-->
                     <div class="field">
                        <label class="label">{{ __('messages.mehsull') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->mehsul}}" name="mehsul" required="">
                                 <span class="icon left"><i class="mdi mdi-star-circle"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     
                     <div class="field">
                        <label class="label">{{ __('messages.alis') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->alish}}" name="alish" required="">
                                 <span class="icon left"><i class="mdi mdi-cash-minus"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="field">
                        <label class="label">{{ __('messages.satis') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->satish}}" name="satish" required="">
                                 <span class="icon left"><i class="mdi mdi-cash-plus"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="field">
                        <label class="label">{{ __('messages.miqdar') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->miqdar}}" name="miqdar1" required="">
                                 <span class="icon left"><i class="mdi mdi-numeric"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                  


                     <div class="field grouped">
                        <div class="control">
                           <button type="submit" class="button green">
                           {{ __('messages.yenile') }}
                           </button>
                        </div>
                     </div>       
                  </form> 
               </div>
            </div>
   @endisset
   <br>
   
   {{ __('messages.baza') }} <b>({{$sec2->count()}})</b> {{ __('messages.mehsulvar') }}
   <br><br>
   <hr>


   <!--CEDVEL START-->

<div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-dolly"></i></span>
          {{ __('messages.mehsul') }}
        </p>
      </header>
      <div class="card-content">
        <table id="cedvel">
          <thead>
          <tr>
            <th><a href="{{route('Pexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span>
               </a></th>

            <th>{{ __('messages.foto') }}</th>
            <th>{{ __('messages.brand') }}</th>
            <th>{{ __('messages.mehsull') }}</th>
            <th>{{ __('messages.alis') }}</th>
            <th>{{ __('messages.satis') }}</th>
            <th>{{ __('messages.miqdar') }}</th>
            <th>{{ __('messages.tarix') }}</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @php
                  $i = ($data->currentpage() * 5) - 5
          @endphp

          @foreach($data as $info)
            <tr>
                <td> {{$i+=1}}. </td>
                <td><img src="{{url($info->Pfoto)}} " width="100" height="50"></td>
                <td>{{$info->brand}}</td>
                <td>{{$info->mehsul}}</td>
                <td>{{$info->alish}}</td>
                <td>{{$info->satish}}</td>
                <td>{{$info->miqdar1}}</td>
                <td>{{$info->created_at}}</td>
                <td class="actions-cell">
                <div class="buttons right nowrap">
                    <a href="{{route('pedit',$info->id)}}"><button class="button small green --jb-modal"  type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button></a>
                    <a href="{{route('sil2',$info->id)}}"><button class="button small red --jb-modal"  type="button">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                        </button></a>
                </div>
                </td>
            </tr>
          @endforeach


          </tbody>
        </table>
        <div class="table-pagination">
              <div class="flex items-center justify-between">
                <div class="buttons">
      
                </div>
                {!! $data->links() !!}
              </div>
            </div>
        
      </div>
    </div>
  </section>

@endsection