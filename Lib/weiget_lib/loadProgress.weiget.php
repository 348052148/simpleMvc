<?php
class loadProgress implements Progress
{
    private $text;
    public function __construct()
    {
        $this->init();
    }
    public function init()
    {
        $this->text=file_get_contents("Lib/weiget_lib/layer_weiget/load.weiget");
    }
    public function render()
    {
        return $this->text;
    }
}