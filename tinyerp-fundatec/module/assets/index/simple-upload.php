<?php
// SOURCE + DESTINATION
$source = session_id() . $_FILES["file-upload"]["tmp_name"];
$destination = session_id() . $_FILES["file-upload"]["name"];
$error = "";

// CHECK IF FILE ALREADY EXIST
if (file_exists($destination)) {
  $error = $destination . " ya existe.";
}

// ALLOWED FILE EXTENSIONS
if ($error == "") {
  $allowed = ["jpg", "jpeg", "png", "gif", "docx", "doc", "pdf","xls","xlsx"];
  $ext = strtolower(pathinfo($_FILES["file-upload"]["name"], PATHINFO_EXTENSION));
  if (!in_array($ext, $allowed)) {
    $error = "El archivo " . $_FILES["file-upload"]["name"] . " no es de un tipo de archivo permitido";
  }
}

// LEGIT IMAGE FILE CHECK
//if ($error == "") {
//  if (getimagesize($_FILES["file-upload"]["tmp_name"]) == false) {
//    $error = $_FILES["file-upload"]["name"] . " is not a valid image file.";
//  }
//}

// FILE SIZE CHECK
if ($error == "") {
  // 1,000,000 = 1MB
  if ($_FILES["file-upload"]["size"] > 10000000) {
    $error = $_FILES["file-upload"]["name"] . " - el tamaño del archivo no puede superar los 10 mb";
  }
}

// ALL CHECKS OK - MOVE FILE
//if ($error == "") {
//  if (!move_uploaded_file($source, $destination)) {
//    $error = "Error moviendo $source a $destination";
//  }
//}

// ERROR OCCURED OR OK?
if ($error == "") {
    $_SESSION['garantiaAset']=$destination;
    
  echo 1;
} else {
  echo $error;
}
?>