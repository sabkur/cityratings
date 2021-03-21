@extends ('template')
@section('content')
    <div class="container-content">
        <div class='row'>
            <div class='col-md-12'>
                    <div class="box-header with-border">
                      <h4 class="box-title">Form Manajemen Bobot Kriteria Utama (Level 1)</h4><br>
                    </div>
                    <div class="box-body">
                        <form method="post" enctype="multipart/form-data" action="/update_bobot_kriteria/simpan">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($bobot_kriteria as $bobot_k)
                            <div class="form-group">
                                <label for="kriteria">KRITERIA :</label>
                                <input type="text" name={{ 'kriteria'.$i }} class="form-control" value="{{ $bobot_k->kriteria }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="bobot">BESAR BOBOT :</label>
                                <input type="number"  step="0.01" name={{ 'bobot'.$i }} class="form-control" value="{{ $bobot_k->bobot }}">
                            </div>
                            <div class="form-group">
                                <label for="atribut">TIPE ATRIBUT :</label>
                                <select name={{ 'atribut'.$i }} class="form-control">
                                        @if ($bobot_k->atribut == "KEUNTUNGAN")
                                            <option value="KEUNTUNGAN" selected>{{ $bobot_k->atribut }}</option>
                                            <option value="BIAYA">BIAYA</option>
                                        @else
                                            <option value="BIAYA" selected>{{ $bobot_k->atribut }}</option>
                                            <option value="KEUNTUNGAN">KEUNTUNGAN</option>
                                        @endif
                                </select>
                            </div>
                            <hr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                            <button type="submit" name="submit" class="btn btn-success"> Simpan </button>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
    </div>
@endsection