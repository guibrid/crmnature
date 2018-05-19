<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Durations Model
 *
 * @property \App\Model\Table\TreatmentsTable|\Cake\ORM\Association\BelongsTo $Treatments
 * @property \App\Model\Table\CaresTable|\Cake\ORM\Association\HasMany $Cares
 * @property \App\Model\Table\PricesTable|\Cake\ORM\Association\HasMany $Prices
 *
 * @method \App\Model\Entity\Duration get($primaryKey, $options = [])
 * @method \App\Model\Entity\Duration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Duration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Duration|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Duration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Duration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Duration findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DurationsTable extends Table
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

        $this->setTable('durations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Treatments', [
            'foreignKey' => 'treatment_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Cares', [
            'foreignKey' => 'duration_id'
        ]);
        $this->hasMany('Prices', [
            'foreignKey' => 'duration_id'
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

        return $rules;
    }
}