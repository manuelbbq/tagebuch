<?php

class Eintrag
{
    public $create_date;
    public $change_date;
    public $txt_file;
    static $id;

    /**
     * @param $create_date
     * @param $change_date
     * @param $txt_file
     */
    public function __construct( $txt_file)
    {
        $this->create_date = date("Y.m.d H:i");
        $this->change_date = null;
        $this->txt_file = $txt_file;
        $this->id = self::$id;
        self::$id++;
    }


}