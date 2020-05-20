<!-- Alert -->
<script>
    @if(Session::has('store'))
        alertify.success("Data Berhasil Ditambahkan");
    @endif

    @if(Session::has('welcome'))
        alertify.success("Selamat Datang Kembali, {{ auth()->user()->nama_lengkap }}!");
    @endif

    @if(Session::has('newWelcome'))
        alertify.success("Selamat Datang, {{ auth()->user()->nama_lengkap }}!");
    @endif

    @if(Session::has('suksesPw'))
        alertify.success("Kata Sandi Berhasil Diperbarui");
    @endif

    @if(Session::has('update'))
        alertify.success("Data Berhasil Diperbarui");
    @endif

    @if(Session::has('destroy'))
        alertify.success("Data Berhasil Dihapus");
    @endif

    @if(Session::has('verifikasi'))
        alertify.success("Transaksi Berhasil Diverifikasi");
    @endif

    @if(Session::has('transaksi'))
        alertify.success("Transaksi Berhasil Diperbarui");
    @endif
</script>
