@extends('layouts.app')

@section('setting')
active
@stop

@section('title')
<h4 class="title" style="font-family: sans-serif; margin-top: 16px; margin-left:7px;">Pengaturan</h4>
@stop

@section('modal1')
<div class="modal fade modal-mini modal-primary" id="myModal1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="content">
                    <form enctype="multipart/form-data" action="{{route('pengaturan.edit')}}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="text-align:center">Edit Maksimal Cuti</h4>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Maksimal Cuti</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Maksimal Cuti" name="maks" required>
                                    <button style="font-size: 13px; margin-left:81%; margin-bottom:5%; margin-top:3%; font-weight: bold" class="btn btn-primary btn-fill"><i class="fa fa-save"></i> &nbsp; Simpan</button>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')


<!-- <div class="col-md-3">
   <div class="card"> -->
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <br>

                <h5 class="title" style="text-align: center;">Maksimal Cuti Tahunan <br> <br> </h5>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="border: none; ">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align:center; color: blue; font-weight: bold; font-size: 50px">{{$maks}}</li>
                        </ul>
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="row text-center" style="padding-bottom: 20px">
                  <button data-id=" " class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModal1"><i class="fa fa-edit"></i> &nbsp; Edit</button>
                </div>
            </div>



        </div>

    </div>

</div>
<!-- </div>
</div> -->





@stop

@push('scripts')
<script type="text/javascript">



</script>


@endpush
