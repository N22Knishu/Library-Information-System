<?php
    session_start();
    $userid = $_SESSION['userid'];
    require_once('./pageRouter.php');
    require_once('user_functions.php');#table chalu Mmm
    $bookHistory = getUserBookHistory($userid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!--card for user profile-->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>User Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="images/logo.png" alt="user" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title"><?php echo $_SESSION['username']; ?></h5>
                                <p class="card-text">
                                    <?php echo $_SESSION['userrole']; ?>
                                </p>
                                <a href="logout.php" class="btn btn-primary">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Book History</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Issued Date</th>
                                    <th>Return Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($bookHistory as $book){
                                        echo '<tr>';
                                        echo '<td>'.$book['name'].'</td>';#name vasthondhi kani catagory ravatledhu choddam emindho
                                        echo '<td>'.$book['category'].'</td>';
                                        echo '<td>'.$book['author'].'</td>';
                                        echo '<td>'.$book['dateOfIssue'].'</td>'; #ippudu baaga vasthindhi Masha table kada
                                        echo '<td>'.$book['status'].'</td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>