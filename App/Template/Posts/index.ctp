<h1>Blog posts</h1>
<?php echo $this->Html->link("Add post", array('controller' => 'posts', 'action' => 'add')); ?>
<table>
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Created</th>
	</tr>

	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo $post->id; ?></td>
		<td>
			<?php echo $this->Html->link($post->title,
				array('controller' => 'posts', 'action' => 'view', $post->id)); ?>
		</td>
		<td><?php if (!empty($post->created)) echo $post->created->format('Y-m-d H:i:s'); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($post); ?>
</table>
