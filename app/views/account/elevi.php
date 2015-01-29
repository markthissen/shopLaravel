<html>

<head>
	<style>
	
	table {
    	margin: 0 auto;
	}
	p {
		text-align: center;
		color:blue;
	}
	th,td {
		padding:15px;
	}
	</style>
</head>

<body>
	<p>Lista studenti</p>
	<?php 
	echo '<table border=1>';
	echo '<tr>
			<th>Nume</th>
			<th>Adresa</th>
			<th>Oras</th>
		</tr>';

	foreach ($elevi as $user)
	{
	    echo '<tr><td>'.$user->Nume.'</td>';
	    echo '<td>'.$user->address.'</td>';
	    echo '<td>'.$user->city.'</td></tr>';
	}
	echo '</table>';
	?>

</body>

</html>