<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Officer $officer
 */
?>

<?php
$this->assign('title', __('Edit Officer'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Officers'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $officer->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($officer) ?>
    <div class="card-body">
        <?php $isi = $this->Identity->get('level');
        if ($isi == 'admin') {
            $level = ['masyarakat' => 'Masyarakat', 'petugas' => 'Petugas', 'admin' => 'Admin'];
        } else if ($isi == 'petugas') {
            $level = ['masyarakat' => 'Masyarakat', 'petugas' => 'Petugas'];
        } else {
            $level = ['masyarakat' => 'Masyarakat'];
        }
        ?>
        <?= $this->Form->control('nik') ?>
        <?= $this->Form->control('nama') ?>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
        <?= $this->Form->control('telp') ?>
        <?= $this->Form->control('level', ['options' => $level]) ?>

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
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $officer->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>