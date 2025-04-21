<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);



echo "1";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'] ?? '';
    $user_id = $_POST['user'] ?? '';
    $transaction_status = $_POST['transaction_status'] ?? '';
    $product_id = $_POST['product_id'] ?? '';
    $cost = $_POST['cost'] ?? '';

    // Basic validation
    if (empty($transaction_id) || empty($user_id) || empty($transaction_status)) {
        echo "Invalid input.";
        header('Location: /users_index');
        exit();
    }

    try {


        $db->query(
            "INSERT INTO users_donate_endowments (
                user_id,
                endowment_id,
                transaction_id,
                status,
                cost,
                donate_date
            ) VALUES (
                :user_id,
                :endowment_id,
                :transaction_id,
                :status,
                :cost,
                :donate_date
            )",
            [
                'user_id' => filter_var($_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT),
                'endowment_id' => $_POST['product_id'],
                'transaction_id' => filter_var($transaction_id, FILTER_SANITIZE_STRING),
                'status' => filter_var($transaction_status, FILTER_SANITIZE_STRING),
                'cost' => filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
                'donate_date' => date('Y-m-d H:i:s') // Defaulting to current timestamp if not provided
            ]
        );
    } catch (PDOException $e) {
        error_log($e->getMessage());
        abort(500);
    }
} else {
    echo "Invalid request method.";
}
