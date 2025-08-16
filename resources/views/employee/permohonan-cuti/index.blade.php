@extends('employee.template')
@section('css')
<link
  rel="stylesheet"
  href="/assets/extensions/summernote/summernote-lite.css"
/>

<link
  rel="stylesheet"
  href="/assets/compiled/css/form-editor-summernote.css"
/>
@endsection

@section('main')
<div class="card">
  <div class="card-body">
    <form action="/p/" method="POST">
        @csrf
        <div class="row gap-2">
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'title',
              'error_name' => 'title',
              'title' => 'title',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
          <div class="row">
            <div class="col-4">
              @include('components.input',[
                'attribute' => '',
                'name' => 'title',
                'error_name' => 'title',
                'title' => 'title',
                'type' => 'date',
                'another_old_input' => ''
              ])
            </div>
            <div class="col-4">
              @include('components.input',[
                'attribute' => '',
                'name' => 'title',
                'error_name' => 'title',
                'title' => 'title',
                'type' => 'date',
                'another_old_input' => ''
              ])
            </div>
            <div class="col-4">
              @include('components.input',[
                'attribute' => '',
                'name' => 'title',
                'error_name' => 'title',
                'title' => 'title',
                'type' => 'text',
                'another_old_input' => ''
              ])
            </div>
          </div>
          <div class="col-12">
            @include('components.textarea',[
              'attribute' => '',
              'name' => 'description',
              'error_name' => 'description',
              'title' => 'Description Class',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
          <div class="col-12">
          @include('components.select',[
            'title' => 'Pilih Kategori',
            'name' => 'id_project_categories',
            'items' => $categories,
            'another_old_input' => '',
            'id' => 'id_project_categories'
          ])
        </div>
        <div class="col-12">
          @include('components.select',[
            'title' => 'Pilih Kategori',
            'name' => 'id_project_categories',
            'items' => $categories,
            'another_old_input' => '',
            'id' => 'id_project_categories'
          ])
        </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
          Simpan Data
        </button>
    </form>
  </div>
</div>
@endsection

@section('js')
 <script src="/assets/extensions/jquery/jquery.min.js"></script>
 <script src="/assets/extensions/summernote/summernote-lite.min.js"></script>
 <script src="/assets/static/js/pages/summernote.js"></script>
@endsection