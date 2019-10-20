<?php
/**
 * User: TheCodeholic
 * Date: 8/29/2019
 * Time: 8:57 AM
 */

namespace frontend\controllers;

use frontend\resource\Post;

/**
 * Class PostController
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package frontend\controllers
 */
class PostController extends ActiveController
{
    public $modelClass = Post::class;

}
