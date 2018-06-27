<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Memberships Model
 *
 * @property \App\Model\Table\PackagesTable|\Cake\ORM\Association\BelongsTo $Packages
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\BelongsTo $Payments
 * @property \App\Model\Table\CaresTable|\Cake\ORM\Association\HasMany $Cares
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsToMany $Customers
 *
 * @method \App\Model\Entity\Membership get($primaryKey, $options = [])
 * @method \App\Model\Entity\Membership newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Membership[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Membership|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Membership|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Membership patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Membership[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Membership findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MembershipsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('memberships');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Packages', [
            'foreignKey' => 'package_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Cares', [
            'foreignKey' => 'membership_id'
        ]);
        $this->belongsToMany('Customers', [
            'foreignKey' => 'membership_id',
            'targetForeignKey' => 'customer_id',
            'joinTable' => 'customers_memberships'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('expiration')
            ->requirePresence('expiration', 'create')
            ->notEmpty('expiration');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->numeric('balance')
            ->requirePresence('balance', 'create')
            ->notEmpty('balance');

        $validator
            ->scalar('note')
            ->maxLength('note', 255)
            ->requirePresence('note', 'create')
            ->notEmpty('note');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['package_id'], 'Packages'));
        $rules->add($rules->existsIn(['payment_id'], 'Payments'));

        return $rules;
    }
}
