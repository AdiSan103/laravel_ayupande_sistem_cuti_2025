@extends('employee.template')

@section('main')
<div class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon purple mb-2">
                            <i class="iconly-boldShow"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Pengajuan Cuti</h6>
                        <h6 class="font-extrabold mb-0">{{$totalCuti}}</h6>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card"> 
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon blue mb-2">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Jumlah Jatah Cuti</h6>
                        <h6 class="font-extrabold mb-0">{{$totalJatahCuti}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon green mb-2">
                            <i class="iconly-boldAdd-User"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Sisa Cuti</h6>
                        <h6 class="font-extrabold mb-0">{{$totalSisaCuti}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon red mb-2">
                            <i class="iconly-boldBookmark"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Diproses</h6>
                        <h6 class="font-extrabold mb-0">{{$totalPending}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Title -->

<!-- ROW: Requirement Cards -->

<div class="row">
    <!-- content left -->
    <div class="col-lg-6 col-12">
        <!-- Kelola Cuti -->
        <h3 class="section-title mb-3">Syarat Permohonan Cuti</h3>
        <div class="row">
            <!--  -->
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cuti Tahunan</h4>
                    </div>
                    <div class="card-body">

                        <!-- Button trigger for basic modal -->
                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                            data-bs-target="#default1">
                            Buka
                        </button>

                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default1" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Cuti Tahunan</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
      <ul>
                <li>Pemohon tersebut berhak atas cuti tahunan setelah menjalani kerja sekurang-kurangnya 1 tahun, contohnya CPNS dan PPPK tidak boleh mengambil cuti tahunan apabila masa kerjanya belum 1 tahun, kecuali dalam kondisi yang sangat mendesak.</li>
                <li>Pengambilan cuti tidak melebihi batas jatah cuti tahunan.</li>
                <li>Pemohon mengisi kelengkapan data di Surat Cuti.</li>
                </ul>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Accept</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!--  -->
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cuti Sakit</h4>
                    </div>
                    <div class="card-body">

                        <!-- Button trigger for basic modal -->
                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                            data-bs-target="#default2">
                            Buka
                        </button>

                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default2" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Cuti Sakit</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ol>
                                        <li>
                                            Melampirkan Surat Keterangan Sakit dari Dokter/Klinik ataupun dari Rumah Sakit.  
                                            Untuk kondisi sakit, jika pegawai tersebut hanya sakit dalam 1 hari maka tidak perlu menggunakan surat cuti, 
                                            hanya melampirkan surat keterangan sakit dari Dokter/Klinik ataupun dari Rumah Sakit.  
                                            Jika lebih dari 1 hari harus membuat surat cuti sakit.
                                        </li>
                                        <li>Pemohon mengisi kelengkapan data di Surat Cuti.</li>
                                        </ol>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Accept</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!--  -->
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cuti Melahirkan</h4>
                    </div>
                    <div class="card-body">

                        <!-- Button trigger for basic modal -->
                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                            data-bs-target="#default3">
                            Buka
                        </button>

                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default3" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Cuti Melahirkan</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <ol>
                                    <li>
                                        Cuti melahirkan hanya diberikan kepada pegawai perempuan yang sedang hamil dan akan melahirkan.
                                    </li>
                                    <li>
                                        Pegawai ASN mendapatkan jatah cuti melahirkan selama 3 bulan.  
                                        Cuti melahirkan bisa diambil sebelum melahirkan, misalnya idealnya 1 bulan sebelum hari perkiraan lahir (HPL) 
                                        atau atas pertimbangan medis, dengan syarat melampirkan surat keterangan hamil dari Dokter/Klinik ataupun Rumah Sakit.  
                                        Setelah melahirkan, pegawai ASN wajib menyerahkan Surat Keterangan Melahirkan dari Dokter untuk diserahkan ke bagian Kepegawaian.
                                    </li>
                                    <li>
                                        Pemohon mengisi kelengkapan data di Surat Cuti.
                                    </li>
                                    </ol>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Accept</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!--  -->
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cuti Karena Alasan Penting</h4>
                    </div>
                    <div class="card-body">

                        <!-- Button trigger for basic modal -->
                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                            data-bs-target="#default4">
                            Buka
                        </button>

                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default4" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Cuti Karena Alasan Penting</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <ol>
                                            <li>
                                                Pegawai ASN berhak untuk cuti karena alasan penting apabila:
                                                <ul>
                                                <li>
                                                    Keluarga sakit keras atau menemani keluarga rawat inap dengan melampirkan Surat Keterangan Rawat Inap dari Rumah Sakit.
                                                </li>
                                                <li>
                                                    Salah satu keluarga meninggal dunia dengan melampirkan Surat Keterangan Meninggal Dunia.
                                                </li>
                                                <li>
                                                    Melangsungkan perkawinan dengan melampirkan Surat Keterangan paling rendah dari Ketua Rukun Tetangga atau di Bali dengan Kelihan Dinas.
                                                </li>
                                                <li>
                                                    Pegawai mengalami musibah bencana alam dengan melampirkan Surat Keterangan paling rendah dari Ketua Rukun Tetangga atau di Bali dengan Kelihan Dinas.
                                                </li>
                                                </ul>
                                            </li>
                                            <li>
                                                Lamanya cuti karena alasan penting ditentukan oleh pejabat yang berwenang memberikan cuti yaitu Kepala Dinas, paling lama 1 (satu) bulan.
                                            </li>
                                            </ol>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Accept</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content right -->
    <div class="col-lg-6 col-12">
        <div class="row">
            {{-- <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile Visit</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div> --}}
            <div class="card">
                <div class="card-header">
                    <h4>Visitors Profile</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    // Profile Visit (bar chart)
    var optionsProfileVisit = {
        annotations: { position: "back" },
        dataLabels: { enabled: false },
        chart: { type: "bar", height: 300 },
        fill: { opacity: 1 },
        series: [{
            name: "sales",
            data: @json($profileVisit)
        }],
        colors: "#435ebe",
        xaxis: {
            categories: [
                "Jan","Feb","Mar","Apr","May","Jun",
                "Jul","Aug","Sep","Oct","Nov","Dec"
            ],
        },
    };

    // Visitors Profile (donut chart)
    let optionsVisitorsProfile = {
        series: @json($visitorsProfile),
        labels: ["Cuti Tahunan", "Cuti Sakit", "Cuti Melahirkan", "Cuti Alasan Penting"],
        colors: ["#ffd000", "#ff0d00", "#0037ff", "#00ffee"],
        chart: { type: "donut", width: "100%", height: "350px" },
        legend: { position: "bottom" },
        plotOptions: {
            pie: { donut: { size: "30%" } }
        }
    };

    // Base options for mini area charts
    var baseAreaOptions = {
        chart: { height: 80, type: "area", toolbar: { show: false } },
        stroke: { width: 2 },
        grid: { show: false },
        dataLabels: { enabled: false },
        xaxis: {
            type: "datetime",
            categories: [
                "2018-09-19T00:00:00.000Z","2018-09-19T01:30:00.000Z",
                "2018-09-19T02:30:00.000Z","2018-09-19T03:30:00.000Z",
                "2018-09-19T04:30:00.000Z","2018-09-19T05:30:00.000Z",
                "2018-09-19T06:30:00.000Z","2018-09-19T07:30:00.000Z",
                "2018-09-19T08:30:00.000Z","2018-09-19T09:30:00.000Z",
                "2018-09-19T10:30:00.000Z","2018-09-19T11:30:00.000Z"
            ],
            axisBorder: { show: false },
            axisTicks: { show: false },
            labels: { show: false },
        },
        yaxis: { labels: { show: false } },
        tooltip: { x: { format: "dd/MM/yy HH:mm" } },
    };

    // Europe Chart
    var optionsEurope = {
        ...baseAreaOptions,
        series: [{ name: "Europe", data: @json($europeSeries) }],
        colors: ["#5350e9"],
    };

    // America Chart
    var optionsAmerica = {
        ...baseAreaOptions,
        series: [{ name: "America", data: @json($americaSeries) }],
        colors: ["#008b75"],
    };

    // Indonesia Chart
    var optionsIndonesia = {
        ...baseAreaOptions,
        series: [{ name: "Indonesia", data: @json($indonesiaSeries) }],
        colors: ["#dc3545"],
    };

    // Render all charts
    new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit).render();
    new ApexCharts(document.querySelector("#chart-visitors-profile"), optionsVisitorsProfile).render();
    new ApexCharts(document.querySelector("#chart-europe"), optionsEurope).render();
    new ApexCharts(document.querySelector("#chart-america"), optionsAmerica).render();
    new ApexCharts(document.querySelector("#chart-indonesia"), optionsIndonesia).render();
</script>
@endpush