<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Pengajuan Anggaran
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('dash/'); ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url('dash/'); ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url('dash/'); ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('dash/'); ?>/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body>

    <br /><br /><br />
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                <h4 class="font-weight-bolder">Login Area </h4>
                <!-- <h5 class="font-weight-bolder">Aktara Acadmy</h5> -->
                <p class="mb-0">Masukan Password dan Email Anda dengan benar</p>

                <?=@$this->session->flashdata('msg')?>
                <form action="<?=base_url()?>login/process" method="POST" id="login">
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input id="username" type="text" class="form-control" name="username" placeholder="Username"
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                            required />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-info" data-toggle="modal"
                            data-target="#myModal">Login</button>
                        <!-- <p class="mb-4 text-sm mx-auto">
                            Don't have an account?
                            <a href="<?= base_url('login/regist'); ?>"
                                class="text-info text-gradient font-weight-bold">Sign
                                up</a>
                        </p> -->

                    </div>
                </form>
                <br />
                <hr>
            </div>

            <div
                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                <div class="position-relative bg-gradient-info h-100 m-3 px-7 
                        border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('assets/tes_online2.jpg');
          background-size: cover;">
                    <span class="mask bg-gradient-info opacity-6"></span>
                    <h4 class="mt-5 text-white font-weight-bolder position-relative">Selamat Datang di SYSTEM INFORMASI
                        PENGAJUAN ANGGARAN
                    </h4>
                    <!-- <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                        </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url('dash/'); ?>assets/js/core/popper.min.js"></script>
    <script src="<?= base_url('dash/'); ?>assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url('dash/'); ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('dash/'); ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= base_url('dash/'); ?>assets/js/plugins/chartjs.min.js"></script>
    <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
    </script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('dash/'); ?>assets/js/argon-dashboard.min.js?v=2.0.4"></script>