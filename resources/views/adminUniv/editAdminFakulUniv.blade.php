@extends('layouts.feature')
@section('container')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Edit Admin Fakultas</h3>
            </div>
            <div class="page-content">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <form class="form" action="{{ route('user2.update2', $user2->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="name">Nama Dosen</label>
                                                        <input type="text" id="name" class="form-control"
                                                            placeholder="Nama Dosen" name="name" value="{{ old('name', $user2->name) }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="fakultas">Fakultas</label>
                                                        <select class="form-select" id="fakultas" name="fakultas">
                                                            @foreach($fakultas as $fakultasItem)
                                                                <option value="{{ $fakultasItem->id }}" {{ $fakultasItem->id == $user2->fakultas ? 'selected' : '' }}>
                                                                    {{ $fakultasItem->fakultas_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" class="form-control"
                                                            placeholder="Email" name="email" value="{{ old('email', $user2->email) }}">
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