@extends('layouts.app')

@section('title')
Xerc
@endsection

@section('axtar')
/xerc
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
                  <span class="icon"><i class="mdi mdi-cash-usd"></i></span>
                  {{ __('messages.xercler') }}
               </p>
            </header>
            <div class="card-content">
               <form method="post" action="{{route('xerc')}}">
                  @csrf
                  <!--File upload START-->
                  <hr>
                     <!--File upload END-->
                  <div class="field">
                     <label class="label"> {{ __('messages.teyinat') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.xteyinat') }}" name="teyinat">
                              <span class="icon left"><i class="mdi mdi-content-paste"></i></span>
                           </div>
                        </div>
                        <hr>
                     </div>
                  </div>
                  <div class="field">
                     <label class="label"> {{ __('messages.mebleg') }}:</label>
                     <div class="field-body">
                        <div class="field">
                           <div class="control icons-left">
                              <input class="input" type="text" placeholder="{{ __('messages.xmebleg') }}" name="mebleg">
                              <span class="icon left"><i class="mdi mdi-cash"></i></span>
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
         <p>{{ __('messages.siz') }} <b>{{$teyinat}}</b> adli xerci silmeye eminsinizmi?</p>
         
      </section>
      <footer class="modal-card-foot">
         <a href="{{route('xerc')}}" button class="button --jb-modal-close">{{ __('messages.legv') }}</button></a>
         <a href="{{route('yes4',$sil_id)}}"button class="button red --jb-modal-close">Con{{ __('messages.tesdiq') }}firm</button></a>
      </footer>
   </div>
   </div>
   @endisset


   @isset($edit)
   <div class="card mb-6">
               <header class="card-header">
                  <p class="card-header-title">
                     <span class="icon"><i class="mdi mdi-ballot"></i></span>
                  </p>
               </header>
               <div class="card-content">
                  <form method="post" action="{{route('xupdate',$edit->id)}}" enctype="multipart/form-data">
                     @csrf

                     <div class="field">
                        <label class="label">{{ __('messages.teyinat') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->teyinat}}" name="teyinat">
                                 <span class="icon left"><i class="mdi mdi-content-paste"></i></span>
                              </div>
                           </div>
                           <hr>
                        </div>
                     </div>
                     <hr>
                     <div class="field">
                        <label class="label">{{ __('messages.mebleg') }}</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->mebleg}}" name="mebleg">
                                 <span class="icon left"><i class="mdi mdi-cash"></i></span>
                              </div>
                           </div>
                           <hr>
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

   {{ __('messages.baza') }} <b>({{$sec2->count()}})</b>  {{ __('messages.mvar') }}
   <br><br>
   <hr>
  
   <!--CEDVEL START-->
   <div class="card has-table">
         <header class="card-header">
         <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-cash-usd"></i></span>
            {{ __('messages.xercler') }}
         </p>
         </header>
         <div class="card-content">
         <table id="cedvel">
            <thead>
            <tr>
               <th><a href="{{route('Xexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span>
               </a></th>
               <th>{{ __('messages.teyinat') }}</th>
               <th>{{ __('messages.mebleg') }}</th>
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
                  <td>{{$info->teyinat}}</td>
                  <td>{{$info->mebleg}}</td>
                  <td>{{$info->created_at}}</td>
                  <td class="actions-cell">
                  <div class="buttons right nowrap">
                     <a href="{{route('xedit',$info->id)}}"><button class="button small green --jb-modal"  type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button></a>
                     <a href="{{route('sil4',$info->id)}}"><button class="button small red --jb-modal"  type="button">
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

