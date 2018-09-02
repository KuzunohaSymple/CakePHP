<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CommentsBillet Model
 *
 * @property \App\Model\Table\BilletsTable|\Cake\ORM\Association\BelongsTo $Billets
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\CommentsBillet get($primaryKey, $options = [])
 * @method \App\Model\Entity\CommentsBillet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CommentsBillet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CommentsBillet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CommentsBillet|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CommentsBillet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CommentsBillet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CommentsBillet findOrCreate($search, callable $callback = null, $options = [])
 */
class CommentsBilletTable extends Table
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

        $this->setTable('comments_billet');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Billets', [
            'foreignKey' => 'billet_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmpty('content');

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
        $rules->add($rules->existsIn(['billet_id'], 'Billets'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
