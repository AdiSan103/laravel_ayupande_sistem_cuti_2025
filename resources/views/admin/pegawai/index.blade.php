@extends('admin.template')

@section('main')
<div class="card">
  <div class="card-body">
    <h3>Data Pegawai</h3>
    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>NAMA</th>
                <th>JABATAN</th>
                <th>TELP</th>
                <th>EMAIL</th>
                <th>MASA KERJA</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
          @foreach($users as $item)
            <tr>
              <td>{{$item->nama}}</td>
              <td>{{$item->jabatan}}</td>
              <td>{{$item->telp}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->masa_kerja}}</td>
              <td>
                <a href="/a/pegawai/{{$item->id}}" class="btn btn-outline-secondary btn-block btn-lg shadow-lg">DETAIL</a>
              </td>
            </tr>
          @endforeach
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
