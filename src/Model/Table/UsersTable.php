<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\AdminsTable|\Cake\ORM\Association\HasMany $Admins
 * @property \App\Model\Table\CandidatesTable|\Cake\ORM\Association\HasMany $Candidates
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->hasMany('Admins', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Candidates', [
            'foreignKey' => 'user_id'
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
            ->scalar('usertype')
            ->add('usertype', 'inList', [
                'rule' => ['inList', ['Admin', 'Candidate']],
                'message' => 'Please choose a valid user type'
            ])
            ->allowEmpty('usertype', 'create');

          $validator
            ->requirePresence('username', 'create')
             ->notEmpty('username','Please provide a valid email address as your user name')
           ->add('username', ['unique' => ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'username already exists']])   
	   ->add('username', 'valid-email', ['rule' => 'email']);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->add('password', [ 'length' => [ 'rule' => ['minLength', 6],
            'message' => 'Invalid password. password must not be less than six characters', ]]);
        
           $validator
          ->notEmpty('remember_pass')
           ->add('remember_pass', 'custom', [
                    'rule' => function($value, $context) {
                        if ($value !== $context['data']['password']) {
                            return false;
                        }
                        return true;
                   },
                  'message' => 'Password mismatch. Please verify your password and try again',
        ]);

//        $validator
//            ->dateTime('signupdate')
//            ->allowEmpty('signupdate');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
