<?php

use Phpfastcache\CacheManager;

class Fastcache
{
    private $instance;

    function __construct()
    {
        $this->instance = CacheManager::getInstance('Files');
    }
    /**
     * Caches an item which can be retrieved by key
     *
     * @param string $key identitifer to retrieve the data later
     * @param mixed $value to be cached
     */
    function set($key, $value)
    {
        $cachedString = $this->instance->getItem($key);
        $cachedString->set($value);
        $this->instance->save($cachedString);
    }

    /**
     * Check's whether an item is cached or not
     *
     * @param string $key containing the identifier of the cached item
     * @return bool whether the item is currently cached or not
     */
    function has($key)
    {
        $cachedString = $this->instance->getItem($key);
        return ($cachedString->isHit()) ? true : false;
    }

    /**
     * Retrieve's the cached item
     *
     * @param string $key containing the identifier of the item to retrieve
     * @return mixed the cached item or items
     */
    function get($key)
    {
        $cachedString = $this->instance->getItem($key);

        if ($cachedString->isHit()) {
            return $cachedString->get();
        }

        return null;
    }

    /**
     * Delete's the cached item
     *
     * @param string $key containing the identifier of the item to delete.
     */
    function delete($key)
    {
        $this->instance->deleteItem($key);
    }

    /**
     * Clear the cached item
     */
    function clear()
    {
        $this->instance->clear();
    }
}
