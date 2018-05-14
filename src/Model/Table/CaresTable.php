<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cares Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\TreatmentsTable|\Cake\ORM\Association\BelongsTo $Treatments
 * @property \App\Model\Table\DurationsTable|\Cake\ORM\Association\BelongsTo $Durations
 * @property \App\Model\Table\PricesTable|\Cake\ORM\Association\BelongsTo $Prices
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\BelongsTo $Payments
 *
 * @method \App\Model\Entity\Care get($primaryKey, $options = [])
 * @method \App\Model\Entity\Care newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Care[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Care|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Care patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Care[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Care findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CaresTable extends Table
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

        $this->setTable('cares');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Treatments', [
            'foreignKey' => 'treatment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Durations', [
            'foreignKey' => 'duration_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Prices', [
            'foreignKey' => 'price_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['treatment_id'], 'Treatments'));
        $rules->add($rules->existsIn(['duration_id'], 'Durations'));
        $rules->add($rules->existsIn(['price_id'], 'Prices'));
        $rules->add($rules->existsIn(['payment_id'], 'Payments'));

        return $rules;
    }
}
