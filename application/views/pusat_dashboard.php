<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total Anggaran <span>| Nasional</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <h6>Rp</h6>
                                    </div>
                                    <div class="ps-3">
                                        <h6>310,000,000,</h6>
                                        <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->


                    <!-- Revenue Card -->
                    <!-- <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Hari ini</a></li>
                                    <li><a class="dropdown-item" href="#">Bulan ini</a></li>
                                    <li><a class="dropdown-item" href="#">Tahun ini</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Anggaran <span>| Terpakai</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <h6>Rp</h6>
                                    </div>
                                    <div class="ps-3">
                                        <h6>100,000,000</h6>
                                        <span class="text-muted small pt-2 ps-1">Anggaran terpakai di
                                            provinsi-provinsi</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> -->
					<!-- End Revenue Card -->



                    <!-- Reports -->
                  
					<div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Anggaran Tiap Wilayah</h5>
                <!-- Bar Chart -->
                <canvas id="barChart" style="max-height: 400px;"></canvas>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const ctx = document.getElementById('barChart').getContext('2d');
                        const data = {
                            labels: <?php echo json_encode(array_column($laporan, 'Nama_Provinsi')); ?>,
                            datasets: [{
                                label: 'Total Anggaran (Rp)',
                                data: <?php echo json_encode(array_column($laporan, 'total_anggaran')); ?>,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1
                            }]
                        };
                        const config = {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            callback: function(value, index, values) {
                                                return 'Rp' + value.toLocaleString('id-ID');
                                            }
                                        }
                                    }
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(tooltipItem, data) {
                                            return 'Rp' + tooltipItem.yLabel.toLocaleString('id-ID');
                                        }
                                    }
                                }
                            }
                        };
                        new Chart(ctx, config);
                    });
                </script>
                <!-- End Bar Chart -->
            </div>
        </div>
    </div>



                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>

</main><!-- End #main -->

