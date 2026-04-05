<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách học viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 0; }
        .page-header { background: white; padding: 2rem 0 1.5rem 0; margin-bottom: 2rem; border-bottom: 2px solid #e5e7eb; }
        h1 { font-size: 2rem; font-weight: 700; color: #1f2937; margin: 0 0 1.5rem 0; display: flex; align-items: center; gap: 0.75rem; }
        h1::before { content: '\f501'; font-family: 'Font Awesome 6 Free'; font-weight: 900; color: #f59e0b; }
        .nut { margin-bottom: 0; }
        .btn { display: inline-flex !important; align-items: center !important; gap: 0.5rem !important; padding: 0.75rem 1.5rem !important; font-size: 0.95rem !important; font-weight: 600 !important; color: white !important; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important; border: none !important; border-radius: 10px !important; text-decoration: none !important; transition: all 0.3s ease !important; box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3) !important; cursor: pointer !important; }
        .btn:hover, .btn:focus, .btn:active, .btn:visited { color: white !important; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%) !important; transform: translateY(-2px) !important; box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4) !important; text-decoration: none !important; }
        .btn::before { content: '\f067'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .table-container { background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; padding: 1rem; text-align: left; font-weight: 600; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; }
        td { padding: 1rem; text-align: left; border-bottom: 1px solid #e5e7eb; color: #374151; font-size: 0.9rem; line-height: 1.5; }
        tr:last-child td { border-bottom: none; }
        tbody tr:nth-child(even) { background-color: #f9fafb; }
        tbody tr:hover { background-color: #f3f4f6; transition: background-color 0.2s ease; }
        td:last-child { display: flex; gap: 0.5rem; border-bottom: none; }
        .btn-edit { display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; padding: 0.5rem 1rem !important; font-size: 0.85rem !important; font-weight: 600 !important; color: white !important; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%) !important; border: none !important; border-radius: 8px !important; text-decoration: none !important; transition: all 0.3s ease !important; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3) !important; }
        .btn-edit:hover, .btn-edit:focus, .btn-edit:active, .btn-edit:visited { color: white !important; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%) !important; transform: translateY(-2px) !important; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4) !important; text-decoration: none !important; }
        .btn-edit::before { content: '\f044'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .btn-delete { display: inline-flex !important; align-items: center !important; gap: 0.4rem !important; padding: 0.5rem 1rem !important; font-size: 0.85rem !important; font-weight: 600 !important; color: white !important; background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important; border: none !important; border-radius: 8px !important; text-decoration: none !important; transition: all 0.3s ease !important; box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3) !important; }
        .btn-delete:hover, .btn-delete:focus, .btn-delete:active, .btn-delete:visited { color: white !important; background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important; transform: translateY(-2px) !important; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4) !important; text-decoration: none !important; }
        .btn-delete::before { content: '\f2ed'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .empty-state { text-align: center; padding: 3rem; color: #6b7280; }
        .empty-state i { font-size: 3rem; margin-bottom: 1rem; color: #d1d5db; }
        .text-muted { color: #9ca3af; font-style: italic; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Danh sách học viên</h1>
        <div class="nut">
            <a class="btn" href="index.php?page_layout=themhocvien">Thêm học viên</a>
        </div>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Năm sinh</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
<?php
$sql = "SELECT `id`, `ho_ten`, `nam_sinh`, `sdt`, `email` FROM `nguoi_dung` WHERE `vaitro_id` = 3";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id'] ?? '') . '</td>';
        echo '<td><strong>' . htmlspecialchars($row['ho_ten'] ?? 'N/A') . '</strong></td>';
        echo '<td>' . ($row['nam_sinh'] ? htmlspecialchars($row['nam_sinh']) : '<span class="text-muted">Chưa cập nhật</span>') . '</td>';
        echo '<td>' . ($row['sdt'] ? htmlspecialchars($row['sdt']) : '<span class="text-muted">Chưa cập nhật</span>') . '</td>';
        echo '<td>' . ($row['email'] ? htmlspecialchars($row['email']) : '<span class="text-muted">Chưa cập nhật</span>') . '</td>';
        echo '<td>';
        echo '<a class="btn-edit" href="index.php?page_layout=suahocvien&id=' . $row['id'] . '">Sửa</a>';
        echo '<a class="btn-delete" href="index.php?page_layout=xoahocvien&id=' . $row['id'] . '" onclick="return confirm(\'Bạn có chắc muốn xóa học viên này?\')">Xóa</a>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6" class="empty-state"><i class="fas fa-inbox"></i><p>Chưa có học viên nào. Hãy thêm học viên đầu tiên!</p></td></tr>';
}
?>
            </tbody>
        </table>
    </div>
</body>
</html>