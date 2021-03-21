@extends ('template')
@section('content')
<div class="container-content">
<div class='row'>
        <div class='col-md-12'>
                <div class="box-header with-border">
                  <h4 class="box-title">Form Manajemen Data Pariwsata</h4><br>
                </div>
                <div class="box-body">
                    <table id="tabel" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center; ">NO</th>
                                <th>NAMA</th>
                                <th>INDEKS</th>
                                <th>TAHUN</th>
                            </tr>
                        </thead>
                            <tbody>
                            @php
                                $no = 1;
                                @endphp
                                @foreach ($daftar_pariwisata as $pariwisata)
                                <tr>
                                    <td style="text-align:center; width:10%;">{{ $no }}</td>
                                    <td>{{ $pariwisata->kota->nama }}</td>
                                    <td>{{ $pariwisata->indeks }}</td>
                                    <td>{{ $pariwisata->kota->tahun }}</td>
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