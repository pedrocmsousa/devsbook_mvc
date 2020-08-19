<?php

namespace src\controllers;

use core\Controller;
use src\handlers\UserHandler;

class SettingsController extends Controller
{
    private $loggedUser;
    public function __construct()
    {
        $this->loggedUser = UserHandler::checkLogin();
        if ($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }
    public function setup($atts = [])
    {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        // Detectando usuário acessado
        $id = $this->loggedUser->id;
        if (!empty($atts['id'])) {
            $id = $atts['id'];
        }
        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if (!$user) {
            $this->redirect('/');
        }
        $this->render('settings', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'flash' => $flash,
        ]);
    }
    public function setupAction()
    {
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $password = filter_input(INPUT_POST, 'password');
        $password1 = filter_input(INPUT_POST, 'password1');
        $city = filter_input(INPUT_POST, 'city');
        $work = filter_input(INPUT_POST, 'work');
        $flash = '';
        // Detectando usuário acessado
        $id = $this->loggedUser->id;
        if (!empty($atts['id'])) {
            $id = $atts['id'];
        }
        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if (!$user) {
            $this->redirect('/');
        }
        if ($email != $user->email) {
            if (UserHandler::emailExists($email) === false) {
                $novoEmail = $email;
            } else {
                $_SESSION['flash'] = 'E-mail já cadastrado!';
                $this->redirect('/settings');
            }
            $email = $novoEmail;
        }
        if ($birthdate != '') {
            $birthdate = explode('/', $birthdate);
            if (count($birthdate) != 3) {
                $_SESSION['flash'] = 'Data de nascimento inválida';
                $this->redirect('/settings');
            }
            $birthdate =
                $birthdate[2] . '-' . $birthdate[1] . '-' . $birthdate[0];
            if (strtotime($birthdate) === false) {
                $_SESSION['flash'] = 'Data de nascimento inválida';
                $this->redirect('/settings');
            }
        }

        if (empty($name)) {
            $name = $user->name;
        }
        if (empty($email)) {
            $email = $user->email;
        }
        if (empty($birthdate)) {
            $birthdate = $user->birthdate;
        }
        if (empty($city)) {
            $city = $user->city;
        }
        if (empty($work)) {
            $work = $user->work;
        }

        // AVATAR
        if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {
            $newAvatar = $_FILES['avatar'];

            if (in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                $avatarName = $this->cutImage($newAvatar, 200, 200, 'media/avatars');
                $avatar = $avatarName;
            }
        }

        // COVER
        if (isset($_FILES['cover']) && !empty($_FILES['cover']['tmp_name'])) {
            $newCover = $_FILES['cover'];

            if (in_array($newCover['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                $coverName = $this->cutImage($newCover, 850, 310, 'media/covers');
                $cover = $coverName;
            }
        }

        UserHandler::updateUser($id, $name, $email, $birthdate, $city, $work, $avatar, $cover);
        if ($password != '' && $password === $password1) {
            UserHandler::updatePassword($id, $password);
        } else {
            if ($password != $password1) {
                $_SESSION['flash'] = 'As senhas devem ser iguais!';
                $this->redirect('/settings');
            }
        }
        $this->redirect('/settings');
    }

    private function cutImage($file, $w, $h, $folder)
    {
        list($widthOrig, $heightOrig) = getimagesize($file['tmp_name']);
        $ratio = $widthOrig / $heightOrig;

        $newWidth = $w;
        $newHeight = $newWidth / $ratio;

        if ($newHeight < $h) {
            $newHeight = $h;
            $newWidth = $newHeight * $ratio;
        }

        $x = $w - $newWidth;
        $y = $h - $newHeight;

        $x = $x < 0 ? $x / 2 : $x;
        $y = $y < 0 ? $y / 2 : $y;

        $finalImage = imagecreatetruecolor($w, $h);
        switch ($file['type']) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($file['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
                break;
        }

        imagecopyresampled(
            $finalImage,
            $image,
            $x,
            $y,
            0,
            0,
            $newWidth,
            $newHeight,
            $widthOrig,
            $heightOrig
        );

        $fileName = md5(time() . rand(0, 9999) . rand(time(), 9999999)) . '.jpg';

        imagejpeg($finalImage, $folder . '/' . $fileName);

        return $fileName;
    }
}
