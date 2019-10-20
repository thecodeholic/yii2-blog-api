<?php
/**
 * User: TheCodeholic
 * Date: 8/29/2019
 * Time: 9:58 AM
 */

namespace frontend\controllers;


use frontend\resource\Comment;
use frontend\resource\Post;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

/**
 * Class ActiveController
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package frontend\controllers
 */
class ActiveController extends \yii\rest\ActiveController
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];

        return $behaviors;
    }

    /**
     *
     *
     * @param string $action
     * @param Post|Comment $model
     * @param array $params
     * @throws ForbiddenHttpException
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if (in_array($action, ['update', 'delete']) && $model->created_by !== \Yii::$app->user->id) {
            throw new ForbiddenHttpException("You do not have permission to change this record");
        }
    }
}
