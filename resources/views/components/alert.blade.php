<!-- Alert -->
<script>
    @if(Session::has('store'))
        alertify.success("Data Berhasil Ditambahkan");
    @endif
</script>

<script>
    @if(Session::has('welcome'))
        alertify.success("Selamat Datang Kembali, {{ auth()->user()->nama_lengkap }}!");
    @endif
</script>

<script>
    @if(Session::has('suksesPw'))
        alertify.success("Kata Sandi Berhasil Diperbarui");
    @endif
</script>

<script>
    @if(Session::has('update'))
        alertify.success("Data Berhasil Diperbarui");
    @endif
</script>

<script>
    @if(Session::has('destroy'))
        alertify.success("Data Berhasil Dihapus");
    @endif
</script>

<!-- Transaksi -->
<script>
    @if(Session::has('verifikasi'))
        alertify.success("Transaksi Berhasil Diverifikasi");
    @endif
</script>
