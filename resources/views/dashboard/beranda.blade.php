@extends ('template')
@section('content')
<div class="container-content">
<div class='row'>
  <div class='col-md-12'>
      <div class="box-header with-border">
        <h2 class="box-title">Rangking Kota Terbaik</h2><br>
      </div>
      <div class="box-body">
        <a href="/hitung_indeks/{{ "All" }}" type="button" class="btn btn-primary"><i class="fa fa-cogs"></i> Generate Indeks (Lvl 1)</a>
        <table id="tabelKota" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="text-align:center">RANKING</th>
              <th style="text-align:left">NAMA</th>
              <th style="text-align:left">TAHUN</th>
              <th style="text-align:left">INDEKS TOTAL</th>
            </tr>
          </thead>
          <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($daftar_kota as $kota)
            <tr>
              <td style="text-align:center; width:10%">{{ $no }}</td>
              <td style="text-align:left;">{{ $kota->kota->nama }}</td>
              <td style="text-align:left;">{{ $kota->kota->tahun }}</td>
              <td style="text-align:left;">{{ $kota->indeks }}</td>
            </tr>
            @php
                $no++;
            @endphp
            @endforeach
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col -->

<div class='row'>
    <div class='col-md-12'>
            <div class="box-header with-border">
              <h2 class="box-title">Rangking Kota Terbaik Untuk Kategori Infrastruktur</h2><br>
            </div>
            <div class="box-body">
                <table id="tabelInfrastruktur" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>RANKING</th>
                            <th>NAMA</th>
                            <th>KESEHATAN</th>
                            <th>PENDIDIKAN</th>
                            <th>AKSES JALAN</th>
                            <th>TAHUN</th>
                            <th>INDEKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($daftar_infrastruktur as $infrastuktur)
                        <tr>
                            <td style="text-align:center; width:10%">{{ $no }}</td>
                            <td>{{ $infrastuktur->kota->nama }}</td>
                            <td>{{ $infrastuktur->kesehatan }}</td>
                            <td>{{ $infrastuktur->pendidikan }}</td>
                            <td>{{ $infrastuktur->akses_jalan }}</td>
                            <td>{{ $infrastuktur->kota->tahun }}</td>
                            <td>{{ $infrastuktur->indeks }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->

<div class='row'>
    <div class='col-md-12'>
        <div class="box-header with-border">
            <h2 class="box-title">Rangking Kota Terbaik Untuk Kategori Investasi</h2><br>
        </div>
        <div class="box-body">
            <table id="tabelInvestasi" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>RANKING</th>
                        <th>NAMA</th>
                        <th>ANGKATAN KERJA</th>
                        <th>UMR</th>
                        <th>PDRB</th>
                        <th>TAHUN</th>
                        <th>INDEKS</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($daftar_investasi as $investasi)
                    <tr>
                        <td style="text-align:center; width:10%">{{ $no }}</td>
                        <td>{{ $investasi->kota->nama }}</td>
                        <td>{{ $investasi->angkatan_kerja }}</td>
                        <td>{{ $investasi->UMR }}</td>
                        <td>{{ $investasi->PDRB }}</td>
                        <td>{{ $investasi->kota->tahun }}</td>
                        <td>{{ $investasi->indeks }}</td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col -->

<div class='row'>
    <div class='col-md-12'>
        <div class="box-header with-border">
            <h2 class="box-title">Rangking Kota Terbaik Untuk Kategori Pariwisata</h2><br>
            </div>
            <div class="box-body">
                <table id="tabelPariwisata" class="datatables table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>RANKING</th>
                            <th>NAMA</th>
                            <th>TAHUN</th>
                            <th>INDEKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($daftar_pariwisata as $pariwisata)
                        <tr>
                            <td style="text-align:center; width:10%">{{ $no }}</td>
                            <td>{{ $pariwisata->kota->nama }}</td>
                            <td>{{ $pariwisata->kota->tahun }}</td>
                            <td>{{ $pariwisata->indeks }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->

<div class='row'>
    <div class='col-md-12'>
        <div class="box-header with-border">
            <h2 class="box-title">Rangking Kota Terbaik Untuk Kategori Pelayanan Publik</h2><br>
            </div>
            <div class="box-body">
                <table id="tabelPelayananPublik" class="datatables table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>RANKING</th>
                            <th>NAMA</th>
                            <th>TAHUN</th>
                            <th>INDEKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($daftar_pelayanan_publik as $pelayananpublik)
                        <tr>
                            <td style="text-align:center; width:10%">{{ $no }}</td>
                            <td>{{ $pelayananpublik->kota->nama }}</td>
                            <td>{{ $pelayananpublik->kota->tahun }}</td>
                            <td>{{ $pelayananpublik->indeks }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>
@endsection
