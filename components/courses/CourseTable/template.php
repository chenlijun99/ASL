<script src="script.js"></script>

<div id="course-form-dialog-trigger" class="ui small primary labeled icon button">
	<i class="add icon"></i>
	Aggiungi un corso
</div>

<h4 class="ui horizontal divider header">
	<i class="book icon"></i>
	I corsi
</h4>

<div class="ui link items divided">
<?php foreach ($model["courses"] as $course): ?>
	<div class="item">
		<div class="content">
			<a href="?id=<?php echo $course["id"] ?>" class="header"><?php echo $course["name"] ?></a>
			<div class="meta">
				<span class="target-amount">Monte ore: <?php echo $course["targetAmount"] ?> ore</span>
			</div>
			<div class="description">
				<p><?php echo $course["description"] ?></p>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>
<course-form-dialog></course-form-dialog>
