<?php

namespace EZ\FlashMessages;

use Illuminate\Support\Traits\Macroable;

class FlashService
{
    use Macroable;

    protected $session;

    public $messages;

    function __construct(SessionStore $session)
    {
        $this->session = $session;
        $this->messages = collect();
    }

    public function info($message = null)
    {
        return $this->message($message, 'info');
    }

    public function success($message = null)
    {
        return $this->message($message, 'success');
    }

    public function warning($message = null)
    {
        return $this->message($message, 'warning');
    }

    public function error($message = null)
    {
        return $this->message($message, 'danger');
    }

    public function overlay($message = null, $title = "Notice")
    {
        if (!$message)
        {
            return $this->updateLastMessage(['title' => $title, 'overlay' => true]);
        }

        return $this->message(
            new OverlayMessage(compact('title', 'message'))
        );
    }

    public function important()
    {
        return $this->updateLastMessage(['important' => true]);        
    }

    public function message($message = null, $level = null)
    {
        // If no message was provided; we should update the most recently added message
        if (!$message)
        {
            return $this->updateLastMessage(compact('level'));
        }

        if (!$message instanceof Message)
        {
            $message = new Message(compact('message', 'level'));
        }

        $this->messages->push($message);

        return $this->flash();
    }

    protected function updateLastMessage($overrides = [])
    {
        $this->messages->last()->update($overrides);

        return $this;
    }

    public function clear()
    {
        $this->messages = collect();

        return $this;
    }

    protected function flash()
    {
        $this->session->flash('flash_notification', $this->messages);

        return $this;
    }
}