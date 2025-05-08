<?php

use Controller\DBController;

class Listing
{
    public static function getListingById($hostID): array|null
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "SELECT host.*, host_images.* FROM host INNER JOIN host_images ON host.id = host_images.host_id WHERE id = ?";
        $stmt = $dbController->connection->prepare($sql);
        $stmt->bind_param("i", $hostID);
        $stmt->execute();
        $listing = $stmt->get_result()->fetch_assoc();
        $dbController->closeConnection();
        return $listing;
    }
    public static function getAllListings(): array
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "SELECT * FROM host INNER JOIN host_images ON host.id = host_images.host_id";
        $result = $dbController->connection->query($sql);
        $listings = [];
        while ($row = $result->fetch_assoc()) {
            $listings[] = $row;
        }
        $dbController->closeConnection();
        return $listings;
    }
    //Provide country or city as parameters
    public static function filterByRegion($place, $location): array
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "SELECT * FROM host INNER JOIN host_images ON host.id = host_images.host_id WHERE ? = ?";
        $stmt = $dbController->connection->prepare($sql);
        $stmt->bind_param("ss", $place, $location);
        $stmt->execute();
        $stmt->get_result();
        $listings = [];
        while ($row = $stmt->get_result()->fetch_assoc()) {
            $listings[] = $row;
        }
        $dbController->closeConnection();
        return $listings;
    }
    public static function deleteListing($hostID): bool
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "DELETE FROM host, host_images WHERE host.id = host_images.id = ? AND";
        $stmt = $dbController->connection->prepare($sql);
        $stmt->bind_param("i", $hostID);
        $result = $stmt->execute();
        $stmt->close();
        $dbController->closeConnection();
        return $result;
    }
}