<div id="wrapper">

    <ul class="sidebar navbar-nav">
        <li class="nav-item dropdown<?= ($sidebar[0] === "home") ? " active" : NULL ?>">
            <a class="nav-link" href="<?= base_url("courses/pending"); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Courses</span>
            </a>
        </li>
        <div class="menu">
                <a class="dropdown-item<?= ($sidebar[0] === "home") && ($sidebar[1] === 0)  ? " active" : NULL ?>" href="<?= base_url("courses/pending"); ?>">Pending</a>
                <a class="dropdown-item<?= ($sidebar[0] === "home") && ($sidebar[1] === 1)  ? " active" : NULL ?>" href="<?= base_url("courses/completed"); ?>">Completed</a>
        </div>
        <li class="nav-item <?= ($sidebar[0] === "explore") ? "active" : NULL ?>">
            <a class="nav-link" href="<?= base_url("explore"); ?>">
                <i class="fas fa-fw fa-compass"></i>
                <span>Explore</span>
            </a>
        </li>
        <li class="nav-item <?= ($sidebar[0] === "forum") ? "active" : NULL ?> ">
            <a class="nav-link" href="<?= base_url("forum"); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Forum</span>
            </a>
        </li>
        <li class="nav-item <?= ($sidebar[0] === "feedback") ? "active" : NULL ?>">
            <a class="nav-link" href="<?= base_url('feedback'); ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>Feedback</span>
            </a>
        </li>
    </ul>
    <div id="content-wrapper">