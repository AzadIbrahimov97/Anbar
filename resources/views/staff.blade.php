@extends('layouts.app')

@section('title')
Staff
@endsection

@section('axtar')
/staff
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
                  <span class="icon"><i class="mdi mdi-hail"></i></span>
                  {{ __('messages.isciler') }}
               </p>
            </header>
            <div class="card-content">
               <form method="post" action="{{route('staff')}}" enctype="multipart/form-data">
                  @csrf
                  
                  <!--File upload START-->
                  <div class="field">
                  <div class="field">
                    <label class="label">{{ __('messages.iscifoto') }}:</label>
                     <div class="field-body">
                        <div class="field file">
                           <label class="upload control">
                              <a class="button blue">
                              {{ __('messages.logoyukle') }}
                              </a>
                              <input type="file" name="Sfoto" required="">
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
                              <input class="input" type="text" placeholder="{{ __('messages.isciad') }}" name="ad" required="">
                              <span class="icon left"><i class="mdi mdi-account"></i></span>
                           </div>
                        </div>
                        <hr>
                  <div class="field">
                     <label class="label">{{ __('messages.soyad') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.iscisoyad') }}" name="soyad" required="">
                              <span class="icon left"><i class="mdi mdi-account"></i></span>
                           </div>
                        </div>
                        <hr>
                  <div class="field">
                     <label class="label">{{ __('messages.telefon') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.iscitel') }}" name="tel" required="">
                              <span class="icon left"><i class="mdi mdi-cellphone-iphone"></i></span>
                           </div>
                        </div>
                        <hr>
                  <div class="field">
                     <label class="label">{{ __('messages.email') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.email') }}" name="email" required="">
                              <span class="icon left"><i class="mdi mdi-mail-ru"></i></span>
                           </div>
                        </div>
                        <hr>
                  <div class="field">
                     <label class="label">{{ __('messages.maas') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.almaas') }}" name="maash" required="">
                              <span class="icon left"><i class="mdi mdi-cash"></i></span>
                           </div>
                        </div>
                        <hr>
                     </div>
                  </div>
                  <div class="field">
                  <select name="department_id">
                        <option value="">{{ __('messages.sobesec') }}</option>
                        @foreach($department as $dep)
                        <option value="{{$dep->id}}">{{$dep->departments}}</option>
                        @endforeach
                  </select>
                  <hr>
                     <label class="label">{{ __('messages.vezife') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.vezife') }}" name="vezife" required="">
                              <span class="icon left"><i class="mdi mdi-clipboard-account"></i></span>
                           </div>
                        </div>
                        <hr>
                     </div>
                  </div>
                  <hr>
                  <div class="field">
                     <label class="label">{{ __('messages.baslatarix') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="date" name="vaxt" required="">
                              <span class="icon left"><i class="mdi mdi-calendar"></i></span>
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
         <p>{{ __('messages.siz') }} <b>{{$ad}}</b> adli ishcinin melumatlarini silmeye eminsinizmi?</p>
         
      </section>
      <footer class="modal-card-foot">
         <a href="{{route('staff')}}" button class="button red --jb-modal-close">{{ __('messages.legv') }}</button></a>
         <a href="{{route('yes3',$sil_id)}}"button class="button green --jb-modal-close">{{ __('messages.tesdiq') }}</button></a>
      </footer>
   </div>
   </div>
   @endisset


   @isset($edit)
   <div class="card mb-6">
               <div class="card-content">
                  <form method="post" action="{{route('supdate',$edit->id)}}" enctype="multipart/form-data">
                     @csrf
                     <select name="department_id">
                        <option value="">{{ __('messages.sobesec') }}</option>
                        @foreach($departments as $department)
                        @if($edit->department_id==$department->id)
                        <option selected value="{{$department->id}}">{{$department->departments}}</option>
                        @else
                        <option value="{{$department->id}}">{{$department->departments}}</option>
                        @endif
                        @endforeach
                     </select>
                     <hr>
                     <!--File upload START-->
                     <div class="field">
                        <img src="{{url($edit->Sfoto)}}" width="100" height="50"><br>
                        <div class="field-body">
                           <div class="field file">
                           <div class="field file">
                              <label class="upload control">
                                 <a class="button blue">
                                 {{ __('messages.iscifoto') }}
                                 </a>
                                 <input type="file" name="Sfoto" required="">
                              </label>
                           </div>
                        </div>
                     </div>
                     <hr>
                        <!--File upload END-->
                     <div class="field">
                        <label class="label">{{ __('messages.isciad') }}:</label>
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
                        <label class="label">{{ __('messages.iscisoyad') }}:</label>
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
                        <label class="label">{{ __('messages.iscitel') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->tel}}" name="tel" required="">
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
                        <label class="label">{{ __('messages.maas') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->maash}}" name="maash" required="">
                                 <span class="icon left"><i class="mdi mdi-cash"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="field">
                        <label class="label">{{ __('messages.vezife') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->vezife}}" name="vezife" required="">
                                 <span class="icon left"><i class="mdi mdi-clipboard-account"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="field">
                        <label class="label">{{ __('messages.baslatarix') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="date" value="{{$edit->vaxt}}" name="vaxt" required="">
                                 <span class="icon left"><i class="mdi mdi-calendar"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
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
   {{ __('messages.baza') }} <b>({{$sec2->count()}})</b> {{ __('messages.iscivar') }}<br>
  <br><br>
  
   <!--CEDVEL START-->
   <div class="card has-table">
         <div class="card-content">
         <table id="cedvel">
            <thead>
            <tr>
               <th><a href="{{route('Stexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span>
               </a></th>
               <th> {{ __('messages.foto') }}</th>
               <th> {{ __('messages.ad') }}</th>
               <th> {{ __('messages.soyad') }}</th>
               <th> {{ __('messages.telefon') }}</th>
               <th> {{ __('messages.email') }}</th>
               <th> {{ __('messages.maas') }}</th>
               <th> {{ __('messages.vezife') }}</th>
               <th>{{ __('messages.baslatarix') }}</th> 
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
                  <td><img src="{{url($info->Sfoto)}}" width="100" height="50"></td>
                  <td>{{$info->ad}}</td>
                  <td>{{$info->soyad}}</td>
                  <td>{{$info->tel}}</td>
                  <td>{{$info->email}}</td>
                  <td>{{$info->maash}}</td>
                  <td>{{$info->vezife}}</td>
                  <td>{{$info->vaxt}}</td>
                  <td class="actions-cell">
                  <div class="buttons right nowrap">
                     <a href="{{route('sedit',$info->id)}}"><button class="button small green --jb-modal"  type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button></a>
                     <a href="{{route('sil3',$info->id)}}"><button class="button small red --jb-modal"  type="button">
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

