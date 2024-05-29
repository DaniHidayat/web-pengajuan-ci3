  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
      <div class="copyright">
          &copy; Copyright <strong><span>Aktara </span></strong>. All Rights Reserved
      </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
          class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('NiceAdmin/'); ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url('NiceAdmin/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('NiceAdmin/'); ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= base_url('NiceAdmin/'); ?>/vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url('NiceAdmin/'); ?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?= base_url('NiceAdmin/'); ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url('NiceAdmin/'); ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url('NiceAdmin/'); ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('NiceAdmin/'); ?>assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
function getCities() {
    var province_id = $('#province').val();
    $.ajax({
        url: '<?php echo base_url("Account/get_cities"); ?>',
        type: 'post',
        data: {
            province_id: province_id
        },
        dataType: 'json',
        success: function(response) {
            var options =
                '<option value="">Pilih Kota/Kabupaten</option>';
            for (var i = 0; i < response.length; i++) {
                options += '<option value="' + response[i].ID_KotaKab +
                    '">' + response[i].Nama_KotaKab + '</option>';
            }
            $('#city').html(options);
        }
    });
}
  </script>

  </body>

  </html>