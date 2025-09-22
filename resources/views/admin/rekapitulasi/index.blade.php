<?php
use App\Models\CutiModel;
use App\Models\JatahCutiModel;
use Carbon\Carbon;

function totalCuti($user) {
    return CutiModel::where('id_user', $user->id)->count();
}

function totalJatahCuti($user) {
    $tahunSekarang = Carbon::now()->year;

    $totalJatahCuti = JatahCutiModel::where('id_user', $user->id)
        ->where('tahun', $tahunSekarang)
        ->value('jatah_cuti') ?? 0;

    $jumlahTahunLain = JatahCutiModel::where('id_user', $user->id)
        ->where('tahun', '!=', $tahunSekarang)
        ->count();

    $totalJatahCuti += ($jumlahTahunLain * 6);

    return $totalJatahCuti;
}

function totalSisaCuti($user) {
    $totalCuti = totalCuti($user);
    $totalSemuaJatah = JatahCutiModel::where('id_user', $user->id)->sum('jatah_cuti');
    return $totalSemuaJatah - $totalCuti;
}

function totalPending($user) {
    return CutiModel::where('id_user', $user->id)
        ->where('status', 'pending')
        ->count();
}
?>


in php

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
                <th>TOTAL CUTI</th>
                <th>TOTAL JATAH CUTI</th>
                <th>TOTAL SISA CUTI</th>
                <th>TOTAL PENDING</th>
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
              <td>{{ totalCuti($item) }}</td>
              <td>{{ totalJatahCuti($item) }}</td>
              <td>{{ totalSisaCuti($item) }}</td>
              <td>{{ totalPending($item) }}</td>
              <td>
                <a href="/a/rekapitulasi/{{$item->id}}" class="btn btn-outline-secondary btn-block btn-lg shadow-lg">DETAIL</a>
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
