<?php
echo "Example 1: Simple echo back<br>";
echo "Thank for responding to URL Nosh";
echo "<br>";
print_r ( $_GET );
echo "<br>";
?>
<?php

echo "Example 2: All in Php using foreach<br>";
foreach ( $_GET as $myparam => $myvalue ) {
	echo "$myparam has value: $myvalue<br>";
}
echo "<br>Example 3: Variables in single quotes aren't evaluated<br>";
foreach ( $_GET as $myparam => $myvalue ) {
	echo '$myparam has value: $myvalue<br>';
}
?>
<section>
	<p>
		Example 4: HTML and PhP mixed<br>
	</p>
	<ul>
<?php
foreach ( $_GET as $param => $value ) {
	?>
<li> Parameter <?= $param?>: <?= $value ?></li>
<?php } ?>
</ul>
</section>
<section>
	<p>Example 5: Checking to see something is set</p>
<?php
if (isset ( $_GET ["favorite"] )) {
	echo $_GET ["favorite"] . "<br>";
} else {
	echo "No favorite was set";
}
echo $_GET ['favorite'];
?>
</section>
<section>
	<p>
		Example 6: HTML and PhP mixed using &lt;?=<br>
	</p>
	<ul>
<?php
foreach ( $_GET as $param => $value ) {
	?>
<li> Parameter <?= $param?>: <?= $value ?></li>
<?php } ?>
</ul>
</section>
<section>
	<p>Example 7: Checking to see something is set</p>
<?php
if (isset ( $_GET ["favorite"] )) {
	echo $_GET ["favorite"] . "<br>";
} else {
	echo "No favorite was set";
}
echo $_GET ['favorite'];
?>
</section>
<section>
	<p>Example 8: Processing an array</p>
<?php
if (isset ( $_GET ["interests"] )) {
	echo "NOSH user interests:<br>";
	$interests = $_GET ["interests"];
	for($k = 0; $k < count ( $interests ); $k ++) {
		echo $interests [$k] . "<br>";
	}
} else {
	echo "No interests";
}
?>
</section>