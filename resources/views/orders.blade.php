@extends('layouts.app')

@section('title')
Orders
@endsection

@section('axtar')
/orders
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
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          {{ __('messages.orders') }}
        </p>
      </header>
      <div class="card-content">
        <form method="post" action="{{route('order_insert')}}" enctype="multipart/form-data">
            @csrf
            <label class="label">{{ __('messages.mussec') }}:
            <select name="mushteri_id">
        <option value="">{{ __('messages.musterisec') }}</option>
        @foreach($clients as $client)
        <option value="{{$client->id}}">{{$client->ad}} {{$client->soyad}}</option>

        @endforeach
    </select></label><br>  
          <hr>
          <label class="label">{{ __('messages.mehsec') }}:
          <select name="mehsul_id">
        <option value="">{{ __('messages.mehsulsec') }}</option>
        @foreach($products as $product)
        <option value="{{$product->id}}">{{$product->brand}}-{{$product->mehsul}} [{{$product->miqdar1}}]</option>

        @endforeach
          </select><br>
          <hr>
          <div class="field">
            <label class="label">{{ __('messages.miqdar') }}</label>
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="{{ __('messages.mehsulmiq') }}" name="miqdar">
                  <span class="icon left"><i class="mdi mdi-numeric"></i></span>
                </div>
              </div>
          <hr>
        
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
         <p>{{ __('messages.siz') }} <b>{{$client->ad}}</b> {{ __('messages.eminsiz') }}</p>
         
      </section>
      <footer class="modal-card-foot">
         <a href="{{route('orders')}}" button class="button --jb-modal-close">{{ __('messages.legv') }}</button></a>
         <a href="{{route('yes5',$sil_id)}}"button class="button red --jb-modal-close">{{ __('messages.tesdiq') }}</button></a>
      </footer>
   </div>
   </div>
   @endisset
 

   @isset($edit)
  
                  <form method="post" action="{{route('oupdate',$edit->id)}}" enctype="multipart/form-data">
                     @csrf
                    <div class="card mb-6">
                      <div class="card-content">
                      <select name="mushteri_id">
                          <option value="">{{ __('messages.musterisec') }}</option>
                          @foreach($clients as $client)

          @if($edit->mushteri_id==$client->id)
          <option selected value="{{$client->id}}"><b>{{$client->ad}} {{$client->soyad}}</b></option>
          @else
          <option value="{{$client->id}}"><b>{{$client->ad}} {{$client->soyad}}</b></option>
          @endif
        @endforeach
                      </select><br><br>
                      <select name="mehsul_id">
                              <option value="">{{ __('messages.mehsulsec') }}</option>
                              @foreach($products as $product)
        @if($edit->mehsul_id==$product->id)
        <option selected value="{{$product->id}}">{{$product->brand}}-{{$product->mehsul}} [{{$product->miqdar1}}]</option>
        @else
        <option value="{{$product->id}}">{{$product->mehsul}}</option>
        @endif

        @endforeach
                      </select><br><br>
                     <!--File upload START-->
                        <!--File upload END-->
                     <div class="field">
                        <label class="label">{{ __('messages.miqdar') }}:</label>
                        <div class="field-body">
                           <div class="field">
                              <div class="control icons-left">
                                 <input class="input" type="text" value="{{$edit->miqdar}}" name="miqdar">
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
  {{ __('messages.baza') }} <b>({{$orders2->count()}})</b> {{ __('messages.mehsulvar') }}
   <br><br>
   <hr>
   <center>
   
   <b>Toplam: {{$data->count()}}</b> |
   <b>Tesdiqlenmis: {{$data->count()}}</b> |
   <b>Gozlemede: {{$data->count()}}</b> 
   <br>

   

      <b>Müştəri: {{count($clients)}} </b>  | 
      <b>Sifariş: {{count($data)}} </b>   | 
      <b>Məhsul: {{count($products)}} </b>  | 
      <b>Alish: {{$alis}}</b>  |
      <b>Satish: {{$satis}} </b>  |
      <b>Qazanc: {{$qazanc}}</b> |
      <b>Xerc: {{collect($xerc)->sum('mebleg')}} </b>|
      <b>Cari qazanc: {{$cari}}</b> 
      <br><br>

   </center>

<div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          {{ __('messages.orders') }}
        </p>
      </header>
      <div class="card-content">
        <table id="cedvel">
          <thead>
          <tr>
            <th><a href="{{route('Oexport')}}">
            <span class="icon"><i class="mdi mdi-file-excel"></i></span>
               </a></th>

            <th>{{ __('messages.foto') }}</th>
            <th>{{ __('messages.sifarisci') }}</th>
            <th>{{ __('messages.brand') }}</th>
            <th>{{ __('messages.mehsull') }}</th>
            <th>{{ __('messages.alis') }}</th>
            <th>{{ __('messages.satis') }}</th>
            <th>{{ __('messages.miqdar') }}</th>
            <th>{{ __('messages.stok') }}</th>
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
                <td><img src="{{url($info->Cfoto)}} " width="100" height="50"></td>
                <td>{{$info->client}} {{$info->soyad}}</td>
                <td>{{$info->brand}}</td>
                <td>{{$info->mehsul}}</td>
                <td>{{$info->alish}}</td>
                <td>{{$info->satish}}</td>
                <td>{{$info->miqdar}}</td>
                <td>{{$info->miqdar1}}</td>
                <td>{{$info->created_at}}</td>
                <td class="actions-cell">
                @if($info->otesdiq==0)
                    <a href="{{route('oedit',$info->id)}}"><button class="button small green --jb-modal" type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                        </button></a>
                    <a href="{{route('sil5',$info->id)}}"><button class="button small red --jb-modal" type="button">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                        </button></a>
                        <a href="{{route('otesdiq',$info->id)}}"><button class="button small blue --jb-modal" type="button">
                        <span class="icon"><i class="mdi mdi-account-check"></i></span>
                        </button></a>
                        @else
                        <a href="{{route('oimtina',$info->id)}}"><button class="button small red --jb-modal" type="button">
                        <span class="icon"><i class="mdi mdi-account-check"></i></span>
                        </button></a>
                        @endif
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