<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * Customers Model
 *
 * @property \App\Model\Table\CaresTable|\Cake\ORM\Association\HasMany $Cares
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustomersTable extends Table
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

        $this->setTable('customers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cares', [
            'foreignKey' => 'customer_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationCustomer(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->notEmpty('first_name', __('Fist name is requiered'))
            ->requirePresence('first_name', 'create');


        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name',  __('Last name is requiered'));

        $validator
            ->email('email')
            ->allowEmpty('email')
            ->add('email', 'validFormat', [
                  'rule' => 'email']);

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->allowEmpty('phone');

        $validator
            ->date('date_of_birth')
            ->allowEmpty('date_of_birth');

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
        $rules->add($rules->isUnique(['email'], ['allowMultipleNulls' => false]));

        return $rules;
    }

    /**
     * L’event Model.beforeMarshal est déclenché avant que les données
     * de request ne soient converties en entities.
     */
    public function beforeMarshal(Event $event, ArrayObject $data)
    {
        // Traitement des input avant insertion
        if ($data['phone']==='') {
          $data['phone'] = null;
        } else { // Supprimer tous les caractères non numérique du champs phone
          $data['phone'] = preg_replace('/[^0-9]/', '', $data['phone']);
        };

        if ($data['email']==='') {
          $data['email'] = null;
        };

    }
}
