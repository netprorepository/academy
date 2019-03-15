<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $candidate_id
 * @property \Cake\I18n\FrozenTime $transdate
 * @property string $amount
 * @property string $paystatus
 * @property string $response
 * @property int $course_id
 * @property string $payref
 *
 * @property \App\Model\Entity\Candidate $candidate
 */
class Transaction extends Entity
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
        'candidate_id' => true,
        'transdate' => true,
        'amount' => true,
        'paystatus' => true,
        'response' => true,
        'course_id' => true,
        'payref' => true,
        'candidate' => true
    ];
}
