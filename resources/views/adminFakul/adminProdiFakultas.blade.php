@extends('layouts.sidebarfakul')
@section('container')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>List Admin Prodi Fakultas ...</h3>
                <a href="./tambahAdminProdiFakultas" class="btn btn-success btn-md mb-1">Tambah Admin Prodi</a>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user5)
                                        <tr>
                                            <td>{{ $user5->name }}</td>
                                            <td>{{ $user5->prodi }}</td>
                                            <td>{{ $user5->email }}</td>
                                            <td>
                                                <a href="{{ route('user5.edit5', $user5->id) }}" class="btn btn-primary btn-md mb-1">Edit</a>
                                                <form action="{{ route('user5.destroy5', $user5->id) }}" method="POST" style="display:inline;">
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