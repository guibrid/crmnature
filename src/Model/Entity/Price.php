<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Price Entity
 *
 * @property int $id
 * @property int $value
 * @property int $treatment_id
 * @property int $duration_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Treatment $treatment
 * @property \App\Model\Entity\Duration $duration
 * @property \App\Model\Entity\Care[] $cares
 */
class Price extends Entity
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
        'duration_id' => true,
        'created' => true,
        'modified' => true,
        'treatment' => true,
        'duration' => true,
        'cares' => true
    ];

    /* Create virtualfield and concat string for display */
    protected $_virtual = ['value_price'];
    protected function _getValuePrice() {
        return $this->_properties['value'] . ' THB';
    }
}
