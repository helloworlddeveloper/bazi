@extends('layouts.app')
@section('header')
@parent
@stop   
@section('content') 

  <meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row" >          
    <div class="inner">
        <h1>Bazi Astrology</h1>
        <br><br>
       <form id="create-form" class="form-horizontal" method="POST" action="{{url('/master/create')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
           <div style="width: 100%;height:350px;border: 1px solid gray;padding:1em;">
                @if (session()->has('success'))
                 <div class="alert alert-success">
                      <h2>{{ session('success') }}</h2>
                </div>
                
                @endif
               
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Full-Name</label>
                        <input type="text" class="form-control" style="width:100%;" name="txtFullNm" required>
                    </div>
                </div>      
                <div class="form-row">
                    <div class="form-group col-md-6 col-lg-6">
                        <label>Birth-Date</label>
                        <input type="date" class="form-control" id="txtBirthDate"  name="txtBirthDate" autocomplete="off"  required>
                    </div>
                    <div class="form-group col-md-6 col-lg-6" style="margin-left: 10px;">
                        <label>Time</label>
                        <br>
                        <table style="width:80%;" border="1">
                            <tr>
                                <td> 
                                    <input type="time" class="form-control" id="txtBirthTime" name="txtBirthTime" required>
                                </td>
                              
                               
                            </tr>
                        </table>
                    </div>
                </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Country</label>
                        <select id="Country"  name="Country"  class="form-control" style="text-align: center;" required>
                            <option selected value="">..Choose Country</option>
                            @foreach($country as $countrys)
                        
                            <option value="{{$countrys->country}}">{{$countrys->country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6" style="margin-left: 10px;">
                        <label>Gender</label>
                        <br>
                        <table style="width:40%;">
                            <tr>
                                <td>
                                    <input type="radio" name="sex" value="M"> Male
                                </td>
                                <td>
                                    <input type="radio" name="sex" value="F"> Female
                                </td>
                            </tr>
                        </table>                                  
                    </div>
                </div>
                
                  <div class="form-row">
                    <div class="form-group col-md-12 col-lg-12">
                      
                        
                        <table style="width:100%;" border="0">
                            <tr style="height:30px;">
                                <td>   <label>DST</label> </td>
                                <td>   <label>BORN</label> </td>
                                 <td>   <label>LIVING</label> </td>
                            </tr>
                            <tr>
                                <td style="padding:0.5em;"> 
                                    <select class="form-control" name="SEDST">
                                        <option value="Y">YES</option>
                                        <option value="N">NO</option>
                                    </select>
                                </td>
                                <td style="padding:0.5em;"> 
                                    <select class="form-control" name="SEBORN">
                                        <option value="N">N</option>
                                        <option value="S">S</option>
                                    </select>
                                </td>
                                 <td style="padding:0.5em;"> 
                                  <select class="form-control" name="SELIVING">
                                        <option value="N">N</option>
                                        <option value="S">S</option>
                                    </select>
                                 </td>
                            </tr>
                        </table> 
                      
                        
                    </div>
                    
                  
                </div>
            
              
     

            </div>
           <div style="width:100%;height: 60px;">
               <center>
               <input type="submit" class="btn btn-info" style="width:250px;" value="send">
               </center>
           </div>
 
           

        </form>
        
        
    </div>

   
    <div class="ba_zi_pillars">


        <table border="1" class="tbl_bazi_4_pillars">
            <tr style="height:30px;">
                <td colspan="5">BAZI 4 PILLARS BIRTH CHART 八字命理</td>
            </tr>
            <tr style="height:40px;text-align: center;">
                <td style="width:3%;">0</td>
                <td style="width:10%;"><b>HOUR</b></td>
                <td style="width:10%;"><b>DAY</b></td>
                <td style="width:10%;"><b>MONTH</b></td>
                <td style="width:10%;"><b>YEAR</b></td>
            </tr>
            <tr style="height:110px;">
                <td>1</td>
                <td>
                    <table class="tbl_bazi_4_pillars_sub">
                        <tr style="height:50px;">
                            <td class="v_bottom"><b>庚</b></td>
                            <td class="v_bottom"><b>Geng</b></td>
                        </tr>
                        <tr style="height:50px;">
                            <td class="v_top">+ Metal</td>
                            <td class="v_top">Do</td>
                        </tr>
                    </table>
                </td>
                @for($i=0;$i<=2;$i++)
                <td>
                    <table class="tbl_bazi_4_pillars_sub">
                        <tr style="height:50px;">
                            <td class="v_bottom"><b>癸</b></td>
                            <td class="v_bottom"><b>Gui</b></td>
                        </tr>
                        <tr style="height:50px;">
                            <td class="v_top">+ Wood</td>
                            <td class="v_top">Dm</td>
                        </tr>
                    </table>
                </td>
                @endfor
            </tr>
            <tr style="height:110px;">
                <td>2</td>
                <td>
                    <table class="tbl_bazi_4_pillars_sub">
                        <tr style="height:40px;">
                            <td class="v_bottom"><b>庚</b></td>
                            <td class="v_bottom"><b>Geng</b></td>
                        </tr>
                        <tr style="height:20px;">
                            <td style="font-size:10pt;" colspan="2">Snake</td>
                        </tr>
                        <tr style="height:40px;">
                            <td class="v_top">+ Water</td>
                            <td class="v_top">Eg</td>
                        </tr>
                    </table>
                </td>
                
                    @for($i=0;$i<=2;$i++)
                <td>
                    <table class="tbl_bazi_4_pillars_sub">
                        <tr style="height:40px;">
                            <td class="v_bottom"><b>癸</b></td>
                            <td class="v_bottom"><b>Gui</b></td>
                        </tr>
                        <tr style="height:20px;">
                            <td style="text-align: center;font-size:10pt;" colspan="2">Dragon</td>
                        </tr>
                        <tr style="height:40px;">
                            <td class="v_top">+ Fire</td>
                            <td class="v_top">IW</td>
                        </tr>
                    </table>
                </td>
                @endfor
                
            </tr>
            <tr style="height: 120px;">
                <td>3</td>
                <td>
                    <table class="tbl_bazi_4_pillars_sub">
                        <tr style="height: 40px;vertical-align: bottom;"> 
                            <td style="width:50%;">丙 Bing</td>
                            <td style="width:50%;">Eg</td>
                        </tr>
                        <tr  style="height: 40px;"> 
                            <td>戊 Wu</td>
                            <td>Sk</td>
                        </tr>
                        <tr  style="height: 40px;"> 
                            <td class="v_top">丁 Ding</td>
                            <td class="v_top">Iw</td>
                        </tr>
                    </table>   
                </td>
                   @for($i=0;$i<=2;$i++)
                 <td>
                    <table class="tbl_bazi_4_pillars_sub">
                        <tr style="height: 40px;vertical-align: bottom;"> 
                            <td style="width:50%;">丙 Bing</td>
                            <td style="width:50%;">Eg</td>
                        </tr>
                        <tr  style="height: 40px;"> 
                            <td>戊 Wu</td>
                            <td>Sk</td>
                        </tr>
                        <tr  style="height: 40px;"> 
                            <td class="v_top">丁 Ding</td>
                            <td class="v_top">Iw</td>
                        </tr>
                    </table>   
                </td>
                @endfor
            </tr>

        </table>

    </div>
    
    <div class="ba_zi_lucky_pillars">
        
        
        <table style="text-align: center;width: 100%;" border='1'>
            <tr style="height:50px;">
                <td colspan="10"><b>YEARLY LUCK PILLARS 1991(Age01) - 2000(Age 10)</b></td>
            </tr>
             <tr>
               @for($i=1991;$i<=2000;$i++)
               <td>
                  1 Oct {{$i}}
               </td>
               @endfor
            </tr>
            <tr>
                <?=$old=0;?>
               @for($i=1991;$i<=2000;$i++)
               <td>
                 {{$i}} Age(<?=$old++;?>)
               </td>
               @endfor
            </tr>
            <tr style="height: 140px;">
                 @for($i=1991;$i<=2000;$i++)
               <td>
                   <table style="text-align: center;width: 100%;font-size: 10pt;" border='0'>
                       <tr>
                           <td style="width: 50%;">
                            癸  Gui		       
                           </td>
                           <td style="width: 50%;">
                              SK    
                           </td>
                       </tr>
                       <tr><td colspan="2">-Water </td></tr>
                        <tr>
                           <td style="width: 50%;">
                             戌 Xu			       
                           </td>
                           <td style="width: 50%;">
                              HO   
                           </td>
                       </tr>
                      <tr><td colspan="2">+ Dog</td></tr>
                      <tr><td colspan="2">+ Earth</td></tr>
                   </table>
               </td>
               @endfor
            </tr>
             <tr style="height: 80px;">
                 @for($i=1991;$i<=2000;$i++)
               <td>
                   <table style="text-align: center;font-size: 10pt;width: 100%;">
                      <tr>
                           <td style="width: 50%;">
                             戌 Xu			       
                           </td>
                           <td style="width: 50%;">
                              HO   
                           </td>
                       </tr>
                        <tr>
                           <td style="width: 50%;">
                             戌 Xu			       
                           </td>
                           <td style="width: 50%;">
                              HO   
                           </td>
                       </tr>
                       <tr>
                           <td style="width: 50%;">
                             戌 Xu			       
                           </td>
                           <td style="width: 50%;">
                              HO   
                           </td>
                       </tr>
                   </table>
               </td>
               @endfor
            </tr>
            
        </table>
        
        
    </div>
       


</div>
@endsection