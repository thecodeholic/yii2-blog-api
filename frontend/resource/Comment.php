<?php
/**
 * User: TheCodeholic
 * Date: 8/29/2019
 * Time: 9:18 AM
 */

namespace frontend\resource;


/**
 * Class Comment
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package frontend\resource
 */
class Comment extends \common\models\Comment
{

    public function extraFields()
    {
        return ['post'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}
