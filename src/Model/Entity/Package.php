<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Package Entity
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property float $real_value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Membership[] $memberships
 */
class Package extends Entity
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
        'name' => true,
        'price' => true,
        'real_value' => true,
        'created' => true,
        'modified' => true,
        'memberships' => true
    ];
}
