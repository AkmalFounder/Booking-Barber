<!-- nav-bar.php -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url('c_guest') ?>">Barber Booking</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a href="<?php echo base_url() . "c_guest"; ?>" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="<?php echo base_url() . "auth/register"; ?>" class="nav-link">Registrasi</a></li>
				<li class="nav-item"><a href="<?php echo base_url() . "auth"; ?>" class="nav-link">Login</a></li>
			</ul>
		</div>
	</div>
</nav>