<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 *
 * @property \App\Model\Table\AdminsTable|\Cake\ORM\Association\BelongsTo $Admins
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\CandidateCoursesTable|\Cake\ORM\Association\HasMany $CandidateCourses
 * @property \App\Model\Table\CourseregistrationsTable|\Cake\ORM\Association\HasMany $Courseregistrations
 * @property \App\Model\Table\TransactionsTable|\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\Course get($primaryKey, $options = [])
 * @method \App\Model\Entity\Course newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Course[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Course|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Course|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Course patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Course[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Course findOrCreate($search, callable $callback = null, $options = [])
 */
class CoursesTable extends Table
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

        $this->setTable('courses');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CandidateCourses', [
            'foreignKey' => 'course_id'
        ]);
        $this->hasMany('Courseregistrations', [
            'foreignKey' => 'course_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'course_id'
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
            ->scalar('title')
            ->maxLength('title', 156)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

//        $validator
//            ->scalar('start_date')
//            ->maxLength('start_date', 32)
//            ->requirePresence('start_date', 'create')
//            ->notEmpty('start_date');
//
//        $validator
//            ->scalar('end_date')
//            ->maxLength('end_date', 32)
//            ->requirePresence('end_date', 'create')
//            ->notEmpty('end_date');
//
//        $validator
//            ->scalar('cost')
//            ->maxLength('cost', 20)
//            ->requirePresence('cost', 'create')
//            ->notEmpty('cost');

        $validator
            ->integer('viewcount')
            ->allowEmpty('viewcount');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 160)
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');

        $validator
            ->scalar('weekendclass')
            ->maxLength('weekendclass', 80)
            ->requirePresence('weekendclass', 'create')
            ->notEmpty('weekendclass');

        $validator
            ->scalar('executiveclass')
            ->maxLength('executiveclass', 80)
            ->requirePresence('executiveclass', 'create')
            ->notEmpty('executiveclass');

        $validator
            ->scalar('immersiveclass')
            ->maxLength('immersiveclass', 80)
            ->requirePresence('immersiveclass', 'create')
            ->notEmpty('immersiveclass');

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
        $rules->add($rules->existsIn(['admin_id'], 'Admins'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
