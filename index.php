<?php
// Izinkan akses API (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Buat folder jika belum ada
if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
}
if (!is_dir('metadata')) {
    mkdir('metadata', 0777, true);
}

// Simulasi database assignment yang valid
$existingAssignments = ['asg-001', 'asg-002', 'asg-003'];

$method = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

// Routing sederhana berdasarkan URL dan Method
if ($method === 'POST' && strpos($requestUri, '/api/submissions') !== false) {
    // 1. Validasi Input Tidak Lengkap
    if (!isset($_POST['assignmentId']) || !isset($_POST['studentId']) || !isset($_FILES['file'])) {
        http_response_code(400);
        echo json_encode([
            "success" => false,
            "message" => "Input tidak lengkap! Harap sertakan assignmentId, studentId, dan file."
        ]);
        exit;
    }

    $assignmentId = $_POST['assignmentId'];
    $studentId = $_POST['studentId'];
    $file = $_FILES['file'];

    // 2. Validasi Assignment Tidak Ditemukan
    if (!in_array($assignmentId, $existingAssignments)) {
        http_response_code(404);
        echo json_encode([
            "success" => false,
            "message" => "Assignment dengan ID '$assignmentId' tidak ditemukan."
        ]);
        exit;
    }

    // 3. Proses Upload File
    $fileId = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    ); // UUID v4 generator sederhana

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $storedFilename = $fileId . '.' . $ext;
    $destination = 'uploads/' . $storedFilename;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        $metadata = [
            "fileId" => $fileId,
            "assignmentId" => $assignmentId,
            "studentId" => $studentId,
            "originalFilename" => $file['name'],
            "storedFilename" => $storedFilename,
            "path" => $destination,
            "size" => $file['size'],
            "uploadedAt" => date('c')
        ];

        // Simpan metadata ke file JSON
        file_put_contents("metadata/{$fileId}.json", json_encode($metadata, JSON_PRETTY_PRINT));

        http_response_code(201);
        echo json_encode([
            "success" => true,
            "message" => "Submission berhasil diunggah!",
            "data" => $metadata
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            "success" => false,
            "message" => "Gagal mengunggah file."
        ]);
    }
} 
else if ($method === 'GET' && preg_match('/\/api\/submissions\/([a-zA-Z0-9\-]+)/', $requestUri, $matches)) {
    // Endpoint GET Metadata berdasarkan fileId
    $fileId = $matches[1];
    $metadataPath = "metadata/{$fileId}.json";

    if (file_exists($metadataPath)) {
        $metadata = json_decode(file_get_contents($metadataPath), true);
        http_response_code(200);
        echo json_encode([
            "success" => true,
            "data" => $metadata
        ]);
    } else {
        http_response_code(404);
        echo json_encode([
            "success" => false,
            "message" => "File submission tidak ditemukan."
        ]);
    }
} 
else {
    http_response_code(404);
    echo json_encode([
        "success" => false,
        "message" => "Endpoint tidak ditemukan."
    ]);
}
?>