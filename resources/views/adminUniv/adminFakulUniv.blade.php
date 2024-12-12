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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Guruh</td>
                                            <td>FKIP</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="./editAdminFakulUniv.html" class="btn btn-primary btn-md mb-1">Edit</a>
                                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sanji</td>
                                            <td>FKIP</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="./editAdminFakulUniv.html" class="btn btn-primary btn-md mb-1">Edit</a>

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