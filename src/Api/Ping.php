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

use NGCSv1\Exception\ResponseException;

/**
 * @author Tim Garrity <timgarrity89@gmail.com>
 */
class Ping extends AbstractApi
{
    /**
     * @return pingEntity[]
     */
    public function ping_auth()
    {
        try {
            $ping = $this->adapter->get(sprintf('%s/ping_auth', self::ENDPOINT));
            return json_encode($ping);
        }
        catch(ResponseException $e){
            echo $e->getErrorMessage(true);
        }
    }

    /**
     * @param int $id
     *
     * @throws \RuntimeException
     *
     * @return pingEntity
     */
    public function ping()
    {
        $ping = $this->adapter->get(sprintf('%s/ping', self::ENDPOINT));
        return json_encode($ping);
    }
}
