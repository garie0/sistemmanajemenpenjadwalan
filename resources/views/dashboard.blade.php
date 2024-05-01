@extends('layouts.main')

@section('main')
<div class="row">
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0"><a href="{{ route('admin/users') }}">User</a></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <a href="{{ route('admin/users') }}" style="text-decoration: none; color: inherit;">
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
              <h3 class="mb-0"><a href="{{ route('admin/matkuls') }}">Mata Kuliah</a></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <a href="{{ route('admin/matkuls') }}" style="text-decoration: none; color: inherit;">
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
              <h3 class="mb-0"><a href="{{ route('admin/jadwals') }}">Jadwal</a></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <a href="{{ route('admin/jadwals') }}" style="text-decoration: none; color: inherit;">
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