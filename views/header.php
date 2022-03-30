<style>
    nav ul {
        width: 100%;
        color: white;
    }

    nav li {
        transition: .5s;
    }

    nav li,
    nav a {
        cursor: pointer;
        color: white;
    }

    nav a {
        text-decoration: none;
    }

    nav ul li a:hover {
        background-color: whitesmoke;
        color: black;
    }

    nav a+div {
        background-color: white;
        width: 90%;
        height: 1px;
        margin: auto;
        position: relative;
        top: -2px;
    }



    /* header */
    header {
        height: 14em;
        background-color: #2d0fff;
        padding-top: 10px;
        padding-left: 3%;
        padding-right: 3%;
        border-bottom-right-radius: 100%;
        /* border-bottom-left-radius: 100%; */
    }

    @media (max-width:576px) {
        header {
            height: 10em;
        }
    }


    /* logo  */

    /* .logo {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo .square {
        background-color: #2d0fff;
        height: 100px;
        width: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-radius: 20px;
    }

    .logo .gb {
        color: white;
        font-size: 40px;
        border-bottom: 4px solid white;
    }

    @media (max-width:768px) {
        .logo {
            display: none;
        }
    } */
</style>

<header>
    <nav>
        <ul class="nav p-0 m-0">
            <li class="nav-item p-0 m-0">
                <a href="home.php" class=" px-4 py-1">Home</a>
                <div></div>
            </li>
            <li class="nav-item p-0 m-0">
                <a href="admin.php" class=" px-4 py-1">Admin</a>
                <div></div>
            </li>
            <li class="nav-item p-0 m-0 ms-auto">
                <a href="upload_image.php" class=" px-4 py-1">upload image</a>
                <div></div>
            </li>
        </ul>
    </nav>
    <!-- <div class="logo">
        <div class="square">
            <div class="gb">GB</div>
        </div>
    </div> -->
</header>