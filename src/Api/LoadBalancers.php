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
    public function getAll()
    {
        $images = $this->adapter->get(sprintf('%s/load_balancers', self::ENDPOINT));

        return $images;
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
