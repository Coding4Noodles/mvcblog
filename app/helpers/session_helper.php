<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    function isAdmin() {
        if (isset($_SESSION['account']) && $_SESSION['account'] == 'admin') {
            return true;
        } else {
            return false;
        }
    }
