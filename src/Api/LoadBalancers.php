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

use NGCSv1\Entity\Action as ActionEntity;
use NGCSv1\Entity\Image as ImageEntity;
use NGCSv1\Entity\LoadBalancer;

/**
 * @author Tim Garrity <timgarrity89@gmail.com>
 */
class LoadBalancers extends AbstractApi
{
    /**
     * @param array $criteria
     *
     * @return ImageEntity[]
     */
    public function getAll($detail = false, $opts = array())
    {
        $query = array();
        if(array_key_exists('perpage', $opts))
            array_push($query, 'per_page='.(int) $opts['perpage']);
        if(array_key_exists('page', $opts))
            array_push($query, 'page='.(int) $opts['page']);

        $q = implode('&', $query);

        if(isset($q))
            $q = sprintf('%s/load_balancers', self::ENDPOINT) . '?'.$q;
        else
            $q = sprintf('%s/load_balancers', self::ENDPOINT);

        $loadbalancers = $this->adapter->get($q);

        if($this->contenttype =="json")
            return $loadbalancers;

        return array_map(function ($server) {
            return new LoadBalancer($server);
        }, json_decode($loadbalancers));
    }

    /**
     * @param int $id
     *
     * @return ImageEntity
     */
    public function getById($id)
    {
        $image = $this->adapter->get(sprintf('%s/images/%s', self::ENDPOINT, $id));

        return new ImageEntity($image);
    }

    public function create($serverID, $name, $frequency, $num_images, $description = Null)
    {
        $data = [
            'server_id' => $serverID,
            'name' => $name,
            'frequency' => $frequency,
            'num_images' => $num_images,
            'description' => $description
        ];
        return $this->adapter->post(sprintf('%s/images', self::ENDPOINT), $data);
    }

    public function delete($id)
    {
        return $this->adapter->delete(sprintf('%s/images/%s', self::ENDPOINT, $id));
    }

    public function modifyName($id, $name)
    {
        return $this->adapter->put(sprintf('%s/images/%s', self::ENDPOINT, $id), array('name'=>$name));
    }

    public function modifyDescription($id, $description)
    {
        return $this->adapter->put(sprintf('%s/images/%s', self::ENDPOINT, $id), array('description'=>$description));
    }
}
