<?php
include "db.php";

/* ===== CONTACT FORM ===== */
if (isset($_POST['action']) && $_POST['action'] === "contact") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_messages (name, email, message)
            VALUES ('$name', '$email', '$message')";

    $conn->query($sql);
    header("Location: contact.php?success=1");
    exit;
}

/* ===== LIST PET FORM ===== */
if (isset($_POST['action']) && $_POST['action'] === "list_pet") {

    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp, "uploads/$photo");

    $sql = "INSERT INTO pets 
    (pet_name, type, age, description, photo, owner_name, owner_email, phone, address)
    VALUES (
        '$_POST[pet_name]',
        '$_POST[type]',
        '$_POST[age]',
        '$_POST[description]',
        '$photo',
        '$_POST[owner_name]',
        '$_POST[owner_email]',
        '$_POST[phone]',
        '$_POST[address]'
    )";

    $conn->query($sql);
    header("Location: adopt.php");
    exit;
}
?>
