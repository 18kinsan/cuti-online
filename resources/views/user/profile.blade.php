@extends('layouts.appuser')

@section('profil', 'active')

@section('title', 'Profile | ' . Auth::user()->nama)
@section('title2', 'Profil ' . Auth::user()->nama)

@section('content')
<div class="row">
      <div class="col-md-10 col-md-offset-1">
          <div class="card" style="padding: 20px">
              <div class="header">
                  <h4 class="title" style="display: inline">EDIT PROFIL</h4>
              </div>
              <div class="content">
                    @if(session('status_success'))
                    <div class="alert alert-success">
                        {{session('status_success')}}
                    </div>
                    @endif
                    @if(session('status_fail'))
                    <div class="alert alert-danger">
                        {{session('status_fail')}}
                    </div>
                    @endif
                  <form action="{{route('pegawai.profil.edit')}}" method="POST">
                      <div class="row">
                          <div class="form-group col-md-12">
                                  <label>Nama Lengkap</label>
                              <input type="text" class="form-control" placeholder="Nama Lengkap" value="{{$user->nama}}" disabled>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 ">
                              <div class="form-group">
                                  <label>Jabatan</label>
                                  <input type="text" class="form-control" placeholder="Jabatan" value="{{$user->jabatan}}" disabled>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Nip</label>
                                  <input type="text" class="form-control" placeholder="NIP" value="{{$user->nip}}" disabled>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Atasan 1</label>
                                  <input type="text" class="form-control" placeholder="Atasan 1" value="{{$atasan1}}" disabled>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Atasan 2</label>
                                  <input type="text" class="form-control" placeholder="Atasan 2" value="{{$atasan2}}" disabled>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                                <label>Masa Kerja</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" value="{{substr($user->tgl_masuk,0,4)}}" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" oninvalid="this.setCustomValidity('Gunakan email yang valid / Email yang sesuai format')" oninput="this.setCustomValidity('')" value="{{$user->email}}">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-md-12">
                                  <label for="pwd">Password Baru</label>
                                  <input type="password" class="form-control" name="password" id="pwd">
                          </div>
                      </div>

                      <div class="row">
                          <div class="form-group col-md-12">
                                  <label for="pwd">Ulangi Password Baru</label>
                                  <input type="password" class="form-control" name="password_confirmation" id="pwd">
                          </div>
                      </div>
                      <br>

                      <button type="submit" class="btn btn-info btn-fill pull-right">Perbarui</button>
                      <div class="clearfix"></div>
                      @csrf
                  </form>
              </div>
          </div>
      </div>
@stop

@push('scripts')

@endpush
