<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Teacher Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $course
 * @property string $address
 * @property string $phone
 * @property string $facebookid
 * @property string $twitterid
 *
 * @property \App\Model\Entity\User $user
 */
class Teacher extends Entity
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
        'user_id' => true,
        'name' => true,
        'course' => true,
        'address' => true,
        'phone' => true,
        'facebookid' => true,
        'twitterid' => true,
        'user' => true
    ];
}
