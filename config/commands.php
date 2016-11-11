<?php
/**
 * Configuration :
 *
 * 'params' : The number of required parameters that the command use.
 * 'syntax' : The syntax of command, used to the user how to use this command.
 * 'admin' (optional) (Default : false) : Define if it's an admin command.
 *
 */
return [
    'Commands' => [
        //Module Module.
        'module' => [
            'params' => 1,
            'syntax' => 'Module [Load|Unload|Reload|Time|Loaded] Optional : [Module]',
            'admin' => true
        ],

        //Developer Module.
        'dev' => [
            'params' => 2,
            'syntax' => 'Dev [Info] [Memory|Server|Files]',
            'admin' => true
        ]
    ]
];
