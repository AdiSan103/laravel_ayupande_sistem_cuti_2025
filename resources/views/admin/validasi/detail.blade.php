@extends('admin.template')

@section('main')
<section class="section">
    <div class="card">
      <div class="card-header">
          <h5 class="card-title">
              DATA CUTI {{$items->pengguna->nama}}
          </h5>
      </div>
      <form  action="/a/validasi/{{$items->id}}/updated" method="POST"   class="card-body">
         @csrf
        <div class="row gap-2">
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'NO SURAT',
                'type' => 'text',
                'another_old_input' => $items->no_surat
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'NIP',
                'type' => 'text',
                'another_old_input' => $items->pengguna->nip
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'NAMA',
                'type' => 'text',
                'another_old_input' => $items->pengguna->nama
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'Jabatan',
                'type' => 'text',
                'another_old_input' => $items->pengguna->jabatan
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'MASA KERJA',
                'type' => 'text',
                'another_old_input' => $items->pengguna->masa_kerja
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'JENIS CUTI',
                'type' => 'text',
                'another_old_input' => $items->JenisCuti->nama_cuti
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'TELP',
                'type' => 'text',
                'another_old_input' => $items->pengguna->telp
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'ALAMAT SELAMA CUTI',
                'type' => 'text',
                'another_old_input' => $items->alamat
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'ALASAN',
                'type' => 'text',
                'another_old_input' => $items->alasan
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'MASA CUTI',
                'type' => 'text',
                'another_old_input' => $items->lama_hari . ' hari'
              ])
            </div>
            <div class="col-12">
              <a href="/{{$items->file_pendukung}}" target="_blank" class="btn btn-outline-secondary btn-block btn-lg shadow-lg mb-5 mt-5" type="submit">
                Lihat File Pendukung
              </a>
            </div>
            <div class="col-12">
              <a href="/{{$items->file_sudah_ttd}}" target="_blank" class="btn btn-outline-secondary btn-block btn-lg shadow-lg mb-5" type="submit">
                Lihat File dengan TTD Basah
              </a>
            </div>
            <div class="col-12">
              @include('components.select',[
                'title' => 'Status',
                'name' => 'status',
                'items' => $list_status,
                'another_old_input' => $items->status,
                'id' => 'id',
                'item_label' => 'name'
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => '',
                'name' => 'catatan_admin',
                'error_name' => 'catatan_admin',
                'title' => 'CATATAN ADMIN',
                'type' => 'text',
                'another_old_input' => $items->catatan_admin
              ])
            </div>
        </div>
           <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">
           PERBAHARUI STATUS CUTI
        </button>
      </form>
    </div>
</section>
@endsection