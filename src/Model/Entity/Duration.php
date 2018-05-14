<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Duration Entity
 *
 * @property int $id
 * @property int $value
 * @property int $treatment_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Treatment $treatment
 * @property \App\Model\Entity\Care[] $cares
 * @property \App\Model\Entity\Price[] $prices
 */
class Duration extends Entity
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
        'value' => true,
        'treatment_id' => true,
        'created' => true,
        'modified' => true,
        'treatment' => true,
        'cares' => true,
        'prices' => true
    ];
}
