<h1><?php echo h($post->title); ?></h1>
<p><small>Created: <?php echo $post->created->format('Y-m-d H:i:s'); ?></small></p>
<p><?php echo h($post->body); ?></p>
