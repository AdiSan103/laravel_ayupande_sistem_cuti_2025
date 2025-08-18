@extends('employee.template')

@section('main')
<div class="card">
  <div class="card-body">
    <form action="/p/" method="POST">
        @csrf
        <div class="row gap-2">
          <div class="col-12">
            @include('components.input_image',[
              'name' => 'image_1',
              'title' => 'Main Image',
              'another_old_input' => '',
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'title',
              'error_name' => 'title',
              'title' => 'NIP',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
          <div class="col-12">
            @include('components.select',[
              'title' => 'JENIS KELAMIN',
              'name' => 'id_project_categories',
              'items' => $genders,
              'another_old_input' => '',
              'id' => 'id',
              'item_label' => 'name'
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'title',
              'error_name' => 'title',
              'title' => 'TANGGAL LAHIR',
              'type' => 'date',
              'another_old_input' => ''
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'title',
              'error_name' => 'title',
              'title' => 'NAMA',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'title',
              'error_name' => 'title',
              'title' => 'NO.TELP',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'title',
              'error_name' => 'title',
              'title' => 'EMAIL',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'title',
              'error_name' => 'title',
              'title' => 'JABATAN',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'title',
              'error_name' => 'title',
              'title' => 'MASA KERJA',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
        </div>
    </form>
  </div>
</div>
@endsection