<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response $response
 */
?>

<?php
$this->assign('title', __('Response'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Responses'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($response->isi_tanggapan) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Isi Tanggapan') ?></th>
                <td><?= h($response->isi_tanggapan) ?></td>
            </tr>
            <tr>
                <th><?= __('Officer') ?></th>
                <td><?= $response->has('officer') ? $this->Html->link($response->officer->nama, ['controller' => 'Officers', 'action' => 'view', $response->officer->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Complaint') ?></th>
                <td><?= $response->has('complaint') ? $this->Html->link($response->complaint->isi_laporan, ['controller' => 'Complaints', 'action' => 'view', $response->complaint->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($response->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tg Tanggapan') ?></th>
                <td><?= h($response->tg_tanggapan) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $response->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $response->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $response->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
