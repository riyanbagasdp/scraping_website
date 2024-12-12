@extends('layouts.feature')
@section('container')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Update Data Dosen</h3>
            </div>
            <div class="page-content">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <form class="form" action="{{ route('user.update', $user->id) }}" method="POST">
                                    @method('POST')                                            
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Nama Dosen</label>
                                                        <input type="text" id="nama-dosen" class="form-control"
                                                            placeholder="Nama Dosen" name="nama-dosen" value="{{ old('name', $user->name) }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="fakultas">Fakultas</label>
                                                        <select class="form-select" id="fakultas" name="fakultas">
                                                            <option {{ $user->fakultas == 'FKIP' ? 'selected' : '' }}>FKIP</option>
                                                            <option {{ $user->fakultas == 'FKOR' ? 'selected' : '' }}>FKOR</option>
                                                            <option {{ $user->fakultas == 'SV' ? 'selected' : '' }}>SV</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="prodi">Program Studi</label>
                                                        <select class="form-select" id="prodi" name="prodi">
                                                            <option {{ $user->prodi == 'PTIK' ? 'selected' : '' }}>PTIK</option>
                                                            <option {{ $user->prodi == 'PTM' ? 'selected' : '' }}>PTM</option>
                                                            <option {{ $user->prodi == 'PTB' ? 'selected' : '' }}>PTB</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" class="form-control"
                                                            placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
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
                                                        <label for="id-scholar">ID Scholar</label>
                                                        <input type="text" id="id-scholar" class="form-control"
                                                            name="id-scholar" placeholder="ID Scholar" value="{{ old('id_scholar', $user->id_scholar) }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="id-scopus">ID Scopus</label>
                                                        <input type="text" id="id-scopus" class="form-control"
                                                            name="id-scopus" placeholder="ID Scopus" value="{{ old('id_scopus', $user->id_scopus) }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
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