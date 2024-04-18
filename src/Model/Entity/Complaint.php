<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Complaint Entity
 *
 * @property int $id
 * @property \Cake\I18n\DateTime $tg_pengaduan
 * @property string $isi_laporan
 * @property string $foto
 * @property string $status
 * @property int $Officers_id
 *
 * @property \App\Model\Entity\Officer $officer
 */
class Complaint extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'tg_pengaduan' => true,
        'isi_laporan' => true,
        'foto' => true,
        'status' => true,
        'Officers_id' => true,
        'officer' => true,
    ];
}
