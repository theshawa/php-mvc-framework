<?php

namespace src\controllers;

use core\Controller;
use core\RedirectException;
use core\Request;
use core\Response;
use Exception;
use src\Application;
use src\models\LoginForm;
use src\models\User;

class UserController extends Controller
{
    /**
     * @throws Exception
     */
    public function login(Request $request, Response $response): string
    {
        if (!Application::isGuest()) $response->redirect('/profile');
        $response->setLayout("auth");
        if ($request->isPost()) {
            $loginForm = new LoginForm();
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->setLayout("main");
                $response->redirect("/profile");
            }
            return $response->render("login", ['pageTitle' => 'Register | ', "model" => $loginForm]);
        }
        return $response->render("login", ['pageTitle' => 'Login | ']);
    }

    /**
     * @throws Exception
     */
    public function register(Request $request, Response $response): string
    {
        if (!Application::isGuest()) $response->redirect('/profile');
        $response->setLayout("auth");
        if ($request->isPost()) {
            $user = new User();
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Application::$app->session->flashMessage("success", "You have been registered successfully.");
                $response->redirect("/login");
            }
            return $response->render("register", ['pageTitle' => 'Register | ', "model" => $user]);
        }
        return $response->render("register", ['pageTitle' => 'Register | ']);
    }

    /**
     * @throws RedirectException
     */
    public function logout(Request $request, Response $response): void
    {
        Application::$app->logout();
        $response->setLayout("auth");
        $response->redirect("/login");
    }
}