<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Candidates Model
 *
 * @property \App\Model\Table\CentersTable|\Cake\ORM\Association\BelongsTo $Centers
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CoursesTable|\Cake\ORM\Association\BelongsTo $Courses
 * @property \App\Model\Table\TransactionsTable|\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\Candidate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Candidate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Candidate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Candidate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidate|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Candidate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Candidate findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidatesTable extends Table
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

        $this->setTable('candidates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Centers', [
            'foreignKey' => 'center_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'candidate_id'
        ]);
        
         $this->hasMany('Courseregistrations', [
            'foreignKey' => 'candidate_id'
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
            ->scalar('surname')
            ->maxLength('surname', 156)
            ->requirePresence('surname', 'create')
            ->notEmpty('surname');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 156)
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->scalar('address')
            ->maxLength('address', 256)
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 16)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');
        $validator
            ->scalar('age')
            ->maxLength('age', 16)
            ->requirePresence('age', 'create')
            ->notEmpty('age');
        $validator
            ->scalar('parent')
            ->maxLength('parent', 16)
            ->requirePresence('parent', 'create')
            ->notEmpty('parent');
         $validator
            ->scalar('parent_phone')
            ->maxLength('parent_phone', 26)
            ->requirePresence('parent_phone', 'create')
            ->notEmpty('parent_phone');

        $validator
            ->dateTime('registeredon')
            ->allowEmpty('registeredon');

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
        $rules->add($rules->existsIn(['center_id'], 'Centers'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['course_id'], 'Courses'));

        return $rules;
    }
}
