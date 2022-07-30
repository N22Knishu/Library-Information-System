<?php
  require_once './connection.php';
  function getUserBookHistory($userid){
    global $conn;
    #
    #get all books that user has borrowed and get book image from books table with bookid in single query
    $book_history_query = "SELECT  `bookid`,`name`,`dateOfIssue`,`returnDate`,`book_image`,`category`,`author` FROM `issueregister`  INNER JOIN `books` ON  `issueregister`.`bookId` = `books`.`isbn` WHERE `userId` = '$userid'";
    $book_history_result = $conn->query($book_history_query) or die($conn->error);
    #fetch all rows 
    $book_history = array();
    while($row = $book_history_result->fetch_assoc()){
      $book_history[] = $row;
    }
    #set the return date to Yet to Return if not returned yet
    foreach($book_history as $key => $value){
      #add 30 days to issued datetime
      $expectedReturnDate = date('Y-m-d', strtotime($value['dateOfIssue'] . '+30 days'));
      $status = "";
      if($value['returnDate'] == NULL){ 
        if(date('Y-m-d') > $value['returnDate']){
          $status = "Overdue, due was on ".$expectedReturnDate;
        }
        else{
          $status = 'Yet to Return, due is on '.$expectedReturnDate;
        }
      }
      else{
        $status = 'Returned on '.$value['returnDate'];
      }
      $book_history[$key]['status'] = $status;
    }
    return $book_history;
  }
?>