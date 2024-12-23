<?php
include(SITE_ROOT . '/db/db.php');

$error_msg = [];
$id = '';
$name = '';
$prodAll = selectAll('product');
$categoryAll = selectAll('category');

$id_product = $_GET['id'];
$prod = selectOne('product', ['id_product' => $id_product]);

//function getProductById($id) {
//       $query = $this->db->prepare("SELECT id_product, name, price FROM products WHERE id_product = ?");
//    $query->execute([$id]);
//    return $query->fetch(PDO::FETCH_ASSOC);
//}

function getProductById($db, $id)
{
    $db = new PDO('mysql:host=localhost;dbname=Shop', 'root', 'qwerty');
    $product = getProductById($db, 1);
    print_r($product);
    $query = $db->prepare("SELECT id_product, name, price FROM products WHERE id_product = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

//Создание категории
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])) {
//     $name = trim($_POST['name']);
//     if ($name === '') {
//         array_push($error_msg, "Не все поля заполнены!");
//     } elseif (mb_strlen($name, 'UTF8') < 2) {
//         array_push($error_msg, "Категория должна быть длинее одного символа!");
//     } else {
//         $existence = selectOne('Категории', ['Категория' => $name]);
//         if ($existence['Категория'] === $name) {
//             array_push($error_msg, "Такая категория уже существует!");
//         } else {
//             $topic = [
//                 'Категория' => $name
//             ];

//             $id = insert('Категории', $topic);
//             $topics = selectOne('Категории', ['ID_Категория' => $id]);
//             header('location: ' . BASE_URL . 'admin/topics/index.php');
//         }
//     }


// } else {
//     $name = '';
// }

//Редактирование
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
//     $id = $_GET['id'];
//     $topics = selectOne('Категории', ['ID_Категория' => $id]);
//     $id = $topics['ID_Категория'];
//     $name = $topics['Категория'];
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) {
//     $name = trim($_POST['name']);
//     if ($name === '') {
//         array_push($error_msg, "Не все поля заполнены!");
//     } elseif (mb_strlen($name, 'UTF8') < 2) {
//         array_push($error_msg, "Категория должна быть длинее одного символа!");
//     } else {
//         $topic = [
//             'Категория' => $name
//         ];

//         $id = $_POST['id'];
//         $topics_id = update('Категории', 'ID_Категория', $id, $topic);
//         header('location: ' . BASE_URL . 'admin/topics/index.php');
//     }
// }

//Удаление
// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {
//     $id = $_GET['del_id'];
//     deleteAll('Категории', 'ID_Категория', $id);
//     header('location: ' . BASE_URL . 'admin/topics/index.php');
// }

