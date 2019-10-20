<?php
/**
 * User: TheCodeholic
 * Date: 8/29/2019
 * Time: 9:18 AM
 */

namespace frontend\controllers;


use frontend\resource\Comment;
use yii\data\ActiveDataProvider;

/**
 * Class CommentController
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package frontend\controllers
 */
class CommentController extends ActiveController
{
    public $modelClass = Comment::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->andWhere(['post_id' => \Yii::$app->request->get('postId')])
        ]);
    }

}
