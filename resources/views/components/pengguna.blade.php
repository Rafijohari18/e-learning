<div id="tampil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Tambah Data</h5>
                <!-- <code class="modal-title mt-0 highlighter-rouge">Role Admin</code> -->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pengguna.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required="" placeholder="Masukkan Nama Lengkap">
                </div>

                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" class="form-control" name="username" id="username" required="" placeholder="Masukkan Nama Pengguna">
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control" name="password" id="password" required="" placeholder="Masukkan Kata Sandi">
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="Pengajar">Pengajar</option>
                        <!-- <option value="Administrasi">Administrasi</option> -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" name="path" id="path" data-input="false" data-buttonname="btn-secondary">  
                    <code class="highlighter-rouge">*Boleh kosong</code>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->