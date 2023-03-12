<?php
require_once __DIR__ . '/vendor/autoload.php'; // carga la biblioteca cliente de Google API

// Configurar las credenciales de autenticación
$client = new Google_Client();
$client->setApplicationName('Mi aplicación');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig('ruta/a/credenciales.json'); // especificar la ubicación del archivo JSON de credenciales

// Crear un objeto de servicio de hojas de cálculo de Google
$service = new Google_Service_Sheets($client);

// ID de la hoja de cálculo de Google donde se guardarán los datos
$spreadsheetId = ' https://docs.google.com/spreadsheets/d/e/2PACX-1vSu8tk8sDgnaGtocq4GoGQW7AgqBiBVCQPAnSHQJRiAA1BtYYXyKIuJYOZMviqVtmMr7Q7CUIKhciUQ/pubhtml';

// Nombre de la hoja donde se guardarán los datos
$sheetName = 'Info';

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];

// Crear un array con los datos del formulario
$data = array(
    array($id, $name, $correo)
);

// Cargar los datos en la hoja de cálculo de Google
$range = $sheetName . '!A1:C1';
$body = new Google_Service_Sheets_ValueRange([
    'values' => $data
]);
$params = [
    'valueInputOption' => 'RAW'
];
$result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

// Verificar si los datos se cargaron correctamente
if ($result->getUpdates()->getUpdatedCells() > 0) {
    echo 'Los datos se guardaron correctamente en la hoja de cálculo de Google';
} else {
    echo 'Hubo un error al guardar los datos en la hoja de cálculo de Google';
}
?>
