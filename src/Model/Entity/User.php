<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property \Cake\I18n\FrozenTime $signupdate
 *
 * @property \App\Model\Entity\Admin[] $admins
 * @property \App\Model\Entity\Candidate[] $candidates
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'signupdate' => true,
        'admins' => true,
        'usertype' => true,
        'remember_pass' => true,
        'candidates' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
             //password hashing method
    protected function _setPassword($value)
{
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
}
}
