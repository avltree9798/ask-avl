<?php
/**
 * Created by PhpStorm.
 * User: avltree
 * Date: 27/01/18
 * Time: 13:54
 */

class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'username',
        'password'
    ];

    /**
     * @return array
     */
    protected function questions()
    {
        return $this->hasMany(Question::class, 'user_id');
    }

    /**
     * @return array
     */
    protected function questionsForMe()
    {
        return $this->hasMany(Question::class, 'user_id_to');
    }

    /**
     * @return array
     */
    protected function answers()
    {
        return $this->hasMany(Answer::class, 'user_id');
    }

    /**
     * @return \Question[]
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @return \Question[]
     */
    public function getQuestionsForMe()
    {
        return $this->questionsForMe;
    }

    /**
     * @return \Answer[]
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}