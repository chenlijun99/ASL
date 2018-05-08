<script src="form.js"></script>

<form class="ui form">
	<div class="field">
		<label>Nome</label>
		<input name="school[name]" placeholder="Nome corso" type="text">
	</div>
	<div class="field">
		<label>Descrizione</label>
		<textarea name="school[description]" placeholder="Descrizione"></textarea>
	</div>

	<div class="field">
		<label>Corsi</label>
		<select name="school[courses][]" class="ui fluid search dropdown" multiple="">
			<option value="">Corsi offerti da questa scuola</option>
			<?php foreach ($model["courses"] as $course): ?>
				<option value="<?php echo $course["id"]?>"><?php echo $course["name"]?></option>
			<?php endforeach; ?>
		</select>
	</div>
</form>
