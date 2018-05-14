<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prices Model
 *
 * @property \App\Model\Table\TreatmentsTable|\Cake\ORM\Association\BelongsTo $Treatments
 * @property \App\Model\Table\DurationsTable|\Cake\ORM\Association\BelongsTo $Durations
 * @property \App\Model\Table\CaresTable|\Cake\ORM\Association\HasMany $Cares
 *
 * @method \App\Model\Entity\Price get($primaryKey, $options = [])
 * @method \App\Model\Entity\Price newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Price[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Price|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Price patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Price[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Price findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PricesTable extends Table
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

        $this->setTable('prices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Treatments', [
            'foreignKey' => 'treatment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Durations', [
            'foreignKey' => 'duration_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Cares', [
            'foreignKey' => 'price_id'
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
            ->integer('value')
            ->requirePresence('value', 'create')
            ->notEmpty('value');

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
        $rules->add($rules->existsIn(['treatment_id'], 'Treatments'));
        $rules->add($rules->existsIn(['duration_id'], 'Durations'));

        return $rules;
    }
}
