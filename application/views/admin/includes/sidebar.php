<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <center>
            <span class="brand-text font-weight-light">Codist</span>
        </center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(); ?>assets/admin/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/dashboard" class="nav-link <?php echo ($nav[0] == 'dashboard')? " active " : NULL ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php echo ($nav[0] == 'courses')? " menu-open " : NULL ?>">
                    <a href="" class="nav-link <?php echo ($nav[0] == 'courses')? " active " : NULL ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Courses
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url("admin/courses"); ?>" class="nav-link <?php echo ($nav[1] === 0)&&($nav[0] == 'courses')? " active
                                " : NULL ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/courses/create"); ?>" class="nav-link <?php echo ($nav[1] === 1)&&($nav[0] == 'courses')? "
                                active " : NULL ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">User End Details</li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/users" class="nav-link <?php echo ($nav[0] == 'users')? " active " : NULL ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php echo ($nav[0] == 'forum')? " menu-open " : NULL ?>">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Forum Requests
                            <i class="right fas fa-angle-left"></i>
                            <?php 
                        
                            if($posts>0 || $replies>0){
                                echo '<span class="right badge badge-danger">New</span>';
                            }

                        ?>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>admin/posts" class="nav-link <?php echo ($nav[1] === 1)? " active " : NULL ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Posts</p>
                                <?php
                        
                            if($posts > 0){
                                echo '<span class="right badge badge-danger">New</span>';
                                echo '<span class="badge badge-warning navbar-badge">'.$posts.'</span>';
                            }

                        ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>admin/replies" class="nav-link <?php echo ($nav[1] === 2)? " active " : NULL ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Replies</p>
                                <?php
                            if($replies > 0){
                                echo '<span class="right badge badge-danger">New</span>';
                                echo '<span class="badge badge-warning navbar-badge">'.$replies.'</span>';
                            }
                        ?>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/feedbacks" class="nav-link <?php echo ($nav[0] == 'feedbacks')? " active " : NULL ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Feedbacks
                            <?php
                            if($feedbacks > 0){
                                echo '<span class="right badge badge-danger">New</span>';
                                echo '<span class="badge badge-warning navbar-badge">'.$feedbacks.'</span>';
                            }
                        ?>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/logout" class="nav-link bg-red">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- class="btn btn-primary btn-block" -->
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>