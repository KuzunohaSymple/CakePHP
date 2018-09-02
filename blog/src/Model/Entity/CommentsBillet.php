<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CommentsBillet Entity
 *
 * @property int $id
 * @property int $billet_id
 * @property int $user_id
 * @property string $content
 *
 * @property \App\Model\Entity\Billet $billet
 * @property \App\Model\Entity\User $user
 */
class CommentsBillet extends Entity
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
        'billet_id' => true,
        'user_id' => true,
        'content' => true,
        'billet' => true,
        'user' => true
    ];
}
