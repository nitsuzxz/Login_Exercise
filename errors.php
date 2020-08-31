<?php if (count($error) > 0) :?>
	<div>
		<?php foreach($error as $err): ?>
			<p><?php echo $err ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>