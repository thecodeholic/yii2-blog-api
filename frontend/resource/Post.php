<?php
/**
 * User: TheCodeholic
 * Date: 8/29/2019
 * Time: 9:12 AM
 */

namespace frontend\resource;


/**
 * Class Post
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package frontend\resource
 */
class Post extends \common\models\Post
{

    public function extraFields()
    {
        return ['comments', 'createdBy'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
}
