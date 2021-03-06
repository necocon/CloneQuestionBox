<?php
/**
 * Created by PhpStorm.
 * User: syo
 * Date: 2018/02/07
 * Time: 14:19
 */

namespace Controller;

use Di\RepositoryContainer;
use Di\UtilContainer;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class UserHomeController
{
    use UtilContainer;
    use RepositoryContainer;

    private $app;
    private $nameKey;
    private $valueKey;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->nameKey = $this->app->csrf->getTokenNameKey();
        $this->valueKey = $this->app->csrf->getTokenValueKey();
    }

    /**
     * ユーザホームを生成する
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $userInfo = $this->getUserRepository()->getUserData($request->getAttribute('name'));
        $name = $request->getAttribute($this->nameKey);
        $value = $request->getAttribute($this->valueKey);
        if ($this->getUserSessionUtil()->loginExist()) {
            $flag = $this->getUserSessionUtil()->loginUserExist($userInfo->id);
        } else {
            $flag = false;
        }
        $array = [
            'userInfo' => $userInfo,
            'flag' => $flag,
            'name' => $name,
            'value' => $value,
            'nameKey' => $this->nameKey,
            'valueKey' => $this->valueKey
        ];
        return $this->app->view->render($this->app->response, 'userHome', $array);
    }
}