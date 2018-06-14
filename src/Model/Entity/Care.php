<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Care Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $treatment_id
 * @property int $duration_id
 * @property int $price_id
 * @property int $payment_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Treatment $treatment
 * @property \App\Model\Entity\Duration $duration
 * @property \App\Model\Entity\Price $price
 * @property \App\Model\Entity\Payment $payment
 */
class Care extends Entity
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
        'customer_id' => true,
        'treatment_id' => true,
        'duration_id' => true,
        'price_id' => true,
        'payment_id' => true,
        'membership_id' => true,
        'promotion_id' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'treatment' => true,
        'duration' => true,
        'price' => true,
        'payment' => true,
        'membership' => true,
        'promotion' => true,
    ];
}
