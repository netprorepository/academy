<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Candidate Entity
 *
 * @property int $id
 * @property string $surname
 * @property string $firstname
 * @property string $address
 * @property int $center_id
 * @property int $user_id
 * @property int $course_id
 * @property string $phone
 * @property \Cake\I18n\FrozenTime $registeredon
 *
 * @property \App\Model\Entity\Center $center
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Candidate extends Entity
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
        'surname' => true,
        'firstname' => true,
        'address' => true,
        'center_id' => true,
        'user_id' => true,
        'course_id' => true,
        'phone' => true,
        'registeredon' => true,
        'center' => true,
        'user' => true,
        'age' => true,
        'parent' => true,
        'parent_phone' => true,
        'course' => true,
        'school' => true,
        'transactions' => true
    ];
}
