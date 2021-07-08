 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #C49050;">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>c_admin/bookinglist/<?php echo $this->session->userdata('id'); ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-code"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Barber Booking</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <div class="sidebar-heading">
         Administrator
     </div>
     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('c_admin') ?>">
             <i class="fas fa-home"></i>
             <span>Dashboard</span>
         </a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class=""></i>
             <span>Servis</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url(); ?>c_servis/main/<?php echo $this->session->userdata('id'); ?>">Data Servis</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class=""></i>
             <span>Booking</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url(); ?>c_admin/bookinglist/<?php echo $this->session->userdata('id'); ?>">Detail Booking</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
             <i class=""></i>
             <span>Lokasi</span>
         </a>
         <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url(); ?>c_admin/locationEdit/<?php echo $this->session->userdata('id'); ?>">Tambah Kordinat</a>
             </div>
         </div>
     </li>

     <hr class="sidebar-divider my-0">

     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url() . "auth/logout"; ?>">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Logout</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">


     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->