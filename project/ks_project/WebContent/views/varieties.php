<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<meta charset="UTF-8">
<title>Fancy Rat Varieties</title>
	<style>
		table, th, td {
		    border: 1px solid black;
		}
		footer {text-align:center;}
	</style>
</head>

<body>
	<?php include_once(dirname(__FILE__)."/../header.php"); ?>
	
	<div class="container">
		<p>&nbsp;</p>
		<!-- Fetch and display user data -->
		<h1>Fancy Rat Varieties</h1>
		<p>
			The following is a brief description of the rat Varieties as
			recognized by the <a href="http://www.afrma.org/">American Fancy Rat
				and Mouse Association</a>.
		</p>
		<table>
			<tr>
				<th>&nbsp;Description&nbsp;</th>
				<th>&nbsp;Image&nbsp;</th>
			</tr>
			<tr>
				<td>
					<b>Standard</b><br>
					Standard fancy rats have short, smooth, and glossy coats. 
					The males generally have somwehat longer and coarser hair, whereas 
					females generally have finer, softer coats.  
					It has a natural shine and densly covers the body. <br>
					Colors and coat markings can vary greatly. See "Colors and Markings" below.
				</td>
				<td>
					<img src="https://lh6.googleusercontent.com/-pYZjvhtv4LM/VHeU67zminI/AAAAAAAAAG8
						/HaRru6fFeo4/w479-h381-no/800px-Twinkle_Brown_Hooded_t479.jpg"
						alt="Standard" title="Standard Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Rex</b><br>
					Rex rats have even, curly coats. Even their whiskers can be curled.
				</td>
				<td>
					<img src="https://lh5.googleusercontent.com/-MjLg2H7PleA/
						VHeYJNp2HqI/AAAAAAAAAHo/DBdtaelU79Y/w884-h563-no/rex-rat.jpg"
						alt="Rex" title="Rex Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Manx (Tailless)</b><br>
					Manx rats do not have a tail. However, their body proportions 
					should be the same as that of a tailled rat, sans the tail. 
					Because rats use their tails for balance and temperature regulation, 
					extra caution should be taken when caring for a Manx. Like cats, Manx 
					rats may be either completely tailless or have a short, "stumpy" tail.<br>
					According to the AFRMA, "Tailless rats may be shown in any recognized 
					color, marking, or Variety. The distinct feature is the complete 
					absence of a tail. Tailless rats may have a cobbier body and 
					will have a rounded rump."
				</td>
				<td>
					<img src="https://lh5.googleusercontent.com/-HObQXwQgU5I/VHeaxSw2X4I/
							AAAAAAAAAII/PqEkHj8EnF0/w400-h300-no/manx-rat.JPG"
						alt="Manx" title="Manx Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Hairless</b><br>
					Hairless rats are a coat variety characterized by varying levels of hair loss. 
					These rats, bred from Rex rats, can range from having areas of very short 
					fur to being completely bare. Hairless rats have thin, bright, translucent skin, 
					which may be of any color or marking. They eyes also may be of any color. 
					The ears are generally large, and whiskers are normally curly.
				</td>
				<td>
					<img src="https://lh6.googleusercontent.com/-YPESZFvN8Vo/VHedFKaKTtI/AAAAAAAAAI0
							/YpEPq24uP2M/w584-h563-no/hairless-rat.JPG"
						alt="Hairless" title="Hairless Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Satin</b><br>
					Satin rats can be of any color or variety. Their coats are thinner and look 
					longer, with a distinct lustrous sheen. They are also softer to the touch. 
					Their whiskers are normally kinky or wavy. 
				</td>
				<td>
					<img src="https://lh3.googleusercontent.com/-dvZRbPEqJUE/VHedExC0LNI/
								AAAAAAAAAI4/VTHZPHYs_-g/w800-h533-no/satin-rat.jpg"
						alt="Satin" title="Satin Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Dumbo</b><br>
					Dumbo rats are characterized by having large, low, round ears on either side 
					of the head. They can appear in any color, variety, or marking.
				</td>
				<td>
					<img src="https://lh4.googleusercontent.com/-mfcdCK8e7Nk/VHedFKQuLJI
							/AAAAAAAAAIw/tgRwTrbJb-Y/w500-h282-no/dumbo-rat.jpg"
						alt="Dumbo" title="Dumbo Rat" width="500">
				</td>
			</tr>
		</table>
		<br>
		<h1>Colors and Markings: Self Varieties</h1>
		<br>
		<table>
			<tr>
				<th>&nbsp;Self Varieties (a self animal is one of solid color all over)&nbsp;</th>
				<th>&nbsp;Image&nbsp;</th>
			</tr>
			<tr>
				<td>
					<b>Black-Eyed White</b><br>
					These rats are as white as possible, with no creamy tinge/staining.<br> 
					Eyes are black or pink.
				</td>
				<td>
					<img src="https://lh5.googleusercontent.com/-Zn3yF0vu6SQ/VHemydDTTpI
								/AAAAAAAAAJ4/xOq0zjP53yk/w434-h407-no/black-eyed-white.jpg"
						alt="blackeyedwhite" title="Black-Eyed White Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Black</b><br>
					These rats are a deep, solid black. Base fur is also black. Eyes black.
				</td>
				<td>
					<img src="https://lh5.googleusercontent.com/-Ft7JY1YVbsY/VHemySes6ZI
							/AAAAAAAAAJo/sovoIrC0Hyk/w751-h563-no/black.jpg"
						alt="black" title="Black Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Blue</b><br>
					These rats are a deep, steel blue, with no brown coloration. Color on 
					the belly is the same as the color on top. The fur is also blue gray down 
					to the skin. EYes black.
				</td>
				<td>
					<img src="https://lh6.googleusercontent.com/-bnYtQEjR6m0/VHemyMbJTTI
							/AAAAAAAAAKQ/U2BXFBmI3zU/w553-h313-no/blue.jpg"
						alt="blue" title="Blue Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Buff</b><br>
					These rats are an even, warm magnolia color with no grayness. Belly 
					color matches top color. Eyes are a dark ruby, as dark as possible.
				</td>
				<td>
					<img src="https://lh5.googleusercontent.com/-VRI7Fni3wVE/VHemyjSkw4I/
								AAAAAAAAAJw/pBQt4AgKo6k/w930-h563-no/buff.jpg"
						alt="buff" title="Buff Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Chocolate</b><br>
					These rats are a deep, rich chocolate, as even as possible. There are 
					no white hairs or patches. Eyes black.
				</td>
				<td>
					<img src="https://lh3.googleusercontent.com/--qWDLEfgV1c/VHemy291g2I/
								AAAAAAAAAKY/EegNJGTabPU/w540-h360-no/chocolate.jpg"
						alt="chocolate" title="Chocolate Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Mink</b><br>
					These rats are a mid gray-brown, with no silvering or patches. They 
					have a distinct bluish sheen. Eyes black.
				</td>
				<td>
					<img src="https://lh3.googleusercontent.com/-dePUx38lRjo/VHemzC2UT3I/
								AAAAAAAAAJ8/Yn7VF16Lkps/w800-h529-no/mink.jpg"
						alt="mink" title="Mink Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Champagne</b><br>
					These rats are an even warm beige, with no dullness or grayness. Eyes red.
				</td>
				<td>
					<img src="https://lh6.googleusercontent.com/-3dkUFL1Gflo/VHemzHJPAII/
								AAAAAAAAAKE/fHdk2BxEuZg/w554-h507-no/pink-eyed-champagne.jpg"
						alt="champagne" title="Champagne Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Pink-Eyed White</b><br>
					These rats are as white as possible, with no creamy tinge/staining.<br> 
					Eyes are black or pink.
				</td>
				<td>
					<img src="https://lh6.googleusercontent.com/-FrCItz1VP38/VHemztUliOI
								/AAAAAAAAAKM/6nc1joG9t6Q/w570-h428-no/pink-eyed-white.jpg"
						alt="pinkeyedwhite" title="Pink-Eyed White Rat" width="500">
				</td>
			</tr>
		</table>
		<br>
		<h1>Colors and Markings: Marked Varieties</h1>
		<br>
		<table>
			<tr>
				<th>&nbsp;Marked Varieties&nbsp;</th>
				<th>&nbsp;Image&nbsp;</th>
			</tr>
			<tr>
				<td>
					<b>Berkshire</b><br>
					These rats are symetrically marked, with as much white on the chest/belly 
					as possible. The white does not extend up the sides of the body, and the 
					edges will be clear-cut. Body color conforms to color variety. The white 
					area will be pure white. There may be a white spot on the forhead.
				</td>
				<td>
					<img src="https://lh4.googleusercontent.com/-lOjsWmAk6O4/VHevEIuAmNI/
								AAAAAAAAALI/ku1Lqh17f6U/w389-h562-no/berkshire.jpg"
						alt="berkshire" title="Berkshire Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Capped</b><br>
					Top color in these rats does not extend past the ears, and follows the 
					line of the lower jaw bone. It does not extend under the chin. There 
					may be a white blaze or a spot on the face, and the rest of the body 
					will be pure white.
				</td>
				<td>
					<img src="https://lh5.googleusercontent.com/-C1mFr-5wSgU/VHevEb315II/
								AAAAAAAAALE/EX3WgChCIQY/w570-h563-no/capped.jpg"
						alt="capped" title="Capped Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Hooded</b><br>
					The hood of these rats is unbroken, covering the head, throat, chest, and shoulders. 
					It extends down the spine to the tail. The rest of the rat is pure white. 
				</td>
				<td>
					<img src="https://lh3.googleusercontent.com/-gaD2u63CJzI/VHevEK47hqI/
								AAAAAAAAAK8/yvl3n6J50Zg/w500-h365-no/hooded.jpg"
						alt="hooded" title="Hooded Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Irish</b><br>
					These rats have a white equilateral triangle on the chest.
				</td>
				<td>
					<img src="https://lh3.googleusercontent.com/-1f8Xcs-k9kk/
								VHevEpwsPTI/AAAAAAAAALU/dgUOGUoUTyU/w594-h563-no/irish.jpg"
						alt="irish" title="Irish Rat" width="500">
				</td>
			</tr>
			<tr>
				<td>
					<b>Variegated</b><br>
					These rats have a distinct color on their head and shoulders 
					with a blaze on the forehead. The variegation covers the 
					body from the shoulders to the tail including the sides. 
					Color can be any color variety. Underside is pure white. 
				</td>
				<td>
					<img src="https://lh5.googleusercontent.com/-dkpRTDqDN_A/
								VHevE-B6MeI/AAAAAAAAALQ/1Tm7GEvDYwY/w845-h563-no/variegated.jpg"
						alt="variegated" title="Variegated Rat" width="500">
				</td>
			</tr>
		</table>
		<br>
	</div>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script
		src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		
	<footer>
		<p>-x-</p>
		<p>
			<i>Rat Chat Website created by Shelley Klinzing</i>
		</p>
		<p>
			Images found on Google. I own nothing!
		</p>
	</footer>
</body>
</html>