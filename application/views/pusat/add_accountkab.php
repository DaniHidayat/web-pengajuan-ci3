<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Tambah Akun</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tambah Akun</a></li>
                <li class="breadcrumb-item active">Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row justify-content-center">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <!-- Form -->
                                <form action="<?php echo site_url('accountpusat/registerkab'); ?>" method="post">
                                    <br>

                                    <!-- Pesan sukses atau gagal -->
                                    <?php if(isset($message)): ?>
                                    <?php echo $message; ?>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">kodedaerah/Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>
                                    <!-- Dropdown wilayah -->
                                    <div class="mb-3">
                                        <label for="wilayah" class="form-label">Wilayah</label>
                                        <select class="form-select" id="wilayah" name="wilayah" required>
                                            <option value="">Pilih Wilayah</option>
                                            <?php foreach ($wilayah as $row): ?>
                                            <option><?= $row['name_prov'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- End Dropdown wilayah -->

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-info">Buat akun kab/kota</button>
                                        <a href="<?= base_url('Pusat/akunkabkota') ?>"
                                            class="btn btn-secondary">Kembali</a>
                                    </div>

                                </form>
                                <!-- End Form -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->