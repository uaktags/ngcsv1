<?php

/*
 * This file is part of the NGCSv1 library.
 *
 * (c) Tim Garrity <timgarrity89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NGCSv1\Api;

/**
 * @author Tim Garrity <timgarrity89@gmail.com>
 */
class VPN extends AbstractApi
{
    /**
     * @return logEntity[]
     */
    public function getAll()
    {
        $logs = $this->adapter->get(sprintf('%s/vpn', self::ENDPOINT));

        return $logs;
    }

    /**
     * @param int $id
     *
     * @throws \RuntimeException
     *
     * @return logEntity
     */
    public function getById($id)
    {
        $log = $this->adapter->get(sprintf('%s/logs/%s', self::ENDPOINT, $id));
        return new LogEntity($log);
    }
}
