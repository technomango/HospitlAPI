<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EjemploController extends CI_Controller {
    public function index()
    {
        try {
            // Simula una operación que podría fallar
            if (true) { // Aquí podrías colocar una condición real
                throw new Exception('Error intencional en el controlador');
            }
        } catch (Exception $e) {
            // Captura el error en Sentry
            Sentry\captureException($e);

            // Opcional: Muestra un mensaje amigable al usuario
            show_error('Ocurrió un error inesperado. Por favor, intente más tarde.', 500);
        }
    }
}