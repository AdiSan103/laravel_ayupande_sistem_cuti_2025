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
    <form action="/e/permohonan-cuti/save" method="POST">
        @csrf
        <div class="row gap-2">
          <div class="col-12">
            @include('components.select',[
              'title' => 'jenis cuti',
              'name' => 'jenis_cuti',
              'items' => $jenis_cuti,
              'another_old_input' => '',
              'id' => 'id',
              'item_label' => 'nama_cuti'
            ])
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'alasan',
              'error_name' => 'alasan',
              'title' => 'Alasan',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
          <div class="row">
            <div class="col-4">
              @include('components.input',[
                'attribute' => '',
                'name' => 'tgl_awal',
                'error_name' => 'tgl_awal',
                'title' => 'Tgl Awal',
                'type' => 'date',
                'another_old_input' => ''
              ])
            </div>
            <div class="col-4">
              @include('components.input',[
                'attribute' => '',
                'name' => 'tgl_akhir',
                'error_name' => 'tgl_akhir',
                'title' => 'Tgl Akhir',
                'type' => 'date',
                'another_old_input' => ''
              ])
            </div>
            <div class="col-4">
              @include('components.input',[
                'attribute' => '',
                'name' => 'lama_cuti',
                'error_name' => 'lama_cuti',
                'title' => 'Lama Hari',
                'type' => 'text',
                'another_old_input' => ''
              ])
            </div>
          </div>
          <div class="col-12">
            @include('components.input',[
              'attribute' => '',
              'name' => 'alamat',
              'error_name' => 'alamat',
              'title' => 'Alamat',
              'type' => 'text',
              'another_old_input' => ''
            ])
          </div>
          <div class="col-12">
            @include('components.select',[
              'title' => 'Verifikasi 1',
              'name' => 'verifikasi_user_1',
              'items' => $verifikator,
              'another_old_input' => 'verifikasi_user_1',
              'id' => 'id',
              'item_label' => 'nama'
            ])
          </div>
          <div class="col-12">
            @include('components.select',[
              'title' => 'Verifikasi 2',
              'name' => 'verifikasi_user_2',
              'items' => $verifikator,
              'another_old_input' => 'verifikasi_user_2',
              'id' => 'id',
              'item_label' => 'nama'
            ])
          </div>
          <div class="col-12">
            <div class="form-check">
                <div class="checkbox">
                    <input type="checkbox" class="form-check-input" id="verifikasi_bupati" name="verifikasi_bupati">
                    <label for="verifikasi_bupati">Dengan Persetujuan Bupati</label>
                </div>
            </div>
          </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">
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

<script>
    const tglAwal = document.querySelector('[name="tgl_awal"]');
    const tglAkhir = document.querySelector('[name="tgl_akhir"]');
    const totalDate = document.querySelector('[name="lama_cuti"]');

    function hitungHari() {
        if (tglAwal.value && tglAkhir.value) {
            const start = new Date(tglAwal.value);
            const end = new Date(tglAkhir.value);

            const selisih = end - start;

            if (selisih >= 0) {
                const hari = (selisih / (1000 * 60 * 60 * 24)) + 1;
                totalDate.value = hari + " hari";
            } else {
                alert('Tanggal Awal Cuti kurang dari Tanggal Akhir Cuti!')
                totalDate.value = "Tanggal Salah!";
            }
        }
    }

    tglAwal.addEventListener('change', hitungHari);
    tglAkhir.addEventListener('change', hitungHari);
</script>
@endsection