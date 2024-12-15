@extends('layouts.sidebaruniv')
@section('container')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>List Admin Fakultas</h3>
                <a href="./tambahAdminFakulUniv" class="btn btn-success btn-md mb-1">Tambah Admin Fakultas</a>
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
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user2)
                                        <tr>
                                            <td>{{ $user2->name }}</td>
                                            <td>{{ $user2->fakultas_name }}</td>
                                            <td>{{ $user2->email }}</td>
                                            <td>
                                                <a href="{{ route('user2.edit2', $user2->id) }}" class="btn btn-primary btn-md mb-1">Edit</a>
                                                <form action="{{ route('user2.destroy2', $user2->id) }}" method="POST" style="display:inline;">
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