@extends ('template')
@section('content')
<div class="container-content">
<div class='row'>
        <div class='col-md-12'>
                <div class="box-header with-border">
                  <h4 class="box-title">Form Manajemen Data Investasi</h4><br>
                </div>
                <div class="box-body">
                <a href="/hitung_indeks/{{ "Investasi" }}" type="button" class="btn btn-primary"><i class="fa fa-cogs"></i> Generate Indeks (Lvl 2)</a>
                    <table id="tabel" class="table table-bordered table-striped">
                        <thead>
                                <tr>
                                        <th style="text-align:center; ">NO</th>
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
                                    @foreach ($data as $investasi)
                                    <tr>
                                        <td style="text-align:center; width:7%;">{{ $no }}</td>
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
</div>
@endsection