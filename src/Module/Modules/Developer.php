<?php
namespace Bot\Module\Modules;

use Skinny\Core\Configure;
use Skinny\Module\ModuleInterface;
use Skinny\Network\Wrapper;
use Skinny\Utility\Command;

class Developer implements ModuleInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Skinny\Network\Wrapper $wrapper The Wrapper instance.
     * @param array $message The message array.
     *
     * @return void
     */
    public function onChannelMessage(Wrapper $wrapper, $message)
    {
    }

    /**
     * {@inheritDoc}
     *
     * @param \Skinny\Network\Wrapper $wrapper The Wrapper instance.
     * @param array $message The message array.
     *
     * @return void
     */
    public function onPrivateMessage(Wrapper $wrapper, $message)
    {
    }

    /**
     * {@inheritDoc}
     *
     * @param \Skinny\Network\Wrapper $wrapper The Wrapper instance.
     * @param array $message The message array.
     *
     * @return void
     */
    public function onCommandMessage(Wrapper $wrapper, $message)
    {
        //Handle the command.
        switch ($message['command']) {
            case 'dev':
                switch ($message['arguments'][0]) {
                    case 'info':
                        switch ($message['arguments'][1]) {
                            case 'memory':
                                $memoryKo = round(memory_get_usage() / 1024);
                                $memoryMo = number_format($memoryKo / 1024, 1, ',', ' ');

                                $wrapper->Channel->sendMessage(
                                    'Memory used : `' . $memoryKo . 'Ko` (`' . $memoryMo . 'Mo`).'
                                );
                                break;

                            case 'files':
                                $files = count(get_included_files());

                                $wrapper->Channel->sendMessage('There\'s `' . $files . '` files loaded in memory.');
                                break;

                            default:
                                $wrapper->Channel->sendMessage(Command::unknown($message));
                        }
                        break;

                    default:
                        $wrapper->Channel->sendMessage(Command::unknown($message));
                }
                break;
        }
    }
}
