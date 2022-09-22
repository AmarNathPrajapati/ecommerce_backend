<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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
                <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="./customers.php">
                        <i class="bi bi-people-fill"></i>Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_order_details.php">
                        <i class="bi bi-bag-fill"></i>Manage Order Details
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_order_status.php">
                        <i class="bi bi-people-fill"></i>Manage Order Status
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_currency.php">
                        <svg class="pe-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                            <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                        </svg>Manage Currency
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_categories.php">
                        <i class="bi bi-columns-gap"></i>Manage Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_products.php">
                        <i class="bi bi-bag-fill"></i> Manage Products
                    </a>
                </li>

                <li class="nav-item ">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle side_discount" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-cart4"></i> Manage Shipping Charges
                        </a>
                        <ul class="dropdown-menu">
                            <li class="offset-1"><a class="dropdown-item" href="./shipping_category.php">For a Category</a></li>
                            <li class="offset-1"><a class="dropdown-item" href="./shipping_product.php">For a Particular Product</a></li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./manage_freeship.php">
                        <i class="bi bi-cart4"></i> Manage Freeship
                    </a>
                </li>
                <li class="nav-item ">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle side_discount" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg class="pe-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-down-arrow" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5Z" />
                            </svg> Discount
                        </a>
                        <ul class="dropdown-menu">
                            <li class="offset-1"><a class="dropdown-item" href="./discount_oncategory.php">Discount on Category</a></li>
                            <li class="offset-1"><a class="dropdown-item" href="./discount_onproduct.php">Discount on Particular product</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./analytics.php">
                    <i class="bi bi-files"></i> Analytics
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="./manage_career.php">
                    <i class="bi bi-files"></i> Manage Career
                    </a>
                </li> -->

                <?php

                if ($_SESSION["admin_role"] == 1 || $_SESSION["admin_role"] == 2) {
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