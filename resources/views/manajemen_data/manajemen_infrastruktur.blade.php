@extends ('template')
@section('content')
<div class="container-content">
<div class='row'>
        <div class='col-md-12'>
                <div class="box-header with-border">
                  <h4 class="box-title">Form Manajemen Data Infrastuktur</h4><br>
                </div>
                <div class="box-body">
                <a href="/hitung_indeks/{{ "Infrastruktur" }}" type="button" class="btn btn-primary"><i class="fa fa-cogs"></i> Generate Indeks (Lvl 2)</a>
                    <table id="tabel" class="table table-bordered table-striped">
                        <thead>
                                <tr>
                                        <th style="text-align:center; ">NO</th>
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
                                    @foreach ($data as $infrastuktur)
                                    <tr>
                                        <td style="text-align:center; width:7%;">{{ $no }}</td>
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
</div>
@endsection