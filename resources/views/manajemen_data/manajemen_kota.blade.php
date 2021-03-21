@extends ('template')
@section('content')
<div class="container-content">
    <div class='row'>
        <div class='col-md-12'>
                <div class="box-header with-border">
                  <h4 class="box-title">Form Manajemen Data Kota</h4><br>
                </div>
                <div class="box-body">
                    <table id="tabel" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center; ">NO</th>
                                <th>NAMA</th>
                                <th>TAHUN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($daftar_kota as $kota)
                            <tr>
                                <td style="text-align:center; width:10%;">{{ $no }}</td>
                                <td>{{ $kota->nama }}</td>
                                <td>{{ $kota->tahun }}</td>
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
    <div class="row">
        <form class="form-horizontal" action="/tambah_kota/import" method="post" enctype="multipart/form-data">
            <fieldset>
                {{ csrf_field() }}
                <legend></legend>
                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">Select File</label>
                    <div class="col-md-4">
                        <input type="file" name="file" id="file" class="input-large">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                    <div class="col-md-4">
                        <button type="submit" id="submit" name="Import_infrastruktur" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
    {{--  <div>
        <form class="form-horizontal" action="../proses/functions.php" method="post" name="upload_excel"   
        enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <input type="submit" name="Export_infrastruktur" class="btn btn-success" value="export to excel"/>
                </div>
            </div>                    
        </form>           
    </div>  --}}
</div>
@endsection
