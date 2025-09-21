@extends('admin.template')

@section('css')
<link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="/assets/compiled/css/table-datatable.css">
@endsection

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    DATA CUTI SEDANG DI PROSES - PEGAWAI DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN BADUNG
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>TANGGAL DIBUAT</th>
                            <th>NAMA</th>
                            <th>TANGGAL AWAL CUTI</th>
                            <th>TANGGAL AKHIR CUTI</th>
                            <th>LAMA CUTI</th>
                            <th>JENIS CUTI</th>
                            <th>UPLOAD VERIFIKASI</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->pengguna->nip }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>{{ $item->pengguna->nama }}</td>
                            <td>{{ $item->tgl_awal}}</td>
                            <td>{{$item->tgl_akhir}}</td>
                            <td>{{$item->lama_hari}}</td>
                            <td>{{$item->jenisCuti->nama_cuti}}</td>
                            <td>
                              <a href="/a/validasi/{{$item->id}}" class="btn btn-outline-secondary btn-block btn-lg shadow-lg">
                                DETAIL
                              </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection

@section('js')
<script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="/assets/static/js/pages/simple-datatables.js"></script>
@endsection