<?php
require_once __DIR__ . '/../config/database.php';

if (!is_logged_in()) {
    http_response_code(401);
    echo 'Sesi tidak valid. Silakan login kembali.';
    exit;
}

$search = trim($_GET['search'] ?? '');
$jurusan = trim($_GET['jurusan'] ?? '');

$where = [];
$params = [];
if ($search !== '') {
    $where[] = '(nbi LIKE :search OR nama LIKE :search OR jurusan LIKE :search OR email LIKE :search)';
    $params[':search'] = "%$search%";
}
if ($jurusan !== '') {
    $where[] = 'jurusan = :jurusan';
    $params[':jurusan'] = $jurusan;
}
$whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

$stmt = $pdo->prepare(
    "SELECT nbi, nama, jurusan, angkatan, email, no_hp, alamat FROM mahasiswa $whereSql ORDER BY nama ASC"
);
$stmt->execute($params);
$rows = $stmt->fetchAll();

header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="data_mahasiswa_' . date('Ymd_His') . '.csv"');

$out = fopen('php://output', 'w');
// BOM agar Excel membaca karakter UTF-8 (misal nama dengan aksen) dengan benar.
fwrite($out, "\xEF\xBB\xBF");
fputcsv($out, ['NBI', 'Nama', 'Jurusan', 'Angkatan', 'Email', 'No. HP', 'Alamat']);
foreach ($rows as $row) {
    fputcsv($out, $row);
}
fclose($out);
exit;
