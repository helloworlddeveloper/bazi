<?php

namespace App\Http\Controllers;

use Redirect;
use View;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use App\locations;
use App\user_info;
use Illuminate\Pagination\Paginator;
use File;
use Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MasterController extends Controller
{
    public function __invoke(Request $request)
    {
        
    }
    
     public function index() {
         
         $country = DB::table('locations')
                 ->select('country')
                 ->distinct() 
                ->OrderBy('country','asc')  
                ->get();
         
          return view('master.index', ["country" => $country]);
  
    }
    
    public function create(){
        
       
       $datetime= Request::get('txtBirthDate')." ".Request::get('txtBirthTime').":00";

         DB::table('user_info')->insert([
            ['name' => Request::get('txtFullNm'),
                'birthdate' => $datetime,
                'gender' => Request::get('sex'),
                'born_type' => Request::get('SEBORN'),
                'living_type' => Request::get('SELIVE'),
                'is_dst' => Request::get('SEDST'),
                'location_id' => Request::get('Country')],
         ]);

        return redirect()->back()->with('success', 'บันทึกข้อมูลผู้ใช้สำเร็จ!');

    }
}
