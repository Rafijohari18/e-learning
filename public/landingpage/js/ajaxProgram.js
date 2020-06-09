$(document).ready(function() {
        $('#kp').hide();
        $("#tf").click(function() {
            $("#kp").hide('slow');
            $("#no_kk").removeAttr('required','required');
            $("#kupon").removeAttr('required','required');
        });

        $("#kartuprakerja").click(function() {
            $("#kp").show('slow');
            $("#no_kk").attr('required','required');
            $("#kupon").attr('required','required');
        });

        // Show
        $('#program').on('change', function (e) {
            var idProgram = e.target.value;
            $('#nmProgram').empty();
            $('#hargaProgram').empty();
            $('#diskonProgram').empty();
            $('#total').empty();

            $.get('json/'+ idProgram +'/cari-program', function (data) {
                $('#nmProgram').append('<span>'+ data.nama_program +'</span>')
                // Format Rupiah
                let hargaAsli = data.harga;
                var rpHarga = hargaAsli.toString(),
                    hargaSisa    = rpHarga.length % 3,
                    rpRupiah  = rpHarga.substr(0, hargaSisa),
                    hargaRibuan  = rpHarga.substr(hargaSisa).match(/\d{3}/g);
                        
                if (hargaRibuan) {
                    hargaSeparator = hargaSisa ? '.' : '';
                    rpRupiah += hargaSeparator + hargaRibuan.join('.');
                }

                $('#hargaProgram').append('<span> Rp. '+ rpRupiah +'</span>')
                $('#diskonProgram').append('<span>'+ data.diskon +'%</span>')

                // Menentukan Diskon
                let besarnyaDiskon = data.diskon;
                let harga = data.harga;
                let diskon = (besarnyaDiskon/100)*harga;
                let total = harga - diskon;

                // Format Rupiah
                var number_string = total.toString(),
                    sisa    = number_string.length % 3,
                    rupiah  = number_string.substr(0, sisa),
                    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                        
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                $('#total').append('<span> Rp. '+ rupiah +'</span>')                
            })
        });
    });