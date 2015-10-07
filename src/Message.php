<?php
namespace Slackyboy;

/**
 * Class Message
 */
class Message extends \Slack\Message\Message
{
    public function isDirect()
    {
    }

    /**
     * Checks if the message text matches all of the given regular expressions.
     *
     * Accepts 1 or more arguments.
     *
     * @return bool True if the message text matches all of the given regular expressions.
     */
    public function matchesAll()
    {
        for ($i = 0; $i < func_num_args(); $i++) {
            if (preg_match(func_get_arg($i), $this->getText()) !== 1) {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks if the message text matches any of the given regular expressions.
     *
     * Accepts 1 or more arguments.
     *
     * @return bool True if the message text matches any of the given regular expressions.
     */
    public function matchesAny()
    {
        for ($i = 0; $i < func_num_args(); $i++) {
            if (preg_match(func_get_arg($i), $this->getText()) === 1) {
                return true;
            }
        }

        return false;
    }
}
