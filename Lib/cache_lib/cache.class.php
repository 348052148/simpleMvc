<?php
class Cache implements Icache
{
    private $cache_conf;
    private $map_cache;
    private function __construct()
    {
        $this->init();
    }
    private function init()
    {
        $this->cache_conf=C::config()->getCacheConfig();
    }
    /**
     * »º´æÊý¾Ý´æÈ¡
     */
    public function set($cache_key,$cache_value)
    {
        $this->map_cache[$cache_key]=$cache_value;
    }
    public function get($cache_key)
    {
        return $$this->map_cache[$cache_key];
    }
}