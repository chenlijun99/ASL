<div class="ui inverted vertical menu visible fill no-margin">
	<a class="item" href="/pages/dashboard">
		<i class="home icon"></i>
		Home
	</a>
	<?php switch ($model["user"]["role"]): 
		case "admin":?>
			<a class="item" href="/pages/schools">
				<i class="building icon"></i>
				Scuole
			</a>
			<a class="item" href="/pages/courses">
				<i class="book icon"></i>
				Corsi
			</a>
		<?php case "schoolManager": ?>
			<a class="item" href="/pages/students">
				<i class="users icon"></i>
				Studenti
			</a>
		<?php break;?>
		<?php case "teacher": ?>
			<a class="item" href="/pages/myStudents">
				<i class="users icon"></i>
				I miei studenti
			</a>
		<?php break;?>
		<?php case "student": ?>
			<a class="item" href="/pages/myActivities">
				<i class="folder icon"></i>
				Le mie attività
			</a>
		<?php break;?>
		<?php case "businessTutor": ?>
			<a class="item" href="/pages/myBusiness">
				<i class="building outline icon"></i>
				Le mia azienda
			</a>
			<a class="item" href="/pages/myActivities">
				<i class="home icon"></i>
				Attività ASL
			</a>
	<?php endswitch ?>
</div>
