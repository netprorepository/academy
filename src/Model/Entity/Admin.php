<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admin Entity
 *
 * @property int $id
 * @property string $fname
 * @property string $jname
 * @property int $user_id
 * @property string $status
 * @property string $phone
 * @property \Cake\I18n\FrozenTime $last_active_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Course[] $courses
 */
class Admin extends Entity
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
        'fname' => true,
        'lname' => true,
        'user_id' => true,
        'status' => true,
        'phone' => true,
        'last_active_date' => true,
        'user' => true,
        'courses' => true
    ];
}
