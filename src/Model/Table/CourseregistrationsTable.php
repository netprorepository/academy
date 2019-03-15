<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courseregistrations Model
 *
 * @property \App\Model\Table\CoursesTable|\Cake\ORM\Association\BelongsTo $Courses
 * @property \App\Model\Table\CandidatesTable|\Cake\ORM\Association\BelongsTo $Candidates
 * @property \App\Model\Table\CentersTable|\Cake\ORM\Association\BelongsTo $Centers
 *
 * @method \App\Model\Entity\Courseregistration get($primaryKey, $options = [])
 * @method \App\Model\Entity\Courseregistration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Courseregistration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Courseregistration|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Courseregistration|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Courseregistration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Courseregistration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Courseregistration findOrCreate($search, callable $callback = null, $options = [])
 */
class CourseregistrationsTable extends Table
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

        $this->setTable('courseregistrations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Candidates', [
            'foreignKey' => 'candidate_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Centers', [
            'foreignKey' => 'center_id',
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

        $validator
            ->dateTime('registeredon')
            ->requirePresence('registeredon', 'create')
            ->notEmpty('registeredon');

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
        $rules->add($rules->existsIn(['course_id'], 'Courses'));
        $rules->add($rules->existsIn(['candidate_id'], 'Candidates'));
        $rules->add($rules->existsIn(['center_id'], 'Centers'));

        return $rules;
    }
}
