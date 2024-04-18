<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Response Entity
 *
 * @property int $id
 * @property \Cake\I18n\DateTime $tg_tanggapan
 * @property string $isi_tanggapan
 * @property int $Officers_id
 * @property int $Complaints_id
 *
 * @property \App\Model\Entity\Officer $officer
 * @property \App\Model\Entity\Complaint $complaint
 */
class Response extends Entity
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
        'tg_tanggapan' => true,
        'isi_tanggapan' => true,
        'Officers_id' => true,
        'Complaints_id' => true,
        'officer' => true,
        'complaint' => true,
    ];
}
