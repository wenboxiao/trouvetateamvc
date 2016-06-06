	<h3><p class="titrevert">Aide</p></h3>
	<a class="bouton"href="?page=ajouter-sujet">Ajouter un sujet</a>
	<ul>
	<?php
		foreach ($sujets_aide as $sujet) {
	?><table  border="1"  bordercolor="blue" width="80%" align="center">
		<td><h2><a class="titrerouge" href="?page=sujet&id=<?php echo $sujet['id']; ?>"><?php echo $sujet['titre']; ?></a></h2></td>
			<td	width="20%"><?php echo $sujet['date']; ?></td>
		</table>
	<?php
		
		}
	?>
	</ul>