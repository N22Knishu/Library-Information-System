<?php
  require_once('./connection.php');
  function getAllBooks(){
    global $conn;
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);
    $books = $result->fetch_all(MYSQLI_ASSOC);
    return $books;
  }
  function addBook(){
    $idbn = $_POST['isbn'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $copies = $_POST['copies'];
    $softCopyUrl = $_POST['softCopyUrl'];
    $book_image = $_POST['book_image'];
    
    global $conn;
    $sql = "INSERT INTO books (isbn, name, category, author, copies, softCopyUrl, book_image) VALUES ('$isbn', '$name', '$category', '$author', '$copies', '$softCopyUrl', '$book_image')";
    $result = mysqli_query($conn, $sql);
    if($result){
      header('Location: admin.php?success=true');
    }else{
      header('Location: admin.php?success=false');
    }
  }
  function getIssueStatus($isbn, $id){
    global $conn;
    $result = array();
    $sql = "SELECT * FROM issueregister WHERE bookid = '$isbn' AND userid = '$id'";
    $recordQueryResult = $conn->query($sql);
    if($recordQueryResult->num_rows  > 0){
      $issueRecord = $recordQueryResult->fetch_assoc();
      $expectedReturnDate = date('Y-m-d', strtotime($issueRecord['dateOfIssue'] . '+30 days'));
      $status = "";
      if($issueRecord['returnDate'] == NULL){ 
        if(date('Y-m-d') > $expectedReturnDate){
          $days = date_diff(date_create(date('Y-m-d')), date_create($expectedReturnDate));
          $statusCode = -1;
          $result["overdue"] = $days->format("%a");
        }
        else{
          $statusCode = 0;
        }
      }
      else{
        $statusCode = 1;
      }
      $result["status"] = $statusCode;
      return json_encode($result);
    }else{
      $result["status"] = -2;
      return json_encode($result);
    }
  }
  function issueBook($isbn,$id){
    global $conn;
    $sql = "INSERT INTO issueregister (bookid, userid, dateOfIssue) VALUES ('$isbn', '$id', NOW())";
    $insertResult = $conn->query($sql);
    if($insertResult>0){#Yemish
      $_SESSION['status'] = "Book issued successfully";
  } else{
      $_SESSION['status'] = "Book issue failed";
    }
    header('Location: admin.php');
  }
  function searchByUserId($id){
    global $conn;
    $sql = "SELECT * FROM issueregister WHERE `userid` = `$id`";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      #reuturn all as json
      $books = array();
      while($row = $result->fetch_assoc()){
        $books[] = $row;
      }
      return json_encode($books);
    }else{
      return json_encode(array());
    }
  }
  $submitted_form = $_POST['submit']
?>