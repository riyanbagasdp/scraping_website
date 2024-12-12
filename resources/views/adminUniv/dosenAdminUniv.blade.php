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
                                            <th>ID Scholar</th>
                                            <th>ID Scopus</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Basori</td>
                                            <td>FKIP</td>
                                            <td>Pendidikan Teknik Informatika dan Komputer</td>
                                            <td>1023310238</td>
                                            <td>1232109311</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                <a href="./editDosenUniv.html" class="btn btn-primary btn-md mb-1">Edit</a>
                                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Totok</td>
                                            <td>FKIP</td>
                                            <td>Pendidikan Teknik Informatika dan Komputer</td>
                                            <td>10123123</td>
                                            <td>12891329</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                <a href="./editDosenUniv.html" class="btn btn-primary btn-md mb-1">Edit</a>
                                                   
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