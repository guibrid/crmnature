<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomersMembership Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $membership_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Membership $membership
 */
class CustomersMembership extends Entity
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
        'membership_id' => true,
        'customer' => true,
        'membership' => true
    ];
}
