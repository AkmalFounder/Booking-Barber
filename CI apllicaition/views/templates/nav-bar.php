<!-- nav-bar.php -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="<?php echo base_url() . "c_user"; ?>">Barber Booking</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">


				<li class="nav-item active"><a href="<?php echo base_url() . "c_user"; ?>" class="nav-link">Home</a></li>
				<!--check logged in user -->
				<?php if ($this->session->userdata('email')) : ?>
					<li class="nav-item"><a href="<?= base_url(); ?>c_user/waitinglist/<?php echo $this->session->userdata('id'); ?>" class="nav-link">My Waiting List</a></li>
					<li class="nav-item"><a href="<?php echo base_url() . "auth/logout"; ?>" class="nav-link"><?php echo $this->session->userdata('users_name'); ?> (logout)</a></li>

				<?php else : ?>
					<li class="nav-item"><a href="<?php echo base_url() . "auth/register"; ?>" class="nav-link">Registrasi</a></li>
					<li class="nav-item"><a href="<?php echo base_url() . "auth"; ?>" class="nav-link">Login</a></li>

				<?php endif; ?>

			</ul>
		</div>
	</div>
</nav>