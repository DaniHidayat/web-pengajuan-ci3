<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">


            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>


                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Ubah
                                    Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <!-- <h5 class="card-title">About</h5>
                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores
                                    cumque
                                    temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum
                                    quae quisquam autem
                                    eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                <h5 class="card-title">Profile Details</h5> -->

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama </div>
                                    <div class="col-lg-9 col-md-8"><?= $this->session->userdata('username');?></div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat kantor</div>
                                    <div class="col-lg-9 col-md-8">Jalan kanayakan lama 40a Bandung</div>
                                </div> -->

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">email</div>
                                    <div class="col-lg-9 col-md-8"><?= $this->session->userdata('email');?></div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-lg-3 col-md-4 label">No hp</div>
                                    <div class="col-lg-9 col-md-8">0856 2003 101</div>
                                </div> -->

                                <!-- <div class="row">
                                    <div class="col-lg-3 col-md-4 label">nama pengelola</div>
                                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                                </div> -->

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
							<?php if ($this->session->flashdata('success')): ?>
									<div class="alert alert-success">
										<?php echo $this->session->flashdata('success'); ?>
									</div>
								<?php elseif ($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?php echo $this->session->flashdata('error'); ?>
									</div>
								<?php endif; ?>
                                <!-- Profile Edit Form -->
								<form action="<?php echo site_url('Kabkota/updateProfile'); ?>" method="post">
                                    <!-- <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/profile-img.jpg" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-info btn-sm"
                                                    title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="row mb-3">
                                        <label for="Username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
										<input name="username" type="text" class="form-control" id="Username" value="<?php echo set_value('username'); ?>">
										<?php echo form_error('username'); ?>
                                        </div>
                                    </div>
									<div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
										<input name="email" type="email" class="form-control" id="Email" value="<?php echo set_value('email'); ?>">
               							 <?php echo form_error('email'); ?>
                                        </div>
                                    </div>

                                    <!-- <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="about"
                                                style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                        </div>
                                    </div> -->

                                    <!-- <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company"
                                                value="Lueilwitz, Wisoky and Leuschke">
                                        </div>
                                    </div> -->

                                    <!-- <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text" class="form-control" id="Job"
                                                value="Web Designer">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country"
                                                value="USA">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address"
                                                value="A108 Adam Street, New York, NY 535022">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone"
                                                value="(436) 486-3538 x29071">
                                        </div>
                                    </div> -->

                               

                                    <!-- <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="text" class="form-control" id="Twitter"
                                                value="https://twitter.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="text" class="form-control" id="Facebook"
                                                value="https://facebook.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instagram" type="text" class="form-control" id="Instagram"
                                                value="https://instagram.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkedin" type="text" class="form-control" id="Linkedin"
                                                value="https://linkedin.com/#">
                                        </div>
                                    </div> -->

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>



                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
								<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
				<?php elseif ($this->session->flashdata('error')): ?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php endif; ?>

			<form action="<?php echo site_url('Kabkota/change_password'); ?>" method="post">
				<div class="row mb-3">
					<label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
					<div class="col-md-8 col-lg-9">
						<input name="current_password" type="password" class="form-control" id="currentPassword">
						<?php echo form_error('current_password'); ?>
					</div>
				</div>

				<div class="row mb-3">
					<label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
					<div class="col-md-8 col-lg-9">
						<input name="new_password" type="password" class="form-control" id="newPassword">
						<?php echo form_error('new_password'); ?>
					</div>
				</div>

				<div class="row mb-3">
					<label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
					<div class="col-md-8 col-lg-9">
						<input name="renew_password" type="password" class="form-control" id="renewPassword">
						<?php echo form_error('renew_password'); ?>
					</div>
				</div>

				<div class="text-center">
					<button type="submit" class="btn btn-info">Change Password</button>
				</div>
			</form>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
