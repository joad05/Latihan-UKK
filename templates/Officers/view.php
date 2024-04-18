<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Officer $officer
 */
?>

<?php
$this->assign('title', __('Officer'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Officers'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($officer->nama) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Column') ?></th>
                <td><?= h($officer->nik) ?></td>
            </tr>
            <tr>
                <th><?= __('Nama') ?></th>
                <td><?= h($officer->nama) ?></td>
            </tr>
            <tr>
                <th><?= __('Username') ?></th>
                <td><?= h($officer->username) ?></td>
            </tr>
            <tr>
                <th><?= __('Telp') ?></th>
                <td><?= h($officer->telp) ?></td>
            </tr>
            <tr>
                <th><?= __('Level') ?></th>
                <td><?= h($officer->level) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($officer->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $officer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $officer->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $officer->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>