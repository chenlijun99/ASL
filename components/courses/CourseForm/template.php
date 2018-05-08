<script src="form.js"></script>

<form class="ui form">
	<h3 class="ui dividing header">Corso</h3>
	<div class="field">
		<label>Nome</label>
		<input name="course[name]" placeholder="Nome corso" type="text">
	</div>
	<div class="field">
		<label>Monte ore</label>
		<input name="course[targetAmount]" placeholder="Monte ore necessario" type="number">
	</div>
	<div class="field">
		<label>Descrizione</label>
		<textarea name="course[description]" placeholder="Descrizione"></textarea>
	</div>


	<h3 class="ui dividing header">Extra</h3>
	<div class="field">
		<label>Scuole che offrono questo corso</label>
		<select name="course[schools]" class="ui fluid search dropdown" multiple="">
			<option value="">Scuole che offrono questo corso</option>
			<?php foreach ($model["schools"] as $school): ?>
			<option value="<?php echo $school["id"]?>"><?php echo $school["name"]?></option>
			<?php endforeach; ?>
		</select>
	</div>
</form>
