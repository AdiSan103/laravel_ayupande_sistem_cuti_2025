@extends('employee.template')

@section('main')
<section class="section">
    <div class="card">
      <div class="card-header">
          <h5 class="card-title">
              DATA CUTI ANDA
          </h5>
      </div>
      <div class="card-body">
        <div class="row gap-2">
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'NIP',
                'type' => 'text',
                'another_old_input' => $items->user->nip
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'NAMA',
                'type' => 'text',
                'another_old_input' => $items->user->nama
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'Jabatan',
                'type' => 'text',
                'another_old_input' => $items->user->jabatan
              ])
            </div>
            <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'MASA KERJA',
                'type' => 'text',
                'another_old_input' => $items->user->masa_kerja
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
                'another_old_input' => $items->user->telp
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
                'title' => 'MASA CUTI',
                'type' => 'text',
                'another_old_input' => $items->lama_hari . ' hari'
              ])
            </div>
            <div class="col-12">
              @include('components.input_image',[
                'name' => 'file_cuti_pendukung',
                'title' => 'File Pendukung',
                'another_old_input' => '',
              ])
              <a href="#" target="_blank" class="btn btn-outline-secondary btn-block btn-lg shadow-lg mb-5" type="submit">
                Lihat File Pendukung
              </a>
            </div>
            <div class="col-12">
              @include('components.input_image',[
                'name' => 'file_cuti_ttd_basah',
                'title' => 'File Cuti dengan Tanda Tangan Basah',
                'another_old_input' => '',
              ])
              <a href="#" target="_blank" class="btn btn-outline-secondary btn-block btn-lg shadow-lg mb-5" type="submit">
                Lihat File dengan TTD Basah
              </a>
            </div>
               <div class="col-12">
              @include('components.input',[
                'attribute' => 'disabled',
                'name' => '',
                'error_name' => '',
                'title' => 'CATATAN ADMIN',
                'type' => 'text',
                'another_old_input' => ''
              ])
            </div>
        </div>
           <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">
           SIMPAN PERBAHARUI DATA
        </button>
      </div>
    </div>
</section>
@endsection