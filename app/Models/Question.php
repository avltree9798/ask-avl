<?php
/**
 * Created by PhpStorm.
 * User: avltree
 * Date: 27/01/18
 * Time: 13:56
 */

class Question extends Model
{
    /**
     * @var string
     */
    protected $table = 'questions';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'user_id_to',
        'question'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'user_id' => 'int'
    ];

    /**
     * @return object|\stdClass
     */
    protected function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return object|\stdClass
     */
    protected function answer()
    {
        return $this->hasOne(Answer::class, 'question_id');
    }

    protected function userTo()
    {
        return $this->belongsTo(User::class, 'user_id_to');
    }

    /**
     * @return \User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return \User
     */
    public function getUserTo()
    {
        return $this->userTo;
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @return \Answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}