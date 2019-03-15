<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centers Model
 *
 * @property \App\Model\Table\CandidatesTable|\Cake\ORM\Association\HasMany $Candidates
 *
 * @method \App\Model\Entity\Center get($primaryKey, $options = [])
 * @method \App\Model\Entity\Center newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Center[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Center|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Center|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Center patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Center[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Center findOrCreate($search, callable $callback = null, $options = [])
 */
class CentersTable extends Table
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

        $this->setTable('centers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Candidates', [
            'foreignKey' => 'center_id'
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
            ->scalar('name')
            ->maxLength('name', 126)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
