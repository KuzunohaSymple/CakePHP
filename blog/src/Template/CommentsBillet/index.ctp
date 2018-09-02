<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CommentsBillet[]|\Cake\Collection\CollectionInterface $commentsBillet
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Comments Billet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commentsBillet index large-9 medium-8 columns content">
    <h3><?= __('Comments Billet') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('billet_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commentsBillet as $commentsBillet): ?>
            <tr>
                <td><?= $this->Number->format($commentsBillet->id) ?></td>
                <td><?= $this->Number->format($commentsBillet->billet_id) ?></td>
                <td><?= $commentsBillet->has('user') ? $this->Html->link($commentsBillet->user->name, ['controller' => 'Users', 'action' => 'view', $commentsBillet->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $commentsBillet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $commentsBillet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $commentsBillet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commentsBillet->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
