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
                                            <th>Program Studi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Guruh</td>
                                            <td>Pendidikan Teknik Informatika dan Komputer</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="./editAdminProdiFakultas.html" class="btn btn-primary btn-md mb-1">Edit</a>
                                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sanji</td>
                                            <td>Pendidikan Teknik Informatika dan Komputer</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="./editAdminProdiFakultas.html" class="btn btn-primary btn-md mb-1">Edit</a>

                                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

        </div>
        @endsection