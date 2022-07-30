<?php
    require_once(`./connection.php`);
    function getFetchResult($searchQuery){
        global $conn;
        $sql = "SELECT * FROM books WHERE name LIKE '%$searchQuery%' OR author LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%'" ;
        $result = $conn->query($sql);
        $books = $result->fetch_all(MYSQLI_ASSOC);
        return $books;
    }
    getFetchResult($_POST{'searchQuery'});
?>