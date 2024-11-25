<?php
// download.php
function forceDownload($filename) {
    $file_path = "apk/" . $filename;
    
    if (file_exists($file_path)) {
        // Establecer headers para forzar la descarga
        header('Content-Type: application/vnd.android.package-archive');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($file_path));
        header('Pragma: no-cache');
        header('Expires: 0');
        
        // Leer y enviar el archivo
        readfile($file_path);
        exit;
    } else {
        // Si el archivo no existe
        header("HTTP/1.0 404 Not Found");
        echo "El archivo no se encuentra disponible.";
    }
}

// Verificar si se está solicitando una descarga
if (isset($_GET['download'])) {
    // Nombre del archivo APK (cámbialo al nombre de tu APK)
    $apk_filename = "registrapp.apk";
    forceDownload($apk_filename);
}
?>