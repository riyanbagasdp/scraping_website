@extends('layouts.sidebarfakul')
@section('container')
<div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <h3>Tambah Admin Prodi</h3>
        </div>
        <div class="page-content">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form id="dosenForm" method="POST" enctype="multipart/form-data" action="{{ route('user.store5') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="name">Nama Admin</label>
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        placeholder="Nama Admin">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="prodi">Program Studi</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="prodi" name="prodi">
                                                            @foreach($prodis as $prodiItem)
                                                                <option value="{{ $prodiItem->id }}">{{ $prodiItem->prodi_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" class="form-control"
                                                        placeholder="Email" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" class="form-control" placeholder="Password"
                                                        name="password">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="usertype">Status</label>
                                                    <input type="text" id="usertype" name="usertype" class="form-control"
                                                        placeholder="Nama Admin Fakultas" value="admin_prodi" readonly>
                                                </div>
                                            </div>
                                        
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" name="user" class="btn btn-primary me-1 mb-1">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
        @endsection