<?php 
session_start();
include 'admin/db_connect.php';



// Remove single items from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the cart!';
    header('location:index.php?page=cart_list');
  }

  // Remove all items at once from cart
  if (isset($_GET['clear'])) {
    $stmt = $conn->prepare('DELETE FROM cart');
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item removed from the cart!';
    header('location:cindex.php?page=cart_list');
  }