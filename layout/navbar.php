<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg_color">
        <div class="container">
            <a class="navbar-brand font-weight-bold" style="font-family: 'Lato', sans-serif; color: #481639"
                href="index.php"><img src="images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">



                    <!-- If the user is logged in and session is set then these nav option will show -->
                    <?php if (isset($_SESSION['admin']) || isset($_SESSION['staff'])) { ?>



                    <li class="nav-item p-1">
                        <a class="nav-link text-dark font-weight-bold" href="logout.php"><i
                                class="fas fa-power-off"></i></a>
                    </li>

                    <!-- Bell color changing depending on progress -->



                    <!-- <div class="dropdown mt-1">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-item p-1">
                                <a class="nav-link text-dark font-weight-bold" href="profile.php"></i>Profile</a>
                            </li>
                            <li class="dropdown-item p-1">
                                <a class="nav-link text-dark font-weight-bold" href="resetpass.php">Reset Password
                                </a>
                            </li>

                            <li class="dropdown-item p-1">
                                <a class="nav-link text-dark font-weight-bold" href="logout.php">Logout
                                </a>
                            </li>
                        </div>
                    </div> -->

                    <?php } ?>
                    <!-- These are when user is not logged in -->








                </ul>

            </div>
        </div>
    </nav>
</div>