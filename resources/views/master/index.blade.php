@extends('layouts.app')
@section('header')
@parent
@stop   
@section('content') 

<div class="row" >          
    <div class="inner">
        <h1>Bazi Astrology</h1>
        <br><br>
        <form>
            <div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Full-Name</label>
                    <input type="text" class="form-control" style="width:90%;" name="txtFullNm">
                </div>
            </div>      
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Birth-Date</label>
                    <input type="text" name="txtBirthDate" class="form-control" id="datepicker" style="background-color:white;">   
                </div>
                <div class="form-group col-md-6">
                    <label>Time</label>
                    <br>
                    <table style="width:80%;" border="1">
                        <tr>
                            <td> 
                                <select name="txtH" style="width:90%;height: 40px;text-align: center;">
                                    <option selected value="">H</option>
                                    @for ($i = 0; $i < 13; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>  
                            </td>
                            <td>
                                <select name="txtM" style="width:90%;height: 40px;text-align: center;">
                                    <option selected value="">M</option>
                                    @for ($i = 0; $i < 60; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>  
                            </td>
                            <td> : </td>
                            <td> 

                                <select id="txtTime"  style="width:90%;height: 40px;text-align: center;">
                                    <option selected value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Country</label>
                    <select id="Country"  class="form-control" style="text-align: center;">
                        <option selected value="">..Choose Country</option>
                        <option value="">..</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Gender</label>
                    <br>
                    <table style="width:40%;">
                        <tr>
                            <td>
                                <input type="radio" name="sex" value="m"> Male
                            </td>
                            <td>
                                <input type="radio" name="sex" value="f"> Female
                            </td>
                        </tr>
                    </table>                                  
                </div>
                
             
            
                
            </div>
           
              <center> 
                <button type="submit" style="width:250px;" class="btn btn-primary">Send</button>
            </center>
                
            </div>
            
        </form>
    </div>
</div>
@endsection