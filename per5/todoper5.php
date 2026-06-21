<?php
include 'koneksi.php';

// 1. PROSES TAMBAH DATA (CREATE)
if (isset($_POST['add_task'])) {
    $task = mysqli_real_escape_string($conn, $_POST['task_text']);
    if (!empty($task)) {
        mysqli_query($conn, "INSERT INTO todos (task_text) VALUES ('$task')");
    }
    // Mengalihkan kembali ke halaman pert4.php pada bagian Todo App
    header("Location: pert4.php#todo-app");
    exit();
}

// 2. PROSES UPDATE STATUS (TOGGLE COMPLETED)
if (isset($_GET['toggle'])) {
    $id = $_GET['toggle'];
    $status = $_GET['status'];
    // Jika status 1 (selesai) ubah ke 0 (belum selesai), dan sebaliknya
    $new_status = ($status == 1) ? 0 : 1;

    mysqli_query($conn, "UPDATE todos SET completed = $new_status WHERE id = $id");
    header("Location: pert4.php#todo-app");
    exit();
}

// 3. PROSES HAPUS DATA (DELETE)
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM todos WHERE id = $id");
    header("Location: pert4.php#todo-app");
    exit();
}
?>