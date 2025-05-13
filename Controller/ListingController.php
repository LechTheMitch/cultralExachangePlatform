<?php

namespace Controller;

use Listing;

class ListingController
{
    public static function getListingById($hostID): array|null
    {
        return Listing::getListingById($hostID);
    }

    public static function getAllListings(): array
    {
        return Listing::getAllListings();
    }

    public static function deleteListing($listingID): bool
    {
        return Listing::deleteListing($listingID);
    }

    public static function displayAllListings(): void
    {
        $listings = self::getAllListings();
        foreach ($listings as $listing) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($listing['id']) . '</td>';
            echo '<td>' . htmlspecialchars($listing['name']) . '</td>';
            echo '<td>' . htmlspecialchars($listing['location']) . '</td>';
            echo '<td>' . htmlspecialchars($listing['price']) . '</td>';
            echo '<td><img src="' . htmlspecialchars($listing['image_path']) . '" alt="Listing Image" width="100"></td>';
            echo '<td>
                    <form method="post">
                        <input type="hidden" name="listing_id" value="' . htmlspecialchars($listing['id']) . '">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                    </td>';
            echo '</tr>';
        }
    }

    public static function handleDeletionRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
            $listingID = $_POST['listing_id'];
            $isDeleted = self::deleteListing($listingID);

            if (!$isDeleted) {
                echo '<script>alert("Failed to delete listing.");</script>';
            }
        }
    }
}