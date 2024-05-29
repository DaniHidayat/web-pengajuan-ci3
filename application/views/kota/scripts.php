<script>
$(document).ready(function(){
    // Fungsi untuk memformat angka menjadi format mata uang (rupiah)
    function formatRupiah(angka) {
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
        return formatter.format(angka);
    }

    // Ketika nilai qty atau subtotal berubah
    $('#qty, #subtotal').on('input', function() {
        // Ambil nilai qty dan subtotal
        var qty = $('#qty').val().replace(/\D/g, ''); // Hapus karakter non-digit
        var subtotal = $('#subtotal').val().replace(/\D/g, ''); // Hapus karakter non-digit

        // Hitung total
        var total = qty * subtotal;

        // Set nilai total ke dalam input total
        $('#total').val(formatRupiah(total));
    });

    // Format input total saat halaman dimuat
    $('#total').on('input', function() {
        var total = $(this).val();
        $(this).val(formatRupiah(total));
    });
});
</script>
