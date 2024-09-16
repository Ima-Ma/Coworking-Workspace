<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="./b.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .app-menu__item.active {
            background-color: #007bff;
            color: white;
        }

        .app-menu__item.active i,
        .app-menu__item.active .app-menu__label {
            color: white;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #f8f9fa;
            padding: 10px 0;
            list-style: none;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .dropdown-item {
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            display: block;
        }

        .dropdown-item i {
            margin-right: 8px;
        }

        .dropdown-item:hover {
            background-color: #007bff;
            color: white;
        }

        .dropdown-toggle {
            cursor: pointer;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body class="app sidebar-mini ">
    <header class="app-header bg-primary">
        <a class="app-header__logo bg-primary" href="index.html">
            <img height="60px" src="./c.png" alt="">
        </a>
    </header>
    <aside class="app-sidebar bg-light">
        <?php
        session_start();

        if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
            echo '<a href="./profile.php"><h5 class="text-primary mx-5 mt-3 p-2"><i class="fa-solid fa-user-tie"></i> ' . htmlspecialchars($_SESSION['name']) . '</h5></a>';
        } else {
            echo '<a href="./login.php"><h5 class="text-primary mx-5 mt-3 p-2"><i class="fa-solid fa-user-tie"></i> Username</h5></a>';
        }
        ?>
        <ul class="app-menu text-primary">
            <?php
            $currentPage = basename($_SERVER['PHP_SELF']);
            ?>
            <li>
                <a class="app-menu__item <?php echo $currentPage == 'index.php' ? 'active' : ''; ?>" href="index.php">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <br>
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php echo $currentPage == 'admin.php' ? 'active' : ''; ?>" href="./admin.php">
                    <i class="fa-solid fa-user-tie"></i>
                    <br>
                    <span class="app-menu__label">Admin</span>
                </a>
            </li>
              <!-- Dropdown for User Services -->
              <li class="dropdown">
                <a class="app-menu__item dropdown-toggle <?php echo $currentPage == 'services.php' ? 'active' : ''; ?>" href="#" id="userServiceDropdown">
                    <i class="fa-solid fa-briefcase"></i> <br>
                    <span class="app-menu__label">Service</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="userServiceDropdown">
                    <li><a class="dropdown-item" href="virtual_office.php"><i class="fa-solid fa-desktop"></i> Virtual Office</a></li>
                    <li><a class="dropdown-item" href="meeting_room.php"><i class="fa-solid fa-door-open"></i> Meeting Room</a></li>
                    <li><a class="dropdown-item" href="office_space.php"><i class="fa-solid fa-building"></i> Office Space</a></li>
                    <li><a class="dropdown-item" href="booked.php"><i class="fa-solid fa-book"></i> Booking Record</a></li>
                    <li><a class="dropdown-item" href="send.php"><i class="fa-solid fa-paper-plane"></i> Send Documents</a></li>
                </ul>
            </li>
            <li>
                <a class="app-menu__item <?php echo $currentPage == 'workspace.php' ? 'active' : ''; ?>" href="./workspace.php">
                    <i class="fa-solid fa-briefcase"></i>
                    <br>
                    <span class="app-menu__label">WorkSpace Services</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php echo $currentPage == 'events.php' ? 'active' : ''; ?>" href="./events.php">
                    <i class="fa-solid fa-calendar"></i>
                    <br>
                    <span class="app-menu__label">Events</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php echo $currentPage == 'users.php' ? 'active' : ''; ?>" href="./users.php">
                    <i class="fa-solid fa-users-line"></i>
                    <br>
                    <span class="app-menu__label">Users</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php echo $currentPage == 'joinoffice.php' ? 'active' : ''; ?>" href="./joinoffice.php">
                    <i class="fa-solid fa-globe"></i>
                    <br>
                    <span class="app-menu__label">Offices Details</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php echo $currentPage == 'contact.php' ? 'active' : ''; ?>" href="./contact.php">
                    <i class="fa-solid fa-address-book"></i>
                    <br>
                    <span class="app-menu__label">Contact</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php echo $currentPage == 'joinus.php' ? 'active' : ''; ?>" href="./joinus.php">
                    <i class="fa-solid fa-address-book"></i>
                    <br>
                    <span class="app-menu__label">Join Us Details</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php echo $currentPage == 'membership.php' ? 'active' : ''; ?>" href="./membership.php">
                    <i class="fa-regular fa-building"></i>
                    <br>
                    <span class="app-menu__label">Membership</span>
                </a>
            </li>

          
        </ul>
    </aside>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle dropdown on click
            $('.dropdown-toggle').click(function (e) {
                e.preventDefault();
                // Close any other open dropdowns
                $('.dropdown-menu').not($(this).next()).slideUp();
                // Toggle the clicked dropdown
                $(this).next('.dropdown-menu').stop(true, true).slideToggle(300);
            });

            // Close the dropdown if clicked outside
            $(document).click(function (e) {
                if (!$(e.target).closest('.dropdown').length) {
                    $('.dropdown-menu').slideUp(300);
                }
            });
        });
    </script>
</body>

</html>
