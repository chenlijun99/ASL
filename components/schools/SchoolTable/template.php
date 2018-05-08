<script src="script.js"></script>

<div id="school-form-dialog-trigger" class="ui small primary labeled icon button">
	<i class="add icon"></i>
	Aggiungi una scuola
</div>

<h4 class="ui horizontal divider header">
	<i class="building icon"></i>
	Le scuole
</h4>

<div class="ui link items divided">
<?php foreach ($model["schools"] as $school): ?>
	<div class="item">
		<div class="content">
			<a href="?id=<?php echo $school["id"] ?>" class="header"><?php echo $school["name"] ?></a>
			<div class="description">
				<p><?php echo $school["description"] ?></p>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>
<school-form-dialog></school-form-dialog>
