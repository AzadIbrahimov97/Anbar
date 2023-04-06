@extends('layouts.app')

@section('title')
Clients
@endsection
@section('axtar')
/clients
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
          <span class="icon"><i class="mdi mdi-human-male-male"></i></span>
          {{ __('messages.mushteri') }}
        </p>
      </header>
            <div class="card-content">
               <form method="post" action="{{route('clients')}}" enctype="multipart/form-data">
                  @csrf
                  <!--File upload START-->
                  <div class="field">
                  <div class="field">
                  <label class="label">{{ __('messages.foto') }}:</label>
                     <div class="field-body">
                        <div class="field file">
                           <label class="upload control">
                              <a class="button blue">
                              {{ __('messages.logoyukle') }}
                              </a>
                              <input type="file" name="Cfoto" required="">
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
                  <hr>
                     <!--File upload END-->
                  <div class="field">
                     <label class="label">{{ __('messages.ad') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.mushad') }}" name="ad" required="">
                              <span class="icon left"><i class="mdi mdi-account"></i></span>
                           </div>
                        </div>
                     </div>
                 </div>
                        <hr>
                  <div class="field">
                     <label class="label">{{ __('messages.soyad') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.mushsoyad') }}" name="soyad" required="">
                              <span class="icon left"><i class="mdi mdi-account"></i></span>
                           </div>
                        </div>
                     </div>
                   </div>
                        <hr>
                  <div class="field">
                     <label class="label">{{ __('messages.telefon') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.mushtel') }}" name="telefon" required="">
                              <span class="icon left"><i class="mdi mdi-cellphone-iphone"></i></span>
                           </div>
                        </div>
                      </div>
                 </div>
                        <hr>
                  <div class="field">
                     <label class="label">{{ __('messages.email') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.emaildaxil') }}" name="email" required="">
                              <span class="icon left"><i class="mdi mdi-mail-ru"></i></span>
                           </div>
                        </div>
                    </div>
               </div>
                        <hr>
                  <div class="field">
                     <label class="label">{{ __('messages.sirket') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.sirketdaxil') }}" name="shirket" required="">
                              <span class="icon left"><i class="mdi mdi-office"></i></span>
                           </div>
                        </div>
                        <hr>
                     </div>
                  </div>

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
      @endempty
      
    
   @isset($sil_id)
   <div id="sample-modal" class="modal active">
   <div class="modal-background --jb-modal-close"></div>
   <div class="modal-card">
      <header class="modal-card-head">
         <p class="modal-card-title"><b>{{ __('messages.sil') }}</b></p>
      </header>
      <section class="modal-card-body">
         <p>{{ __('messages.siz') }} <b>{{$ad}}</b> {{ __('messages.eminsinizmi') }}</p>
         
      </section>
      <footer class="modal-card-foot">
         <a href="{{route('clients')}}" button class="button --jb-modal-close">{{ __('messages.legv') }}</button></a>
         <a href="{{route('yes1',$sil_id)}}"button class="button red --jb-modal-close">{{ __('messages.tesdiq') }}</button></a>
      </footer>
   </div>
   </div>
   @endisset


   @isset($edit)
   <div class="card mb-6">
               <div class="card-content">
                  <form method="post" action="{{route('cupdate',$edit->id)}}" enctype="multipart/form-data">
                     @csrf
                     <!--File upload START-->
                     <div class="field">
                     <div class="field">
                        <img src="{{url($edit->Cfoto)}}" width="100" height="50"><br>
                        <div class="field-body">
                           <div class="field file">
                              <label class="upload control">
                                 <a class="button blue">
                                 {{ __('messages.mushfoto') }}
                                 </a>
                                 <input type="file" name="Cfoto">
                              </label>
                           </div>
                        </div>
                     </div>
                     <hr>
                        <!--File upload END-->
                     <div class="field">
                        <label class="label">{{ __('messages.ad') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->ad}}" name="ad" required="">
                                 <span class="icon left"><i class="mdi mdi-account"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     
                     <div class="field">
                        <label class="label">{{ __('messages.soyad') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->soyad}}" name="soyad" required="">
                                 <span class="icon left"><i class="mdi mdi-account"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="field">
                        <label class="label">{{ __('messages.telefon') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->telefon}}" name="telefon" required="">
                                 <span class="icon left"><i class="mdi mdi-cellphone-iphone"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="field">
                        <label class="label">{{ __('messages.email') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->email}}" name="email" required="">
                                 <span class="icon left"><i class="mdi mdi-mail-ru"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="field">
                        <label class="label">{{ __('messages.sirket') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->shirket}}" name="shirket" required="">
                                 <span class="icon left"><i class="mdi mdi-office"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>




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

   {{ __('messages.baza') }} <b>({{$sec2->count()}})</b> {{ __('messages.musterivar') }}
   <br><br>
   <hr>
  
   <!--CEDVEL START-->
   <div class="card has-table">
         <header class="card-header">
         <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-human-male-male"></i></span>
            {{ __('messages.mushteri') }}
         </p>
         </header>
         <div class="card-content">
            <table id="cedvel">
               <thead>
               <tr>
                  <th><a href="{{route('Cexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span>
               </a></th>
                  <th>{{ __('messages.foto') }}</th>
                  <th>{{ __('messages.ad') }}</th>
                  <th>{{ __('messages.soyad') }}</th>
                  <th>{{ __('messages.telefon') }}</th>
                  <th>{{ __('messages.email') }}</th>
                  <th>{{ __('messages.sirket') }}</th>
                  <th>{{ __('messages.tarix') }}</th>
                  <th></th>
               </tr>
               </thead>
               <tbody>
                  @empty($edit)
                  @empty($sil_id)

               @php
                  $i = ($data->currentpage() * 5) - 5
               @endphp
               @foreach($data as $info)
                  <tr>
                     <td>{{$i+=1}}.</td>
                     <td><img src="{{url($info->Cfoto)}}" width="100" height="50"></td>
                     <td>{{$info->ad}}</td>
                     <td>{{$info->soyad}}</td>
                     <td>{{$info->telefon}}</td>
                     <td>{{$info->email}}</td>
                     <td>{{$info->shirket}}</td>
                     <td>{{$info->created_at}}</td>
                     <td class="actions-cell">
                     <div class="buttons right nowrap">
                        <a href="{{route('cedit',$info->id)}}"><button class="button small green --jb-modal"  type="button">
                           <span class="icon"><i class="mdi mdi-eye"></i></span>
                           </button></a>
                        <a href="{{route('sil1',$info->id)}}"><button class="button small red --jb-modal"  type="button">
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
            @endempty
            @endempty     
         </div>
      </div>
</section>
 

@endsection

