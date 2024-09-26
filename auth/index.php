<?php
session_start();
if (!isset($_SESSION["logged"])) {
        header("Location: login");
        exit();
    } else {
        if ($_SESSION["logged"] != true) {
                header("Location: login");
                exit();
        } else {
            header("Location: ../inicio");
            exit();
        }
    }
