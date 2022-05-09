<?php
/**
 * The navigator for corridor.
 *
 * @package Corridor
 */
?>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation"
                class="navbar-toggler"
                data-bs-target="#navbarNavDropdown"
                data-bs-toggle="collapse"
                type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a aria-expanded="false"
                       class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown"
                       href="#"
                       id="navbarDropdownMenuLink"
                       role="button">
                        Dropdown link
                    </a>
                    <ul aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
