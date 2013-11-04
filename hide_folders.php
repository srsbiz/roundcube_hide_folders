<?php

/**
 * Hide unwanted IMAP folder from subsrciption list
 *
 * @version 1.0.0
 * @license GNU GPLv3+
 * @author Radosław Kowalewski <rk@srsbiz.pl>
 */
class hide_folders extends rcube_plugin
{

    public $task = 'settings';

    public function init()
    {
        $this->add_hook('storage_folders', array($this, 'remove_from_list'));
    }

    public function remove_from_list($args)
    {
        $this->load_config();
        $rcmail = rcmail::get_instance();
        $hide = $rcmail->config->get('hide_folders');

        if (is_array($hide) && $args['mode'] === 'LIST') {
            $storage = $rcmail->get_storage();
            $args['folders'] = $storage->list_folders_direct($args['root'], $args['name']);

            foreach ($args['folders'] as $idx => $folder) {
                foreach ($hide as $pattern) {
                    if (fnmatch($pattern, $folder)) {
                        unset($args['folders'][$idx]);
                        break;
                    }
                }
            }

            $args['folders'] = array_values($args['folders']);
        }

        return $args;
    }

}
