<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
    id="navbarVertical">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse"
            aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <!-- <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="./dashboard.php">
            <img src="../images/logo.png" style="height: 80px;" alt="...">
        </a> -->
        <h1 class="p-5">eCommerce</h1>
        <!-- User menu (mobile) -->
        <div class="navbar-user d-lg-none">
            <!-- Dropdown -->
            <div class="dropdown">
                <!-- Toggle -->
                <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="avatar-parent-child">
                        <!-- <img alt="Image Placeholder"
                                    src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                                    class="avatar avatar- rounded-circle"> -->
                        <span class="avatar-child avatar-badge bg-success"></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./dashboard.php">
                        <i class="bi bi-speedometer"></i> Dashboard
                    </a>
                </li>
               
                <!-- <li class="nav-item">
                    <a class="nav-link" href="./contact_queries.php">
                    <i class="bi bi-chat-dots"></i> Contact Query
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_services.php">
                    <i class="bi bi-file"></i> Manage Service
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="./manage_products.php">
                    <i class="bi bi-files"></i> Manage Products
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="./manage_media.php">
                    <i class="bi bi-files"></i> Manage Media
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_career.php">
                    <i class="bi bi-files"></i> Manage Career
                    </a>
                </li> -->
                
                <?php 
                
                 if ($_SESSION["admin_role"]==1 || $_SESSION["admin_role"]==2) { 
                    ?>
                     <li class="nav-item">
                    <a class="nav-link" href="./manage_user.php">
                    <i class="bi bi-people"></i> Manage User
                    </a>
                </li>
                    <?php  
                     
                      
                    
                     # code...
                 } else {
                     # code...
                 }
                 
                ?>
                
                
                <!-- <li class="nav-item">
                    <a class="nav-link" href="./manage_applications.php">
                    <i class="bi bi-card-checklist"></i> Manage Applications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_gleam_admin.php">
                    <i class="bi bi-person"></i> Manage Gleam Admin
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_agent.php">
                    <i class="bi bi-people"></i> Manage Agents
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./universities.php">
                        <i class="bi bi-building"></i> University
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="./countries.php">
                     <i class="bi bi-globe2"></i> Countries
                    </a>
                </li>
                 -->
                <li class="nav-item">
                    <a class="nav-link" href="./profile.php">
                        <i class="bi bi-person-square"></i> Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../backend/login_signup/logout.php">
                        <i class="bi bi-box-arrow-left"></i> Logout
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="../../index.html">
                        <i class="bi bi-house"></i>Our Website
                    </a>
                </li> -->
                
            </ul>
        </div>
    </div>
</nav>