<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Formulir Cuti Badung</title>
  <style>
    body {
      font-family: "Times New Roman", Times, serif;
      font-size: 12pt;
      margin: 0;
      padding: 0;
      background: #fff;
    }
    .sheet {
      width: 210mm;        /* lebar A4 */
      min-height: 297mm;   /* tinggi A4 */
      margin: auto;
      padding: 20mm;       /* margin dalam */
      box-sizing: border-box;
    }
    @page {
      size: A4 portrait;   /* format A4 portrait */
      margin: 20mm;        /* margin default printer */
    }
    @media print {
      body, .sheet {
        margin: 0;
        box-shadow: none;
      }
    }

    .header {
      text-align: center;
      border-bottom: 2px solid #000;
      padding-bottom: 5px;
      margin-bottom: 10px;
    }
    .header strong { font-size: 14pt; }
    .alamat { font-size: 10pt; }

    .judul {
      text-align: center;
      font-weight: bold;
      text-decoration: underline;
      margin: 10px 0;
    }
    .nomor {
      text-align: center;
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }
    table, th, td { border: 1px solid #000; }
    th, td {
      padding: 4px 6px;
      vertical-align: top;
    }
    .no-border td { border: none; }
    .center { text-align: center; }
    .section-title {
      font-weight: bold;
      background: #f9f9f9;
    }

    .sign { margin-top: 15px; }
    .sign div { margin-bottom: 40px; }
    .small { font-size: 10pt; }
  </style>
</head>
<body>
  <div class="sheet">
    <div class="header">
      <div><strong>PEMERINTAH KABUPATEN BADUNG</strong></div>
      <div><strong>DINAS KOMUNIKASI DAN INFORMATIKA BADUNG</strong></div>
      <div class="alamat">
        PUSAT PEMERINTAHAN KABUPATEN BADUNG “MANGUPRAJA MANDALA”<br>
        JL. RAYA SEMPIDI, KEL. SEMPIDI, KEC. MENGWI, KAB. BADUNG-BALI<br>
        TELP. (0361) 419888, FAX. (0361) 9066229, KODE POS 80351<br>
        Email: diskominfo@badungkab.go.id
      </div>
    </div>

    <div class="no-border">
      <table>
        <tr class="no-border">
          <td style="border:none;">Mangupura, ...................</td>
        </tr>
        <tr class="no-border">
          <td style="border:none;">Kepada<br>Yth. Kepala Dinas Komunikasi dan Informatika<br>di.<br><strong>BADUNG</strong></td>
        </tr>
      </table>
    </div>

    <div class="judul">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</div>
    <div class="nomor">Nomor : .......................................</div>

    <table>
      <tr><td class="section-title">I. DATA PEGAWAI</td></tr>
    </table>
    <table>
      <tr><td>Nama</td><td></td><td>NIP</td><td></td></tr>
      <tr><td>Jabatan</td><td></td><td>Masa Kerja</td><td>Tahun .... Bulan ....</td></tr>
      <tr><td>Unit Kerja</td><td colspan="3">Dinas Komunikasi dan Informatika</td></tr>
    </table>

    <table>
      <tr><td class="section-title">II. JENIS CUTI YANG DIAMBIL</td></tr>
    </table>
    <table>
      <tr><td>1. Cuti Tahunan</td><td>2. Cuti Besar</td></tr>
      <tr><td>3. Cuti Sakit</td><td>4. Cuti Melahirkan</td></tr>
      <tr><td>5. Cuti Karena Alasan Penting</td><td>6. Cuti di Luar Tanggungan Negara</td></tr>
    </table>

    <table>
      <tr><td class="section-title">III. ALASAN CUTI</td></tr>
      <tr><td style="height:60px;"></td></tr>
    </table>

    <table>
      <tr><td class="section-title">IV. LAMANYA CUTI</td></tr>
    </table>
    <table>
      <tr>
        <td>Selama ....... hari</td>
        <td>Mulai Tanggal .......... s/d ..........</td>
      </tr>
    </table>

    <table>
      <tr><td class="section-title">V. CATATAN CUTI</td></tr>
    </table>
    <table>
      <tr>
        <td>1. Cuti Tahunan</td><td>Sisa</td><td>Keterangan</td>
        <td>2. Cuti Besar</td><td>0</td>
      </tr>
      <tr><td>N-2</td><td></td><td></td><td>3. Cuti Sakit</td><td>0</td></tr>
      <tr><td>N-1</td><td></td><td></td><td>4. Cuti Melahirkan</td><td>0</td></tr>
      <tr><td>N</td><td></td><td></td><td>5. Cuti Karena Alasan Penting</td><td>0</td></tr>
      <tr><td></td><td></td><td></td><td>6. Cuti di Luar Tanggungan Negara</td><td>0</td></tr>
    </table>

    <table>
      <tr><td class="section-title">VI. ALAMAT SELAMA MENJALANKAN CUTI</td></tr>
    </table>
    <table>
      <tr><td>Alamat Pemohon</td><td style="height:50px;"></td></tr>
      <tr><td>TELP</td><td>Nomor Telp. Pemohon</td></tr>
    </table>

    <div style="text-align:right; margin-top:10px;">
      Hormat Saya,<br><br><br><br>
      ( Nama Pemohon )<br>
      NIP. ..........................
    </div>

    <table>
      <tr><td class="section-title">VII. PERTIMBANGAN ATASAN LANGSUNG</td></tr>
    </table>
    <table>
      <tr>
        <td class="center">DISETUJUI</td>
        <td class="center">PERUBAHAN</td>
        <td class="center">DITANGGUHKAN</td>
        <td class="center">TIDAK DISETUJUI</td>
      </tr>
    </table>
    <div style="margin-top:40px;">
      Jabatan Atasan,<br><br><br><br>
      ( Nama Jabatan Atasan )<br>
      NIP. ..........................
    </div>

    <table>
      <tr><td class="section-title">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</td></tr>
    </table>
    <table>
      <tr>
        <td class="center">DISETUJUI</td>
        <td class="center">PERUBAHAN</td>
        <td class="center">DITANGGUHKAN</td>
        <td class="center">TIDAK DISETUJUI</td>
      </tr>
    </table>
    <div style="margin-top:40px;">
      Kepala Dinas Komunikasi dan Informatika,<br><br><br><br>
      ( I GUSTI NGURAH GEDE JAYA SAPUTRA, S.Sos., M.A.P. )<br>
      NIP. 197502071993111002
    </div>
  </div>
</body>
</html>



