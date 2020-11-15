<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?= $replies + $posts + $feedbacks ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url(); ?>admin/replies" class="dropdown-item">
            <i class="fas fa-comment mr-2"></i> <?= $replies ?> new reply requests
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url(); ?>admin/posts" class="dropdown-item">
            <i class="fas fa-comment mr-2"></i> <?= $posts ?> new post requests
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url(); ?>admin/feedbacks" class="dropdown-item">
          <i class="nav-icon fas fa-edit mr-2"></i> <?= $feedbacks ?> mew feedbacks
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->