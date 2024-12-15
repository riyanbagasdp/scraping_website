@extends('layouts.sidebaruniv')
@section('container')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>List Admin Prodi</h3>
                <a href="./tambahAdminProdiUniv" class="btn btn-success btn-md mb-1">Tambah Admin Prodi</a>
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
                                        @foreach ($users as $user3)
                                        <tr>
                                            <td>{{ $user3->name }}</td>
                                            <td>{{ $user3->prodi_name }}</td>
                                            <td>{{ $user3->email }}</td>
                                            <td>
                                                <a href="{{ route('user3.edit3', $user3->id) }}" class="btn btn-primary btn-md mb-1">Edit</a>
                                                <form action="{{ route('user3.destroy3', $user3->id) }}" method="POST" style="display:inline;">
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