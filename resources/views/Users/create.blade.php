@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<link rel="stylesheet" href="croppie.css" />
<script src="croppie.js"></script>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="mt-3 mb-3 d-flex align-item-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="20" height="20">
                        <path fill="#dee2e6"
                            d="M2 4v14h14v-6l2-2v10H0V2h10L8 4H2zm10.3-.3l4 4L8 16H4v-4l8.3-8.3zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z" />
                    </svg>
                    <h6 class="text-muted ml-3">
                        Biodata Siswa
                    </h6>
                </div>
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="alamat" placeholder="alamat" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="phone" placeholder="+62" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="text" name="kelas" placeholder="Kelas" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <input type="file" id="image" name="image" placeholder="Kelas" class="form-control" required>
                               
                              </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <select name="roles" id="roles" class="form-control">
                                    <option value="">Pleace select one</option>
                                    @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 mb-3 d-flex align-item-center">
                        <button type="submit" class="btn btn-outline-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="add-user-6" data-name="Flat Color" class="icon flat-color">

                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                
                                <g id="SVGRepo_iconCarrier">
                                
                                <path id="secondary" d="M19,8a1,1,0,0,1-1-1V6H17a1,1,0,0,1,0-2h1V3a1,1,0,0,1,2,0V4h1a1,1,0,0,1,0,2H20V7A1,1,0,0,1,19,8Z" style="fill: #2ca9bc;"/>
                                <path id="primary" d="M14.9,12.55A6,6,0,0,0,17,8.5a4.5,4.5,0,0,1-2.47-4,4.45,4.45,0,0,1,.19-1.22A6,6,0,0,0,7.1,12.55,8,8,0,0,0,2,20a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2A8,8,0,0,0,14.9,12.55Z" style="fill: #000000;"/>
                                
                                </g>
                                
                                </svg>
                            Simpan data
                        </button>
                    </div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
              </form>
            </div>
        </div>
    </div>
</div>
<style>
    /* Make sure the size of the image fits perfectly into the container */
img {
  display: block;

  /* This rule is very important, please don't ignore this */
  max-width: 100%;
}
</style>

@endsection

