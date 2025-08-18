@extends('admin.template')

@section('main')
<div class="card">
  <div class="card-body">
    <h3>Data Pegawai</h3>
    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Bidang</th>
                <th>NO.Telp</th>
                <th>Email</th>
                <th>Status</th>
                <th>Masa Kerja</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td></td>
            </tr>
        </tbody>
    </table>
  </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="/assets/compiled/css/table-datatable.css">
@endsection

@section('js')
<script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="/assets/static/js/pages/simple-datatables.js"></script>
@endsection
