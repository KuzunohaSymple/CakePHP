<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CommentsBillet $commentsBillet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Comments Billet'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentsBillet form large-9 medium-8 columns content">
    <?= $this->Form->create($commentsBillet) ?>
    <fieldset>
        <legend><?= __('Add Comments Billet') ?></legend>
        <?php
            echo $this->Form->control('billet_id');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
