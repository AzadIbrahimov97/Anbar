<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brands;
use App\Models\clients;
use App\Models\orders;
use App\Models\products;
use App\Models\staff;
use App\Models\xerc;
use App\Models\User;
use App\Models\login;
use App\Models\profil;
use App\Models\departments;

use App\Exports\ExportData;
use App\Exports\Exportclients;
use App\Exports\Exportproducts;
use App\Exports\Exportstaff;
use App\Exports\Exportdepartments;
use App\Exports\Exportxerc;
use App\Exports\Exportorders;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class anbarController extends Controller
{  

   public function testindex(){
      $test = brands::paginate(5);
      return view('test',[
         'data'=>$test
         ]);

     }
      
   public function Bexport(){
      return Excel::download(new ExportData,'brands.xlsx');
   }

   public function Cexport(){
      return Excel::download(new Exportclients,'clients.xlsx');
   }

   public function Pexport(){
      return Excel::download(new Exportproducts,'products.xlsx');
   }

   public function Stexport(){
      return Excel::download(new Exportstaff,'staff.xlsx');
   }

   public function Dexport(){
      return Excel::download(new Exportdepartments,'departments.xlsx');
   }

   public function Xexport(){
      return Excel::download(new Exportxerc,'xerc.xlsx');
   }

   public function Oexport(){
      return Excel::download(new Exportorders,'orders.xlsx');
   }


   public function bupdate(Request $post,$x){
      
      $con = brands::find($x);
      $yoxla = brands::where('brand','=',$post->brand)
      ->where('id','!=',$x)
      ->count();
      if($yoxla==0){

         if($post->file('Bfoto'))
        {
             $post->validate([
               'Bfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
             ]);
             $file = time().'.'.$post->Bfoto->extension();
             $post->Bfoto->storeAs('public/uploads/brands',$file);
             $con->Bfoto = 'storage/uploads/brands/'.$file;
        }   
         

      
      $con->brand = $post->brand;

      $con->save();

      return redirect()->route('brands')->with('mesaj1','Melumat ugurla yenilendi');
      }
      return redirect()->route('brands')->with('mesaj2','Bu brand artiq movcuddur');
     
   }
   
   public function bedit($x){
      $edit = brands::find($x);
      $sec = brands::orderBy('id','desc')->get();
      $sec2 = brands::orderBy('id','desc')->get();
      $say = brands::get()->count();
      
      return view('brands',[
         'edit'=>$edit,
         'data'=>$sec,
         'say'=>$say,
         'sec2'=>$sec2
      ]);
     }
     public function sil($x){
      $sil = brands::find($x);
      $sec = brands::orderBy('id','desc')->get();
      $sec2 = brands::orderBy('id','desc')->get();
      $say = brands::get()->count();
      
      return view('brands',[
         'sil_id'=>$sil->id,
         'brand'=>$sil->brand,
         'data'=>$sec,
         'say'=>$say,
         'sec2'=>$sec2
      ]);
     }
      public function yes($x){
         $sil = brands::find($x);
         $sil->delete();
         return redirect()->route('brands')->with('mesaj1','Brand ugurla silindi');
      }
      public function no($x){
         $sil = brands::find($x);
         return redirect()->route('brands')->with('mesaj2',''.$x.' brandi silmek mumkun olmadi');
      }

     public function ok(Request $post){ 
        $con = new brands();
        $yoxla = brands::where('brand','=',$post->brand)
        -> where('user_id','=',Auth::id())->count();
        if($yoxla==0){
          
        if($post->file('Bfoto'))
        {
             $post->validate([
               'Bfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
             ]);
             $file = time().'.'.$post->Bfoto->extension();
             $post->Bfoto->storeAs('public/uploads/brands',$file);
             $con->Bfoto = 'storage/uploads/brands/'.$file;
        }   

        $con->brand = $post->brand;
        $con->user_id = Auth::id();

        $con->save();

        return redirect()->route('brands')->with('mesaj1','Melumat ugurla daxil edildi');
        }
        return redirect()->route('brands')->with('mesaj3',' Bu brand artiq movcuddur');
     }

     public function index(Request $post){
      if(!empty($post->sorgu))
      {
         $sec2 = brands::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->where('brand','LIKE','%'.$post->sorgu.'%')
         ->get();

         $sec = brands::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->where('brand','LIKE','%'.$post->sorgu.'%')
         ->paginate(5);
      }
      else
      {
         $sec2 = brands::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->get();

         $sec = brands::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->paginate(5);
      }
      $say = brands::get()->count();
      return view('brands',[
         'data'=>$sec,
          'say'=>$say,
          'sec2'=>$sec2
         ]);
     }

     public function cupdate(Request $post,$x){

      $con = clients::find($x);
      $yoxla = clients::where('telefon','=',$post->telefon)
      ->where('id','!=',$x)
      ->count();
      if($yoxla==0){

         if($post->file('Cfoto'))
        {
             $post->validate([
               'Cfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
             ]);
             $file = time().'.'.$post->Cfoto->extension();
             $post->Cfoto->storeAs('public/uploads/clients',$file);
             $con->Cfoto = 'storage/uploads/clients/'.$file;
        }  

      
      $con->ad = $post->ad;
      $con->soyad = $post->soyad;
      $con->telefon= $post->telefon;
      $con->email= $post->email;
      $con->shirket = $post->shirket;
      
      $con->save();

      return redirect()->route('clients')->with('mesaj1','Melumat ugurla yenilendi');
      }      
      return redirect()->route('clients')->with('mesaj3','Bu müştəri artiq movcuddur');
      
   }

     public function cedit($x){
      $edit = clients::find($x);
      $sec  = clients::orderBy('id','desc')->get();
      $sec2 = clients::orderBy('id','desc')->get();
      $say  = clients::get()->count();
      
      return view('clients',[
         'edit'=>$edit,
         'data'=>$sec,
         'say'=>$say,
         'sec2'=>$sec2
      ]);
     } 

     public function sil1($x){
      $sil = clients::find($x);
      $sec = clients::orderBy('id','desc')->get();
      $sec2 = clients::orderBy('id','desc')->get();
      $say = clients::get()->count();
      
      return view('clients',[
         'sil_id'=>$sil->id,
         'ad'=>$sil->ad,
         'data'=>$sec,
         'say'=>$say,
         'sec2'=>$sec2
      ]);
     }
      public function yes1($x){
         $sil = clients::find($x);
         $sil->delete();
         return redirect()->route('clients')->with('mesaj1','Mushteri ugurla silindi');
      }
      public function no1($x){
         $sil = clients::find($x);
         return redirect()->route('clients')->with('mesaj2',''.$x.' adli mushterini silmek mumkun olmadi');
      }

     public function ok1(Request $post){
      $con = new clients();
      $yoxla = clients::where('telefon','=',$post->telefon)
      -> where('user_id','=',Auth::id())->count();
      if($yoxla==0){
         if($post->file('Cfoto'))
        {
             $post->validate([
               'Cfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
             ]);
             $file = time().'.'.$post->Cfoto->extension();
             $post->Cfoto->storeAs('public/uploads/clients',$file);
             $con->Cfoto = 'storage/uploads/clients/'.$file;
        }   
        

      $con->ad = $post->ad;
      $con->soyad = $post->soyad;
      $con->telefon = $post->telefon;
      $con->email = $post->email;
      $con->shirket = $post->shirket;
      $con->user_id = Auth::id();
      $con->save();

      return redirect()->route('clients')->with('mesaj1','Melumat ugurla daxil edildi');
      }
      return redirect()->route('clients')->with('mesaj3','Bu nomre ile artiq qeydiyyatdan kecilib! ');

   }

   public function index1(Request $post){

      if(!empty($post->sorgu))
      {
         $sec2 = clients::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->where('ad','LIKE','%'.$post->sorgu.'%')
         ->orwhere('soyad','LIKE','%'.$post->sorgu.'%')
         ->get();

         $sec = clients::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->where('ad','LIKE','%'.$post->sorgu.'%')
         ->orwhere('soyad','LIKE','%'.$post->sorgu.'%')
         ->paginate(5);
      }
      else
      {
         $sec2 = clients::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->get();

         $sec = clients::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->paginate(5);
      }

      $say = clients::get()->count();
      return view('clients',[
         'data'=>$sec,
          'say'=>$say,
          'sec2'=>$sec2
         ]);
     }

     public function pupdate(Request $post,$x){
      $con = products::find($x);
      $yoxla = products::where('mehsul','=',$post->mehsul)
      ->where('id','!=',$x)
      ->count();
      if($yoxla==0){

         if($post->file('Pfoto'))
         {
              $post->validate([
                'Pfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
              ]);
              $file = time().'.'.$post->Pfoto->extension();
              $post->Pfoto->storeAs('public/uploads/products',$file);
              $con->Pfoto = 'storage/uploads/products/'.$file;
         }   

     
      
      $con->brand_id = $post->brand_id;
      $con->mehsul = $post->mehsul;
      $con->alish = $post->alish;
      $con->satish= $post->satish;
      $con->miqdar1= $post->miqdar1;
      
      
      $con->save();

      return redirect()->route('products')->with('mesaj1','Melumat ugurla yenilendi');
      }
      return redirect()->route('products')->with('mesaj3','Bu brand artiq movcuddur');
     
   }

     public function pedit($x){
      $edit = products::find($x);
      $sec = products::join('brands','brands.id','=','products.brand_id')
      ->select('*','products.id')
      ->orderBy('products.id','desc')
      ->paginate();
      $sec2 = products::orderBy('id','desc')->get();
      $say = products::get()->count();
      $brands = brands::orderBy('brand','asc')->get();
      
      return view('products',[
         'edit'=>$edit,
         'data'=>$sec,
         'say'=>$say,
         'brands'=>$brands,
         'sec2'=>$sec2
      ]);
     }

     public function sil2($x){
      $sil = products::find($x);
      $sec = products::orderBy('id','desc')->paginate(5);
      $sec2 = products::orderBy('id','desc')->get();
      $say = products::get()->count();
      $brands = brands::orderBy('brand','asc')->get();

      
      return view('products',[
         'sil_id'=>$sil->id,
         'mehsul'=>$sil->mehsul,
         'data'=>$sec,
         'say'=>$say,
         'brands'=>$brands,
         'sec2'=>$sec2
      ]);
     }
      public function yes2($x){
         $sil = products::find($x);
         $sil->delete();
         return redirect()->route('products')->with('mesaj1','Mushteri ugurla silindi');
      }
      public function no2($x){
         $sil = products::find($x);
         return redirect()->route('products')->with('mesaj2',''.$x.' adli mushterini silmek mumkun olmadi');
      }
     
   public function ok2(Request $post){
      $con = new products();
      $yoxla = products::where('mehsul','=',$post->mehsul)
      -> where('user_id','=',Auth::id())->count();
      if($yoxla==0){
         if($post->file('Pfoto'))
         {
              $post->validate([
                'Pfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
              ]);
              $file = time().'.'.$post->Pfoto->extension();
              $post->Pfoto->storeAs('public/uploads/products',$file);
              $con->Pfoto = 'storage/uploads/products/'.$file;
         }  
      
      $con->brand_id = $post->brand_id;
      $con->mehsul = $post->mehsul;
      $con->alish = $post->alish;
      $con->satish = $post->satish;
      $con->miqdar1 = $post->miqdar1;
      $con->user_id = Auth::id();
      $con->save();
       
      return redirect()->route('products')->with('mesaj1','Melumat ugurla daxil edildi');
      }
      return redirect()->route('products')->with('mesaj3','Bu adda mehsul artiq movcuddur');
   }

   public function index2(Request $post){
      if(!empty($post->sorgu))
      {
         $sec = products::join('brands','brands.id','=','products.brand_id')
         ->where('products.user_id','=',Auth::id())
         ->where('products.mehsul','LIKE','%'.$post->sorgu.'%')
         ->select('*','products.id')
         ->orderBy('products.id','desc')
         ->paginate(5);
         $sec2 = products::join('brands','brands.id','=','products.brand_id')
         ->where('products.user_id','=',Auth::id())
         ->orwhere('products.mehsul','LIKE','%'.$post->sorgu.'%')
         ->select('*','products.id')
         ->orderBy('products.id','desc')
         ->get();
      }
      else
      {
      $sec = products::join('brands','brands.id','=','products.brand_id')
      ->where('products.user_id','=',Auth::id())
      ->select('*','products.id')
      ->orderBy('products.id','desc')
      ->paginate(5);
      $sec2 = products::join('brands','brands.id','=','products.brand_id')
      ->where('products.user_id','=',Auth::id())
      ->select('*','products.id')
      ->orderBy('products.id','desc')
      ->get();
      }      
      
      $brands = brands::orderBy('brand','asc')->get();

      $say = products::get()->count();
      return view('products',[
         'data'=>$sec,
          'say'=>$say,
          'brands'=>$brands,
          'sec2'=>$sec2
         ]);
     }
     
     public function supdate(Request $post,$x){
      
      $con = staff::find($x);
      $yoxla = staff::where('tel','=',$post->tel)
      ->where('id','!=',$x)
      ->count();

      if($yoxla==0){

         if($post->file('Sfoto'))
         {
              $post->validate([
                'Sfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
              ]);
              $file = time().'.'.$post->Sfoto->extension();
              $post->Sfoto->storeAs('public/uploads/staff',$file);
              $con->SFoto = 'storage/uploads/staff/'.$file;
         }  

      $con->department_id = $post->department_id;
      $con->ad = $post->ad;
      $con->soyad = $post->soyad;
      $con->tel= $post->tel;
      $con->email= $post->email;
      $con->maash = $post->maash;
      $con->vezife= $post->vezife;
      $con->vaxt= $post->vaxt;

      
      $con->save();

      return redirect()->route('staff')->with('mesaj1','Melumat ugurla yenilendi');
      }
      return redirect()->route('staff')->with('mesaj3','Bu melumat artiq movcuddur');
     
   }

     public function sedit($x){
      $edit = staff::find($x);
      $sec = staff::orderBy('id','desc')->paginate(5);
      $sec2 = staff::orderBy('id','desc')->get();
      $say = staff::get()->count();
      $department = departments::orderBy('id','desc')->get();

      return view('staff',[
         'edit'=>$edit,
         'data'=>$sec,
         'departments'=>$department,
         'say'=>$say,
         'sec2'=>$sec2
      ]);
     }

     public function sil3($x){
      $sil = staff::find($x);
      $sec = staff::orderBy('id','desc')->paginate();
      $sec2 = staff::orderBy('id','desc')->get();
      $department = departments::orderBy('id','desc')->get();
      $say = staff::get()->count();
      
      return view('staff',[
         'sil_id'=>$sil->id,
         'ad'=>$sil->ad,
         'data'=>$sec,
         'department'=>$department,
         'say'=>$say,
         'sec2'=>$sec2
      ]);
     }
      public function yes3($x){
         $sil = staff::find($x);
         $sil->delete();
         return redirect()->route('staff')->with('mesaj1','Melumat ugurla silindi');
      }
      public function no3($x){
         $sil = staff::find($x);
         return redirect()->route('staff')->with('mesaj2',''.$x.' adli shexsi silmek mumkun olmadi');
      }

   public function ok3(Request $post){
      $con = new staff();
    

      $yoxla = staff::where('email','=',$post->email)
      -> where('user_id','=',Auth::id())->count();
      if($yoxla==0){

    
      if($post->file('Sfoto'))
         {
              $post->validate([
                'Sfoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
              ]);
              $file = time().'.'.$post->Sfoto->extension();
              $post->Sfoto->storeAs('public/uploads/staff',$file);
              $con->Sfoto = 'storage/uploads/staff/'.$file;
         }  
      $con->department_id = $post->department_id;
      $con->ad = $post->ad;
      $con->soyad = $post->soyad;
      $con->tel = $post->tel;
      $con->email = $post->email;
      $con->maash = $post->maash;
      $con->vezife = $post->vezife;
      $con->vaxt = $post->vaxt;
      $con->user_id = Auth::id();
      $con->save();

      return redirect()->route('staff')->with('mesaj1','Melumat ugurla daxil edildi');
      }
      return redirect()->route('staff')->with('mesaj3','Bu emaille artiq qeydiyyatdan kecilib');
   }
   
   public function index3(Request $post){
      if(!empty($post->sorgu))
      {
         $sec = staff::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->where('ad','LIKE','%'.$post->sorgu.'%')
         ->orwhere('soyad','LIKE','%'.$post->sorgu.'%')
         ->paginate(5);
         $sec2 = staff::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->where('ad','LIKE','%'.$post->sorgu.'%')
         ->orwhere('soyad','LIKE','%'.$post->sorgu.'%')
         ->get();
      }
      else
      {
      $sec = staff::orderBy('id','desc')
      ->where('user_id','=',Auth::id())
      ->paginate(5);
      $sec2 = staff::orderBy('id','desc')
      ->where('user_id','=',Auth::id())
      ->get();
      }
      $department = departments::orderBy('id','desc')->get();
      $say = staff::get();

      return view('staff',[
         'data'=>$sec,
         'say'=>$say,
          'department'=>$department,
          'sec2'=>$sec2
                          ]);     
      }

      public function dupdate(Request $post,$x){

            
      
         $con = departments::find($x);
         
         $con->departments = $post->departments;
      
         $con->save();
   
         return redirect()->route('departments')->with('mesaj1','Melumat ugurla yenilendi');
         }
        
        
      
   
         public function dedit($x){
            $edit = departments::find($x);
            $sec = departments::orderBy('id','desc')->get();
            $sec2 = departments::orderBy('id','desc')->get();
            $say = departments::get()->count();
            
            return view('departments',[
               'edit'=>$edit,
               'data'=>$sec,
               'say'=>$say,
               'sec2'=>$sec2
            ]);
         }
      
   
         public function sil6($x){
            $sil = departments::find($x);
            $sec = departments::orderBy('id','desc')->get();
            $sec2 = departments::orderBy('id','desc')->get();
            $say = departments::get()->count();
            
            return view('departments',[
               'sil_id'=>$sil->id,
               'departments'=>$sil->departments,
               'data'=>$sec,
               'say'=>$say,
               'sec2'=>$sec2
            ]);
         }
         public function yes6($x){
            $sil = departments::find($x);
            $sil->delete();
            return redirect()->route('departments')->with('mesaj1','Melumat ugurla silindi');
         }
         public function no6($x){
            $sil = departments::find($x);
            return redirect()->route('departments')->with('mesaj2',''.$x.' adli melumati silmek mumkun olmadi');
         }
         public function departments1(Request $post6){
         $con = new departments();
         $yoxla = departments::where('user_id','=',Auth::id())
         ->where('departments','=',$post6->departments)
         ->count();
         ;
         $sec = departments::orderBy('id','desc')
         ->where('user_id','=',Auth::id()) ->get();
         
         if($yoxla==0)
         {

         $con->departments = $post6->departments;
         $con->user_id = Auth::id();
         $con->save();
         
         
         return redirect()->route('departments')->with('mesaj1','Melumat ugurla daxil edildi');
         }
         return redirect()->route('departments')->with('mesaj3','Bu sobe artiq movcuddur');
         
         }
         
         public function departments(Request $post){
     if(!empty($post->sorgu))
     {
      $sec = departments::orderBy('id','desc')
      ->where('user_id','=',Auth::id())
      ->where('departments','LIKE','%'.$post->sorgu.'%')
      ->paginate(5);
      $sec2 = departments::orderBy('id','desc')
      ->where('user_id','=',Auth::id())
      ->where('departments','LIKE','%'.$post->sorgu.'%')
      ->get();
     }
      else
      {
         $sec = departments::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->paginate(5);
         $sec2 = departments::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->get();
      }
         $say = departments::get()->count();
         return view('departments',[
            'data'=>$sec,
            'say'=>$say,
            'sec2'=>$sec2
                                    ]);
         }


         public function xupdate(Request $post,$x){

            
      
            $con = xerc::find($x);
            
            $con->teyinat = $post->teyinat;
            $con->mebleg = $post->mebleg;
            
            $con->save();
      
            return redirect()->route('xerc')->with('mesaj1','Melumat ugurla yenilendi');
            }
           
           
         
      
           public function xedit($x){
            $edit = xerc::find($x);
            $sec = xerc::orderBy('id','desc')->get();
            $sec2 = xerc::orderBy('id','desc')->get();
            $say = xerc::get()->count();
            
            return view('xerc',[
               'edit'=>$edit,
               'data'=>$sec,
               'say'=>$say,
               'sec2'=>$sec2
                               ]);
           }
         

         public function sil4($x){
            $sil = xerc::find($x);
            $sec = xerc::orderBy('id','desc')->get();
            $sec2 = xerc::orderBy('id','desc')->get();
            $say = xerc::get()->count();
            
            return view('xerc',[
               'sil_id'=>$sil->id,
               'teyinat'=>$sil->teyinat,
               'data'=>$sec,
               'say'=>$say,
               'sec2'=>$sec2
            ]);
           }
            public function yes4($x){
               $sil = xerc::find($x);
               $sil->delete();
               return redirect()->route('xerc')->with('mesaj1','Melumat ugurla silindi');
            }
            public function no4($x){
               $sil = xerc::find($x);
               return redirect()->route('xerc')->with('mesaj2',''.$x.' adli melumati silmek mumkun olmadi');
            }
   public function ok4(Request $post){

      $con = new xerc();
      $sec = brands::orderBy('id','desc')
      ->where('user_id','=',Auth::id())->get();

      $con->teyinat = $post->teyinat;
      $con->mebleg = $post->mebleg;
      $con->user_id = Auth::id();
      $con->save();


      return redirect()->route('xerc')->with('mesaj1','Melumat ugurla daxil edildi');

   }

   public function index4(Request $post){
      if(!empty($post->sorgu))
      {
         $sec = xerc::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->where('teyinat','LIKE','%'.$post->sorgu.'%')
         ->paginate(5);
         $sec2 = xerc::orderBy('id','desc')
         ->where('user_id','=',Auth::id())
         ->where('teyinat','LIKE','%'.$post->sorgu.'%')
         ->get();
      }
      else
      {
      $sec = xerc::orderBy('id','desc')
      ->where('user_id','=',Auth::id())
      ->paginate(5);
      $sec2 = xerc::orderBy('id','desc')
      ->where('user_id','=',Auth::id())
      ->get();
      }
      $say = xerc::get();
      return view('xerc',[
         'data'=>$sec,
         'say'=>$say,
         'sec2'=>$sec2
                         ]);
     }


     public function otesdiq($id){

      $tesdiq = orders::find($id);
      $mehsul1 = products::find($tesdiq->mehsul_id);

      if($tesdiq->miqdar <= $mehsul1->miqdar1)
      {
          $netice = $mehsul1->miqdar1 - $tesdiq->miqdar;

          $tesdiq->otesdiq = 1;
          $tesdiq->save();

          $mehsul1->miqdar1 = $netice;
          $mehsul1->save();

          return redirect()->route('orders')->with('mesaj1','Sifarisi ugurla tesdiq edildi');

      }
      else
      {return redirect()->route('orders')->with('mesaj3','Sifarisi tesdiq etmek ucun anbarda kifayet qeder mehsul yoxdur');}
  
  }

  public function oimtina($id){

   $tesdiq = orders::find($id);
   $mehsul1 = products::find($tesdiq->mehsul_id);
   
   $netice = $mehsul1->miqdar1 + $tesdiq->miqdar;

   $tesdiq->otesdiq = 0;
   $tesdiq->save();

   $mehsul1->miqdar1 = $netice;
   $mehsul1->save();

   return redirect()->route('orders')->with('mesaj1','Sifarisi ugurla legv edildi');

}

     public function oupdate(Request $post,$x){    
      
      $con = orders::find($x);
      
      $con->mushteri_id = $post->mushteri_id;
      $con->mehsul_id = $post->mehsul_id;
      $con->miqdar = $post->miqdar;
      
      $con->save();

      return redirect()->route('orders')->with('mesaj1','Melumat ugurla yenilendi');
      }
     
     
   

      public function oedit($id){

         $edit = orders::find($id);

         $orders = orders::join('clients','clients.id','=','orders.mushteri_id')
         ->join('products','products.id','=','orders.mehsul_id')
         ->join('brands','brands.id','=','products.brand_id')
         ->orderBy('orders.id','desc')
         ->select('*','orders.id','brands.brand as brand','clients.ad as client','products.miqdar1 as stok')
         ->paginate(5);
         
         $orders2 = orders::join('clients','clients.id','=','orders.mushteri_id')
         ->join('products','products.id','=','orders.mehsul_id')
         ->join('brands','brands.id','=','products.brand_id')
         ->orderBy('orders.id','desc')
         ->select('*','orders.id','brands.brand as brand','clients.ad as client','products.miqdar1 as stok')
         ->get();

         $products = products::join('brands','brands.id','=','products.brand_id')
         ->select('*','products.id')
         ->orderBy('products.mehsul','asc')
         ->get();

         $alis = 0;
         $satis = 0;
         $qazanc = 0;

         foreach($products as $p)
         {
            $alis = ($p->alish * $p->miqdar1) + $alis;
            $satis = ($p->satish * $p->miqdar1) + $satis;
            $qazanc = (($p->satish - $p->alish) * $p->miqdar1) + $qazanc;
         }

         $clients = clients::orderBy('ad','asc')->get();
         $say = orders::get()->count();

         $xerc = xerc::orderBy('xercs.mebleg')->get();
         $cari = 0;
         
         
         
         return view('orders',[
            'edit'=>$edit,
            'data'=>$orders,
            'clients'=>$clients,
            'products'=>$products,
            'say'=>$say,
            'xerc'=>$xerc,
            'cari'=>$cari,
            'orders2'=>$orders2,
            'alis'=>$alis,
            'satis'=>$satis,
            'qazanc'=>$qazanc
            
            ]);
        }
        
     public function sil5($id){
      $orders = orders::join('clients','clients.id','=','orders.mushteri_id')
      ->join('products','products.id','=','orders.mehsul_id')
      ->join('brands','brands.id','=','products.brand_id')
      ->orderBy('orders.id','desc')
      ->select('*','orders.id','brands.brand as brand','clients.ad as client','products.miqdar1 as stok')
      ->paginate(5);

      $orders2 = orders::join('clients','clients.id','=','orders.mushteri_id')
      ->join('products','products.id','=','orders.mehsul_id')
      ->join('brands','brands.id','=','products.brand_id')
      ->orderBy('orders.id','desc')
      ->select('*','orders.id','brands.brand as brand','clients.ad as client','products.miqdar1 as stok')
      ->get();
      
      $products = products::join('brands','brands.id','=','products.brand_id')
      ->select('*','products.id')
      ->orderBy('products.mehsul','asc')
      ->get();
      
      $alis = 0;
      $satis = 0;
      $qazanc = 0;

      foreach($products as $p)
      {
         $alis = ($p->alish * $p->miqdar1) + $alis;
         $satis = ($p->satish * $p->miqdar1) + $satis;
         $qazanc = (($p->satish - $p->alish) * $p->miqdar1) + $qazanc;
      }

      $clients = clients::orderBy('ad','asc')->get();
      $say = orders::get()->count();

      $xerc = xerc::orderBy('xercs.mebleg')->get();
      
      $cari = 0;
      
      
      
      return view('orders',[
         'sil_id'=>$id,
         'data'=>$orders,
          'say'=>$say,
          'clients'=>$clients,
          'products'=>$products,
          'xerc'=>$xerc,
          'cari'=>$cari,
          'orders'=>$orders,
          'orders2'=>$orders2,
          'alis'=>$alis,
          'satis'=>$satis,
          'qazanc'=>$qazanc
         ]);
     }
      public function yes5($id){
         $sil = orders::find($id);
         $sil->delete();
         return redirect()->route('orders')->with('mesaj1','Sifarish ugurla silindi');
      }
      public function no5($id){
         $sil = orders::find($id);
         return redirect()->route('orders')->with('mesaj2',''.$x.' adli mushterini silmek mumkun olmadi');
      }
   
      public function order_insert(Request $post){
   
      $con = new orders();

      $con->user_id = Auth::id();
      $con->mushteri_id = $post->mushteri_id;
      $con->mehsul_id = $post->mehsul_id;
      $con->miqdar = $post->miqdar;
      $con->otesdiq = 0;
      $con->save();

    
      return redirect()->route('orders')->with('mesaj1','Melumat ugurla daxil edildi');
      }

   public function orders(Request $post){
   if(!empty($post->sorgu))
   {
      $orders = orders::join('products','products.id','=','orders.mehsul_id')
      ->join('clients','clients.id','=','orders.mushteri_id')
      ->join('brands','brands.id','=','products.brand_id')
      ->select('*','orders.id','clients.ad as client')
      ->orderBy('orders.id','desc')
      ->where('orders.user_id','=',Auth::id())
      ->where('products.mehsul','LIKE','%'.$post->sorgu.'%')
      ->orwhere('brands.brand','LIKE','%'.$post->sorgu.'%')
      ->paginate(5);
      
      $orders2 = orders::join('products','products.id','=','orders.mehsul_id')
      ->join('clients','clients.id','=','orders.mushteri_id')
      ->join('brands','brands.id','=','products.brand_id')
      ->select('*','orders.id','clients.ad as client')
      ->orderBy('orders.id','desc')
      ->where('orders.user_id','=',Auth::id())
      ->orwhere('products.mehsul','LIKE','%'.$post->sorgu.'%')
      ->orwhere('brands.brand','LIKE','%'.$post->sorgu.'%')
      ->get();
   }
   else
   {
      $orders = orders::join('products','products.id','=','orders.mehsul_id')
      ->join('clients','clients.id','=','orders.mushteri_id')
      ->join('brands','brands.id','=','products.brand_id')
      ->select('*','orders.id','clients.ad as client')
      ->orderBy('orders.id','desc')
      ->where('orders.user_id','=',Auth::id())
      ->paginate(5);
      
      $orders2 = orders::orderBy('orders.id','desc')
      ->where('orders.user_id','=',Auth::id())
      ->get();
   }
      $orders_st = orders::join('clients','clients.id','=','orders.mushteri_id')
      ->join('products','products.id','=','orders.mehsul_id')
      ->join('brands','brands.id','=','products.brand_id')
      ->select('*','orders.id','clients.ad as client','orders.miqdar as miq')
      ->where('Otesdiq','=',1)
      ->where('orders.user_id','=',Auth::id())
      ->paginate(5);
      
    

      $cari = 0;

      foreach($orders_st as $s){
         $cari = ($s->miq * ($s->satish - $s->alish)) + $cari;
      }

      $clients = clients::orderBy('ad','asc')
      ->where('user_id','=',Auth::id())
      ->get();

      $products = products::join('brands','brands.id','=','products.brand_id')
      ->select('*','products.id')
      ->orderBy('products.mehsul','desc')
      ->where('products.user_id','=',Auth::id())
      ->get();

      $alis = 0;
      $satis = 0;
      $qazanc = 0;

      foreach($products as $p)
      {
         $alis = ($p->alish * $p->miqdar1) + $alis;
         $satis = ($p->satish * $p->miqdar1) + $satis;
         $qazanc = (($p->satish - $p->alish) * $p->miqdar1) + $qazanc;
      }

      $say = orders::get()->count();
      
      $xerc = xerc::orderBy('xercs.mebleg')->get();
      
     

      
      return view('orders',[
         'data'=>$orders,
          'say'=>$say,
          'clients'=>$clients,
          'products'=>$products,
          'xerc'=>$xerc,
          'cari'=>$cari,
          'orders2'=>$orders2,
          'alis'=>$alis,
          'satis'=>$satis,
          'qazanc'=>$qazanc
         ]);
     }

     public function users(){
      
      $users = user::orderBy('id','desc')->get();
      return view('users',[
         'data'=>$users

      ]);
         
     }


     public function users_insert(Request $post){
      
      $con = new user();
      
      if($post->password == $post->tparol){
         if($post->file('Ufoto'))
         {
              $post->validate(['Ufoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480']);
              $file = time().'.'.$post->Ufoto->extension();
              $post->Ufoto->storeAs('public/uploads/staff',$file);
              $con->Ufoto = 'storage/uploads/staff/'.$file;
         }  
      $con->ad = $post->ad;
      $con->soyad = $post->soyad;
      $con->email = $post->email;
      $con->telefon = $post->telefon;
      $con->password = Hash::make( $post->password);
      $con->save();

    
         return redirect()->route('users')->with('mesaj1','Melumat ugurla daxil edildi');
      }
         return redirect()->route('users')->with('mesaj2','Tekrar parol yanlisdir');
      }


      public function login(Request $post){

           $this->validate($post,['email'=>'required|email','password'=>'required']);

            if(!Auth::attempt(['email'=>$post->email,'password'=>$post->password]))
               {
                  return redirect()->back()->with('mesaj2','Daxil etdiyiniz login ve parol yalnisdir');
               }
                  return redirect()->route('brands');

    }
    public function logout(Request $post){
      auth()->logout();
      return redirect()->route('login');

}


public function Proindex(){

   $users = user::orderBy('id','desc');
  
   return view('profil',[
       'data'=>$users
   ]);

}

public function Prupdate(Request $post,){

      $con = user::find(Auth::id());
      
      if(Hash::check($post->password,$con->password)){

      if($post->file('Ufoto'))
      {
           $post->validate([
             'Ufoto'=>'image|mimes:jpg,png,gif,svg,jpeg,webp|max:20480'
           ]);
           $file = time().'.'.$post->Ufoto->extension();
           $post->Ufoto->storeAs('public/uploads/users',$file);
           $con->Ufoto = 'storage/uploads/users/'.$file;
      }   
      
      $con->ad = $post->ad;
      $con->soyad = $post->soyad;
      $con->telefon = $post->telefon;
      $con->email = $post->email;
       $con-> save(); 
       
       return redirect()->route('profil')->with('mesaj1','Melumat ugurlu elave edildi');

 }
       return redirect()->route('profil')->with('mesaj2','Parol yalnisdir');
}

public function Parolupdate(Request $post,){

   $con = user::find(Auth::id());
   
   if(Hash::check($post->password,$con->password)){
     if($post->newpassword==$post->tnewpassword){
   
      $con->password = Hash::make( $post->newpassword);
      $con->save();
    
    return redirect()->route('profil')->with('mesaj1','Parol ugurla yenilendi');

   }
     return redirect()->route('profil')->with('mesaj2','Tekrar parol yalnishdir');
}
    else{
    return redirect()->route('profil')->with('mesaj2','Cari parol yalnisdir');
    }
}
 


   }

