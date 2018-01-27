<?php
/**
 * Created by PhpStorm.
 * User: avltree
 * Date: 27/01/18
 * Time: 14:11
 */

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            View::load('user.index');
        } else {
            View::load('login');
        }
    }

    public function auth()
    {
        $username = Request::post('username');
        $password = Request::post('password');
        $user = Auth::attempt($username, md5($password));
        if ($user) {
            Session::set('user', $user->getId());
            Response::redirect(route('www.index'));
        } else {
            Response::json([
                'status'  => 'error',
                'message' => 'Wrong username and/or password'
            ]);
        }
    }

    public function logout()
    {
        Session::kill('user');
        Response::redirect(route('www.index'));
    }

    public function profile($username)
    {
        $user = User::where('username', $username)->execute();
        if (count($user)) {
            $user = $user[0];
            View::load('user.profile', compact('user'));
        }
    }

    public function answer($username)
    {
        $user = User::where('username', $username)->execute();
        Answer::create([
            'user_id'     => Auth::user()->getId(),
            'answer'      => Request::post('answer'),
            'question_id' => Request::post('question_id')
        ])->save();

        Response::redirect(route('www.profile.index', [Auth::user()->getUsername()]));
    }

    /**
     * @param string $asker
     * @param string $answerer
     */
    public function ask($asker, $answerer)
    {
        /**
         * @var \User $asker
         * @var \User $answerer
         */
        $asker = User::where('username', $asker)->execute()[0];
        $answerer = User::where('username', $answerer)->execute()[0];
        if ($asker->getId() === Auth::user()->getId()) {
            Question::create([
                'user_id'    => $asker->getId(),
                'user_id_to' => $answerer->getId(),
                'question'   => Request::post('question')
            ])->save();
        }
        Response::redirect(route('www.profile.index', [Auth::user()->getUsername()]));
    }

    public function allUser()
    {
        $users = User::all();
        View::load('user.all', compact('users'));
    }
}