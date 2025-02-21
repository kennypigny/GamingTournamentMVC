<div>
	<label for="<?php echo $data['name'] ?>"><?php echo $data['displayName'] ?></label>
	<?php if (isset($data['textarea'])) {?>
		<textarea
			name="<?php echo $data['name'] ?>"
			id="<?php echo $data['name'] ?>"
			required></textarea>

	<?php } else {?>
		<input
			name="<?php echo $data['name'] ?>"
			id="<?php echo $data['name'] ?>"
			type="<?php echo isset($data['type']) ? $data['type'] : 'text' ?>"
			<?php if (isset($data['accept'])) {?>
				accept="<?php echo $data['accept']?>"
			<?php }?>
			required />
	<?php }?>

	<?php if (! empty($data['error'])) {?>
		<small><?php echo $data['error'] ?></small>
	<?php }?>
</div>