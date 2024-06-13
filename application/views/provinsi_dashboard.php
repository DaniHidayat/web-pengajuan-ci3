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



                    



                    <!-- Reports -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Report Static provinsi <?= $this->session->userdata('Nama_Provinsi');?></h5>

                                <!-- Bar Chart -->
                                <canvas id="barChart" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#barChart'), {
                                        type: 'bar',
                                        data: {
                                            labels: <?php echo json_encode(array_column($pengajuan, 'Nama_KotaKab')); ?>,
                                            datasets: [{
												label: 'Total Anggaran (Rp)',
                                                data: <?php echo json_encode(array_column($pengajuan, 'anggaran')); ?>,
												backgroundColor: [
												'rgba(75, 192, 192, 0.2)',   // Light Cyan
												'rgba(54, 162, 235, 0.2)',   // Light Blue
												'rgba(255, 206, 86, 0.2)',   // Light Yellow
												'rgba(255, 159, 64, 0.2)',   // Light Orange
												'rgba(255, 99, 132, 0.2)',   // Light Red
												'rgba(153, 102, 255, 0.2)',  // Light Purple
												'rgba(201, 203, 207, 0.2)',  // Light Grey
												'rgba(0, 255, 127, 0.2)',    // Light Green
												'rgba(255, 140, 0, 0.2)',    // Light Dark Orange
												'rgba(138, 43, 226, 0.2)'    // Light Blue Violet
											],
											borderColor: [
												'rgba(75, 192, 192, 1)',     // Cyan
												'rgba(54, 162, 235, 1)',     // Blue
												'rgba(255, 206, 86, 1)',     // Yellow
												'rgba(255, 159, 64, 1)',     // Orange
												'rgba(255, 99, 132, 1)',     // Red
												'rgba(153, 102, 255, 1)',    // Purple
												'rgba(201, 203, 207, 1)',    // Grey
												'rgba(0, 255, 127, 1)',      // Green
												'rgba(255, 140, 0, 1)',      // Dark Orange
												'rgba(138, 43, 226, 1)'      // Blue Violet
											],
														borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div><!-- End Reports -->




                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>

</main><!-- End #main -->


