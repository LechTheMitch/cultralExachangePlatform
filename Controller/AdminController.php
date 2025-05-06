<?php

namespace Controller;
include_once("../Controller/DBController.php");
class AdminController
{
    protected DBController $dbController;


    public static function showUsers($users): void
    {
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . $user['id'] . '</td>';
            echo '<td>' . $user['name'] . '</td>';
            echo '<td>' . $user['email'] . '</td>';
            echo '<td>' . $user['phone_number'] . '</td>';
            echo '<td>' . $user['role'] . '</td>';
            echo '<td> <form method="post">
                                    <input type="hidden" name="user_id" value="' . $user['id'] . '">
                                    <input type="submit" name="delete" class="delete" value="Delete"> </form></td>';
            echo '</tr>';
        }
    }
    public function deleteUser($userID):bool
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "DELETE FROM user WHERE id = $userID";
        $result = $dbController->connection->query($sql);
        $dbController->closeConnection();
        if ($result) {
            return true;
        } else {
            return false;
        }

    }
    public static function handleDeleteRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
            $userIdToDelete = $_POST['user_id'];
            $isDeleted = (new self())->deleteUser($userIdToDelete);

            if (!$isDeleted) {
                echo '<script>alert("Failed to delete user.");</script>';
            }
        }
    }
    public static function displayUsers(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter'])) {
            $role = $_POST['role'];
            $isSubscribed = $_POST['isSubscribed'];
            $filters = [
                'role' => $role,
                'isSubscribed' => $isSubscribed
            ];
            $filteredUsers = self::filterUsers($filters);
            self::showUsers($filteredUsers);
        }
    }
    public static function getSubscriberCount(): int
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $subQuery = "SELECT COUNT(*) FROM traveler WHERE isSubscribed = 1";
        $result = $dbController->connection->query($subQuery);
        $dbController->closeConnection();
        return $result->fetch_column()[0];
    }
    public static function getRevenue() : int
    {
        $revenue = 60 * self::getSubscriberCount();;
        return $revenue;
    }
    public static function generateRevenueReport(){
        $pdf=0;
        $revenue = 60 * self::getSubscriberCount();
        return $pdf;
    }
    public static function deleteListing($listingID):bool
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "DELETE FROM host WHERE id = $listingID";
        $result = $dbController->connection->query($sql);
        $dbController->closeConnection();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function getTotalUsersByRole(string $role) : int
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "SELECT COUNT(*) FROM user WHERE role = ?";
        $stmt = $dbController->connection->prepare($sql);
        $stmt->execute([$role]);
        $result = $stmt->get_result()->fetch_column();
        $dbController->closeConnection();
        return $result;
    }
    public static function filterUsers(array $filters): array
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "SELECT * FROM user WHERE role != 'admin'";
        $params = [];
        $types = "";
        if (!empty($filters['role'])) {
            $sql .= " AND role = ?";
            $params[] = $filters['role'];
            $types .= "s";
        }
        if (isset($filters['isSubscribed'])) {
            $sql .= " AND id IN (SELECT user_id FROM traveler WHERE isSubscribed = ?)";
            $params[] = $filters['isSubscribed'];
            $types .= "i";
        }
        $sql .= " ORDER BY role, name";
        $stmt = $dbController->connection->prepare($sql);
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }//Look at this later
        $stmt->execute();
        $result = $stmt->get_result();
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        $dbController->closeConnection();
        return $users;
    }

}