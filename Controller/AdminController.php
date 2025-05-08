<?php

namespace Controller;
use UserTypes\Admin;

include_once("../Controller/DBController.php");
final class AdminController
{

    public static function handleRequest(): void
    {
        $action = $_POST['action'] ?? '';

        switch ($action) {
            case 'displayUsers':
                $role = $_POST['role'] ?? '';
                if (!empty($role)) {
                    Admin::displayUsers($role);
                } else {
                    echo '<div class="error">Role is required to display users.</div>';
                }
                break;

            case 'deleteUser':
                $userId = $_POST['user_id'] ?? 0;
                if ($userId > 0) {
                    $isDeleted = (new Admin())->deleteUser($userId);
                    echo $isDeleted ? 'User deleted successfully.' : 'Failed to delete user.';
                } else {
                    echo '<div class="error">Invalid user ID.</div>';
                }
                break;

            case 'getSubscriberCount':
                echo Admin::getSubscriberCount();
                break;

            case 'getRevenue':
                echo Admin::getRevenue();
                break;

            case 'filterUsers':
                $filters = [
                    'role' => $_POST['role'] ?? '',
                    'isSubscribed' => isset($_POST['isSubscribed']) ? (int)$_POST['isSubscribed'] : null,
                ];
                $filteredUsers = Admin::filterUsers($filters);
                Admin::showUsers($filteredUsers);
                break;

            default:
                echo '<div class="error">Invalid action.</div>';
                break;
        }
    }

}