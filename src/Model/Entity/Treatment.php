<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Treatment Entity
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Care[] $cares
 * @property \App\Model\Entity\Duration[] $durations
 * @property \App\Model\Entity\Price[] $prices
 */
class Treatment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'created' => true,
        'modified' => true,
        'cares' => true,
        'durations' => true,
        'prices' => true
    ];
}
