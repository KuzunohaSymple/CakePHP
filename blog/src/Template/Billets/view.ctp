<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Billet $billet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Billet'), ['action' => 'edit', $billet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Billet'), ['action' => 'delete', $billet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $billet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Billets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Billet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="billets view large-9 medium-8 columns content">
    <h3><?= h($billet->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $billet->has('user') ? $this->Html->link($billet->user->name, ['controller' => 'Users', 'action' => 'view', $billet->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($billet->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Content') ?></th>
            <td><?= h($billet->content) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tags') ?></th>
            <td><?= h($billet->tags) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($billet->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($billet->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($billet->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Comments Billet') ?></h4>
        <?php if (!empty($user->comments_billet)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Billet Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Content') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->comments_billet as $commentsBillet): ?>
                    <tr>
                        <td><?= h($commentsBillet->id) ?></td>
                        <td><?= h($commentsBillet->billet_id) ?></td>
                        <td><?= h($commentsBillet->user_id) ?></td>
                        <td><?= h($commentsBillet->content) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'CommentsBillet', 'action' => 'view', $commentsBillet->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'CommentsBillet', 'action' => 'edit', $commentsBillet->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'CommentsBillet', 'action' => 'delete', $commentsBillet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentsBillet->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
