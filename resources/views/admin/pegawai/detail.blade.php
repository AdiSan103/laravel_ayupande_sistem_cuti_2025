@extends('admin.template')

@section('main')
<div class="card">
  <div class="card-body">
    <form action="/a/pegawai/{{$user->id}}/updated" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="row gap-2">
          <div class="col-12">
            @include('components.input_image',[
              'name' => 'foto',
              'title' => 'Foto',
              'another_old_input' => '/' . $user->foto,
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => 'disabled',
              'name' => 'nip',
              'error_name' => 'nip',
              'title' => 'NIP',
              'type' => 'text',
              'another_old_input' =>$user->nip
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => 'disabled',
              'name' => 'email',
              'error_name' => 'email',
              'title' => 'EMAIL',
              'type' => 'email',
              'another_old_input' => $user->email
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'tanggal_lahir',
              'error_name' => 'tanggal_lahir',
              'title' => 'TANGGAL LAHIR',
              'type' => 'date',
              'another_old_input' => $user->tanggal_lahir
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'tempat_lahir',
              'error_name' => 'tempat_lahir',
              'title' => 'TEMPAT LAHIR',
              'type' => 'text',
              'another_old_input' => $user->tempat_lahir
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'nama',
              'error_name' => 'nama',
              'title' => 'NAMA',
              'type' => 'text',
              'another_old_input' => $user->nama
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'telp',
              'error_name' => 'telp',
              'title' => 'NO.TELP',
              'type' => 'text',
              'another_old_input' => $user->telp
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'jabatan',
              'error_name' => 'jabatan',
              'title' => 'JABATAN',
              'type' => 'text',
              'another_old_input' => $user->jabatan
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'title',
              'error_name' => 'title',
              'title' => 'MASA KERJA (hari)',
              'type' => 'number',
              'another_old_input' => $user->masa_kerja
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'password',
              'error_name' => 'password',
              'title' => 'GANTI PASSWORD BARU',
              'type' => 'password',
              'another_old_input' => ''
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'password_confirmation',
              'error_name' => 'password_confirmation',
              'title' => 'KONFIRMASI PASSWORD BARU',
              'type' => 'password',
              'another_old_input' => ''
            ])
          </div>
        </div>
          <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">
           SIMPAN PERBAHARUI DATA
        </button>
    </form>
  </div>
</div>
@endsection

@section('js')
 <script src="/srcadmin/js/input_image.js"></script>
 <script src="/assets/extensions/jquery/jquery.min.js"></script>
@endsection