<div class="row mb-3">
    <div class="col-12">
        <div class="alert alert-info">Anda belum memiliki modul satupun untuk dipelajari.</div>
        <h4 class="m-t-20 m-b-30">Modul Terbaru</h4>
        <div class="card-columns">
            @forelse($neko as $jquin)
            <div class="card m-b-30">
                <img class="card-img-top img-fluid" src="{{ asset('storage/'.$jquin->path) }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title font-20 mt-0"><a href="{{ route('module.detail', $jquin->id) }}" style="color: black;">{{ $jquin->nama_program }}</a></h4>
                    <span class="badge badge-info">{{ $jquin->kategori->nama_kategori }}</span>
                   
                    <p class="card-text">{!!  Str::limit($jquin->deskripsi, 100, '. <a href="detail/'.$jquin->id.'/modul"> Selengkapnya...</a>') !!}</p>
                </div>
                <div class="card-footer bg-white">
                     <p class="card-text">
                        <i class="mdi mdi-clock"></i> <span> {{ $jquin->durasi_program }} </span>
                        <span class="float-right">Rp{{ number_format($jquin->harga, 0, ',', '.') }}</span>
                    </p>
                </div>
            </div>
            @empty
            <div class="alert alert-info">Tidak ada modul untuk di tampilkan.</div>
            @endforelse
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <img class="card-img-top img-fluid" src="{{ asset('storage/'.$module->path) }}" alt="Card image cap">
            <div class="card-body">
                <div class="float-right"><i class="mdi mdi-clock"></i> <span>{{ $module->durasi_program }} </span> <span >Rp{{ number_format($module->harga, 0, ',', '.') }}</span></div>
                <h4 class="card-title font-20 mt-0">{{ $module->nama_modul }}</h4>
                <span class="badge badge-info">{{ $module->kategori->nama_kategori }}</span>
                <br><br>
                <input type="hidden" class="rating" data-filled="mdi mdi-star font-20 text-primary" data-empty="mdi mdi-star-outline font-20 text-muted" data-readonly value="3"/>
                <p class="card-text">
                    {!! $module->deskripsi !!}
                </p>
            </div>
            <div class="card-footer bg-white">
                 <p class="card-text">
                    <a href="#" data-toggle="modal" data-target="#ikuti" class="btn btn-sm btn-primary">Ikuti Pelatihan</a>
                </p>
            </div>
        </div>
    </div>
</div> <!-- end row -->

<!-- modal -->
<!-- sample modal content -->
<div id="ikuti" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Ikuti Pelatihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="" method="POST">
                @csrf
              <div class="modal-body">
                  <div class="container-fluid">
                      <div class="form-group">
                        <label for="name">Nama Program</label>
                        <input type="text" placeholder="Masukkan Nama Program" name="nama_program" id="nama_program" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Simpan</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->