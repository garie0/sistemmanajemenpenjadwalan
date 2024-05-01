@extends('layouts.user')
@section('contents')
<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0"><a href="{{ route('user/pengguna/ShowMatkul') }}">Mata Kuliah</a></h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <a href="{{ route('user/pengguna/ShowMatkul') }}" style="text-decoration: none; color: inherit;">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0"><a href="{{ route('user/pengguna/IndexJadwal') }}">Jadwal</a></h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <a href="{{ route('user/pengguna/IndexJadwal') }}" style="text-decoration: none; color: inherit;">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection