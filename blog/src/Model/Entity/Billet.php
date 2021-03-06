<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Billet Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $updated
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property string $tags
 *
 * @property \App\Model\Entity\User $user
 */
class Billet extends Entity
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
        'created' => true,
        'updated' => true,
        'user_id' => true,
        'title' => true,
        'content' => true,
        'tags' => true,
        'user' => true
    ];
}
