@extends('layouts.app')

@section('setting')
active
@stop

@section('title')
   <h4 class="title" style="margin-top: 15px">Edit Pengaturan</h4>

@stop

@section('content')

<div class="content">
      
       
           <div class="row">

          
              <div class="col-md-3">
              <div class="card">
              <br>

              <h5 class="title" style="text-align: center;">Maksimal Cuti Tahunan : <br> <br> </h5>
              
                   <div class="card" style="width: 20rem; border: none; margin-left:12%; ">
                      <ul class="list-group list-group-flush">
                     
                      <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Masukkan Maksimal Cuti">


                          
                      </ul>

                   </div>
                   <a href="" class="btn btn-primary btn-fill " style="margin-left:35%; margin-bottom:10%;">Simpan</a>
                   </div>
               
               </div>
               
           </div>
          
       </div>

@stop

@push('scripts')

@endpush
