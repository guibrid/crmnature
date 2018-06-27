<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Membership Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $expiration
 * @property float $price
 * @property float $balance
 * @property string $note
 * @property int $package_id
 * @property int $payment_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Package $package
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\Care[] $cares
 * @property \App\Model\Entity\Customer[] $customers
 */
class Membership extends Entity
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
        'expiration' => true,
        'price' => true,
        'balance' => true,
        'note' => true,
        'package_id' => true,
        'payment_id' => true,
        'created' => true,
        'modified' => true,
        'package' => true,
        'payment' => true,
        'cares' => true,
        'customers' => true
    ];
}
