<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="/dashboard/welcome.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/dashboard/view_user.php">
              <span data-feather="home"></span>
              My Attendance 
            </a>
          </li>

          <?php if(is_admin()):?>

          <li class="nav-item">
            <a class="nav-link" href="/dashboard/view_attendance.php">
              <span data-feather="home"></span>
              View Attendance 
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/dashboard/users.php">
              <span data-feather="home"></span>
              Users 
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/dashboard/add_device.php">
              <span data-feather="home"></span>
              Add Device
            </a>
          </li>
        <?php endif;?>

        
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/edit_profile.php">
              <span data-feather="file"></span>
              Edit Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/pending.php">
              <span data-feather="shopping-cart"></span>
              Leave Application
            </a>
          </li>
        </ul>
      </div>
    </nav>