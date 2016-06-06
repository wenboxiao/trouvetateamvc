	<h3><p class="titrevert">Aide</p></h3>
	<a class="bouton"href="?page=ajouter-sujet">Ajouter un sujet</a>
	<ul>
	<table  border="1"  bordercolor="blue" width="80%" align="center" cellspacing="10" cellpadding="10" color="blue">
	<tr>
		<td width=50%> Sujet </td>
		<td width=30%>ecrit par :</td>
		<td width=20%>Date </td>
	</tr></table>
	<?php
		foreach ($sujets_aide as $sujet) {
	?>
<table  border="1"  bordercolor="blue" width="80%" align="center">
	
<tr>		<td><h2><a class="titrerouge" href="?page=sujet&id=<?php echo $sujet['id']; ?>"><?php echo $sujet['titre']; ?></a></h2></td>
			<td width=30%><?php echo $sujet['id_membre'];?></td>
			<td	width="20%"><?php echo $sujet['date']; ?></td>
			
</tr>
		</table>
	<?php
		
		}
	?>
	</ul>