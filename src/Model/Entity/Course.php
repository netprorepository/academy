<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $admin_id
 * @property string $start_date
 * @property string $end_date
 * @property string $cost
 * @property int $viewcount
 * @property string $duration
 * @property string $weekendclass
 * @property string $executiveclass
 * @property string $immersiveclass
 * @property int $category_id
 *
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\CandidateCourse[] $candidate_courses
 * @property \App\Model\Entity\Courseregistration[] $courseregistrations
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Course extends Entity
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
        'title' => true,
        'description' => true,
        'admin_id' => true,
        'start_date' => true,
        'end_date' => true,
        'cost' => true,
        'viewcount' => true,
        'duration' => true,
        'weekendclass' => true,
        'executiveclass' => true,
        'immersiveclass' => true,
        'category_id' => true,
        'admin' => true,
        'category' => true,
        'candidate_courses' => true,
        'courseregistrations' => true,
        'transactions' => true
    ];
}
