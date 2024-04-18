<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Complaint $complaint
 */
?>

<?php
$this->assign('title', __('Complaint'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Complaints'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($complaint->isi_laporan) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Isi Laporan') ?></th>
                <td><?= h($complaint->isi_laporan) ?></td>
            </tr>
            <tr>
                <th><?= __('Foto') ?></th>
                <td><?= h($complaint->foto) ?></td>
            </tr>
            <tr>
                <th><?= __('Status') ?></th>
                <td><?= h($complaint->status) ?></td>
            </tr>
            <tr>
                <th><?= __('Officer') ?></th>
                <td><?= $complaint->has('officer') ? $this->Html->link($complaint->officer->nama, ['controller' => 'Officers', 'action' => 'view', $complaint->officer->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($complaint->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tg Pengaduan') ?></th>
                <td><?= h($complaint->tg_pengaduan) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $complaint->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $complaint->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $complaint->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
