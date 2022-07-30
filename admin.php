<?php
	require_once('./connection.php');
	session_start();
	require_once('./pageRouter.php');
	require_once('./admin_functions.php');
	$bookHistory = getAllBooks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<!-- centered Navbar -->
	
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<a class="navbar-brand" href="#">Admin</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<!--modal for login-->
				<li class="nav-item">
					<button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#addBookModal">Add book</button>
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#issueModal">Issue book</button>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">
						<i class="fas fa-user-circle"></i>
						<span class="sr-only">Test</span>
					</a>
					
				</li>
			</ul>
		</div>
	</nav>
	
	<!--modals-->
	<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addBookModal">Add Book</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="login.php">
					<div class="form-group">
						<label for="isbn">isbn</label>
						<input type="text" class="form-control" id="isbn" aria-describedby="isbn" placeholder="Enter isbn" name="isbn">
		
					</div>
					<div class="form-group">
						<label for="name">Book Name</label>
						<input type="text" class="form-control" id="name" placeholder="Book Name" name="name">
					</div>
                    <div class="form-group">
						<label for="author">Author</label>
						<input type="author" class="form-control" id="author" placeholder="enter author name" name="author">
					</div>
                    <div class="form-group">
						<label for="copies">Copies</label>
						<input type="number" class="form-control" id="copies" placeholder="Enter number of copies" name="copies">
					</div>
                    <div class="form-group">
						<label for="book_image">Book Image</label>
						<input type="text" class="form-control" id="book_image" placeholder="Enter image Url" name="book_image">
					</div>
                    <div class="form-group">
						<label for="url">Url</label>
						<input type="tex" class="form-control" id="url" placeholder="Enter soft copy Url" name="softCopyUrl">
					</div>
				#temere 
					<button type="submit" class="btn btn-primary" name="addbook">Save</button>
				</form>
			</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addBookModal">Return book</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="login.php">
					<div class="form-group">
						<label for="email">isbn</label>
						<input type="email" class="form-control" id="isbn" aria-describedby="ISBN number" placeholder="Enter ISBN number" name="isbn">
					</div>
					<div class="form-group">
						<label for="userid">ID number</label>
						<input type="userid" class="form-control" id="userid" placeholder="User ID" name="userid">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			</div>
		</div>
	</div>
	<!--search bar-->
	<div class="d-flex justify-content-center">
		<div class="card" align="center">
			<div class="container" align="center">
				<div class="row">
					<div class="col-md-12">
						<div class="input-group mb-3" >
							<input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="button" onClick="">Search</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ISBN</th>
							<th>Name</th>
							<th>Author</th>
							<th>Category</th>
							<th>Copies</th>
							<th>Soft Copy Url</th>
						</tr>
					</thead>
					<tbody id="searchResult">s
						<?php
							foreach($bookHistory as $book){
								echo '<tr>';
								echo '<td>'.$book['isbn'].'</td>';
								echo '<td>'.$book['name'].'</td>';
								echo '<td>'.$book['author'].'</td>';
								echo '<td>'.$book['category'].'</td>';
								echo '<td>'.$book['copies'].'</td>';
								if($book['softCopyUrl'] == null){
									echo '<td>Not Available</td>';
								}
								else{
									echo '<td><button type="button" class="btn btn-primary"><a href="'.$book["softCopyUrl"].'" style ="color:white">Soft Copy URL</a></button></td>';
								}
								echo '</tr>';
							}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		function getSearchResult($searchQuery){
			//send ajax request
			$.ajax({
				url: "search.php",
				type: "POST",
				data: {
					searchQuery: $searchQuery
				},
				success: function(data){
					$("#searchResult").html(data);
				}
			});
		}
	</script>
</body>
</html>