@extends('layouts.sidebarprodi')
@section('container')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>List Dosen Program Studi ...</h3>
                <a href="./tambahDosenProdi" class="btn btn-success btn-md mb-1">Tambah Dosen</a>
            </div>
            <div class="page-content">
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Fakultas</th>
                                            <th>Program Studi</th>
                                            <th>Email</th>
                                            <th>ID Scholar</th>
                                            <th>ID Scopus</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user6)
                                        <tr>
                                            <td>{{ $user6->name }}</td>
                                            <td>{{ $user6->fakultas }}</td>
                                            <td>{{ $user6->prodi }}</td>
                                            <td>{{ $user6->email }}</td>
                                            <td>{{ $user6->id_scholar }}</td>
                                            <td>{{ $user6->id_scopus }}</td>
                                            <td>
                                                <a href="{{ route('user6.edit6', $user6->id) }}" class="btn btn-primary btn-md mb-1">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
        @endsection