<?php
/**
 * Created by PhpStorm.
 * User: avltree
 * Date: 27/01/18
 * Time: 14:00
 */

class Answer extends Model
{
    /**
     * @var string
     */
    protected $table = 'answers';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'question_id',
        'answer'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'user_id'     => 'int',
        'question_id' => 'int'
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
    protected function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    /**
     * @return \User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return \Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }
}