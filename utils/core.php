<?php
// Archivo usado para declarar rutas globales y configuraciones

# Start de la sesión
session_start();

// Rutas
$r_base = 'http://192.168.1.2'; // http://vacunacol.rf.gd
$r_static = $r_base . "/static";
$r_auth = $r_base . "/auth";
$r_vacunas = $r_base . "/vacunas";