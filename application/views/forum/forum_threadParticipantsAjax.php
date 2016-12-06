<?php foreach($participants as $participant): ?>
	<tr>
		<td>
			<?php echo $participant['username']; ?>
		</td>
		<?php if($includeActions): ?>
			<td>
				<button class = "btn btn-danger btn-sm" onclick = "removeParticipant(<?php echo $participant['participant_id']; ?>)">X</button>
			</td>
		<?php endif; ?>
	</tr>
<?php endforeach; ?>