@extends('layouts.feature')
@section('container')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>List Dosen Universitas Sebelas Maret</h3>
                <a href="./tambahDosenUniv" class="btn btn-success btn-md mb-1">Tambah Dosen</a>
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
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->fakultas_name }}</td>
                                            <td>{{ $user->prodi_name }}</td>                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->id_scholar }}</td>
                                            <td>{{ $user->id_scopus }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-md mb-1">Edit</a>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
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