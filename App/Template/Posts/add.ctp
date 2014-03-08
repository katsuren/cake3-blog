<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('Post.title');
echo $this->Form->input('Post.body', array('rows' => '3'));
echo $this->Form->submit('Save Post');
echo $this->Form->end();
?>
