<?php
session_start ();
/* if the user isn't logged in, don't let them view profiles */
if (! (isset ( $_SESSION ['userLoginStatus'] ) && $_SESSION ['userLoginStatus'] == 1)) {
	header ( "location: ../index.php" );
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="../jquery/jquery-2.1.1.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
<title>User Profile</title>
<style>
footer {
	text-align: center;
}

ul {
	padding: 0 0 0 0;
	margin: 0 0 0 0;
	
}

ul li {
	list-style: none;
	padding: 0 0 0 0;
	margin: 0 0 0 0;
}

ul li img {
	cursor: pointer;
	width: 100px;
	height: 100px;
	overflow: hidden;
}

.modal-body {
	padding: 5px !important;
}

.modal-content {
	border-radius: 0;
}

.modal-dialog img {
	text-align: center;
	margin: 0 auto;
}

.controls {
	width: 50px;
	display: block;
	font-size: 11px;
	padding-top: 8px;
	font-weight: bold;
}

.next {
	float: right;
	text-align: right;
}
/*override modal for demo only*/
.modal-dialog {
	max-width: 500px;
	padding-top: 90px;
}

@media screen and (min-width: 768px) {
	.modal-dialog {
		width: 500px;
		padding-top: 90px;
	}
}

table, th, td {
	border: 1px solid black;
}
</style>
</head>

<body>
	<!-- This must be declared early so we can put a link in the nav bar to the user's profile -->
	<?php $username = $_GET ['username']; ?>
	<?php include_once(dirname(__FILE__)."/../header.php"); ?>
	
	<!-- USER INFORMATION -->
	<div class="container">
		<p>&nbsp;</p>
		<!-- Fetch and display user data -->
		<?php
		include_once (dirname ( __FILE__ ) . "/showUser.php");
		include_once (dirname ( __FILE__ ) . "/showUserImage.php");
		/* print out their user profile picture */
		showUserImage ( $username, "large" );
		echo "<br>";
		/* show the user information */
		showUser ( $username, "userProfile.php?username=" );
		if (isset ( $_SESSION ['userLoginStatus'] ) && $_SESSION ['userLoginStatus'] == 1 && $_SESSION ['userName'] == $username) {
			// echo "<a href=\"../controllers/editProfileController.php\" class=\"btn btn-default\" role=\"button\">Edit Profile</a>";
			echo '<a href="../controllers/editProfileController.php" class="btn btn-default" role="button">Edit Profile</a>';
		}
		?>
	</div>
	
	<!-- IMAGE GALLERY -->
	<div class="container">
		<p>&nbsp;</p>
		<div class="panel panel-default" style="width:750px;">
		<div class="panel-heading"><label>Gallery</label></div>
		<div class="panel-body">
			<ul class="row" >
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/berkshire.jpg" title="Berkshire Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/black-eyed-white.jpg" title="Black Eyed White Rat"
					width="100"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/black.jpg" title="Black Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/blue.jpg" title="Blue Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/capped.jpg" title="Capped Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/chocolate.jpg" title="Chocolate Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/dumbo-rat.jpg" title="Dumbo Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/hairless-rat.jpg" title="Hairless Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/hooded.jpg" title="Hooded Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/irish.jpg" title="Irish Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/manx-rat.jpg" title="Manx Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/mink.jpg" title="Mink Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/pink-eyed-champagne.jpg"
					title="Pink Eyed Champagne Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/pink-eyed-white.jpg" title="Pink Eyed White Rat"
					width="100"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/rex-rat.jpg" title="Rex Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/satin-rat.jpg" title="Satin Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/standard-rat.jpg" title="Standard Rat"></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img
					src="../image/variegated.jpg" title="Variegated Rat"></li>
			</ul>
		</div></div>
	</div>
	
	<form class="form-vertical" role="form" enctype="multipart/form-data" action ="../controllers/editProfileController.php" method="Post">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<input type="hidden" name="MAX_FILE_SIZE" value="999999999" />
					<label for="gallery">Add photos to gallery:</label>
					<input class="btn btn-default" type="file" name="addPhoto" id="addPhoto" accept="image/*">
				</div>
			</div>
		</div>
	</form>
	

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body"></div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<script>
	$(document).ready(function(){        
        $('li img').on('click',function(){
            var src = $(this).attr('src');
            var img = '<img src="' + src + '" class="img-responsive"/>';
            //start of new code new code
            var index = $(this).parent('li').index();   
            var html = '';
            html += img;                
            html += '<div style="height:25px;clear:both;display:block;">';
            html += '<a class="controls next" href="'+ (index+2) + '">next &raquo;</a>';
            html += '<a class="controls previous" href="' + (index) + '">&laquo; prev</a>';
            html += '</div>';
            $('#myModal').modal();
            $('#myModal').on('shown.bs.modal', function(){
                $('#myModal .modal-body').html(html);
                //new code
                $('a.controls').trigger('click');
            })
            $('#myModal').on('hidden.bs.modal', function(){
                $('#myModal .modal-body').html('');
            });
       });
    })
    $(document).on('click', 'a.controls', function(){
        var index = $(this).attr('href');
        var src = $('ul.row li:nth-child('+ index +') img').attr('src');             
        $('.modal-body img').attr('src', src);
        var newPrevIndex = parseInt(index) - 1; 
        var newNextIndex = parseInt(newPrevIndex) + 2; 
        if($(this).hasClass('previous')){               
            $(this).attr('href', newPrevIndex); 
            $('a.next').attr('href', newNextIndex);
        }else{
            $(this).attr('href', newNextIndex); 
            $('a.previous').attr('href', newPrevIndex);
        }
        var total = $('ul.row li').length + 1; 
        //hide next button
        if(total === newNextIndex){
            $('a.next').hide();
        }else{
            $('a.next').show()
        }            
        //hide previous button
        if(newPrevIndex === 0){
            $('a.previous').hide();
        }else{
            $('a.previous').show()
        }
        return false;
    });
    </script>
	<footer>
		<p>-x-</p>
		<p>
			<i>Rat Chat Website created by Shelley Klinzing</i>
		</p>
	</footer>
</body>
</html>