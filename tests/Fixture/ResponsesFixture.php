<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResponsesFixture
 */
class ResponsesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'tg_tanggapan' => '2024-04-04 07:32:44',
                'isi_tanggapan' => 'Lorem ipsum dolor sit amet',
                'Officers_id' => 1,
                'Complaints_id' => 1,
            ],
        ];
        parent::init();
    }
}
