<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Officers Model
 *
 * @method \App\Model\Entity\Officer newEmptyEntity()
 * @method \App\Model\Entity\Officer newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Officer> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Officer get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Officer findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Officer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Officer> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Officer|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Officer saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Officer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Officer>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Officer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Officer> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Officer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Officer>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Officer>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Officer> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OfficersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('officers');
        $this->setDisplayField('nama');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nik')
            ->maxLength('nik', 16)
            ->requirePresence('nik', 'create')
            ->notEmptyString('nik')
            ->add('nik', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('nama')
            ->maxLength('nama', 55)
            ->requirePresence('nama', 'create')
            ->notEmptyString('nama');

        $validator
            ->scalar('username')
            ->maxLength('username', 30)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('telp')
            ->maxLength('telp', 16)
            ->requirePresence('telp', 'create')
            ->notEmptyString('telp');

        $validator
            ->scalar('level')
            ->requirePresence('level', 'create')
            ->notEmptyString('level');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->isUnique(['nik']), ['errorField' => 'nik']);

        return $rules;
    }
}
