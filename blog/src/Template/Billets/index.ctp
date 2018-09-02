<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Billet[]|\Cake\Collection\CollectionInterface $billets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Billet'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="billets index large-9 medium-8 columns content">
    <h3><?= __('Billets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tags') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($billets as $billet): ?>
            <tr>
                <td><?= $this->Number->format($billet->id) ?></td>
                <td><?= h($billet->created) ?></td>
                <td><?= h($billet->updated) ?></td>
                <td><?= $billet->has('user') ? $this->Html->link($billet->user->name, ['controller' => 'Users', 'action' => 'view', $billet->user->id]) : '' ?></td>
                <td><?= h($billet->title) ?></td>
                <td><?= h($billet->content) ?></td>
                <td><?= h($billet->tags) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $billet->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $billet->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $billet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $billet->id)]) ?>
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
