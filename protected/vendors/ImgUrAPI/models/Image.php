<?php
/**
 * Created by PhpStorm.
 * User: HieuNguyen
 * Date: 7/23/2015
 * Time: 4:35 PM
 */

//namespace ImgUr;


class Image
{
    public $_id;
    public $_title;
    public $_description;
    public $_datetime;
    public $_type;
    public $_animated;
    public $_width;
    public $_height;
    public $_size;
    public $_views;
    public $_bandwidth;
    public $_deletehash;
    public $_name;
    public $_section;
    public $_link;
    public $_gifv;
    public $_mp4;
    public $_webm;
    public $_looping;
    public $_favorite;
    public $_nsfw;
    public $_vote;
    public $_account_url;
    public $_account_id;

    function __construct($params){
        if(is_array($params) && !empty($params))   {
            $this->_id = isset($params['id']) ? $params['id'] :'';
            $this->_title = isset($params['title']) ? $params['title'] :'';
            $this->_description = isset($params['description']) ? $params['description'] :'';
            $this->_datetime = isset($params['datetime']) ? $params['datetime'] :'';
            $this->_type= isset($params['type']) ? $params['type'] :'';
            $this->_animated= isset($params['animated']) ? $params['animated'] :'';
            $this->_width= isset($params['width']) ? $params['width'] :'';
            $this->_height= isset($params['height']) ? $params['height'] :'';
            $this->_size= isset($params['size']) ? $params['size'] :'';
            $this->_views= isset($params['views']) ? $params['views'] :'';
            $this->_bandwidth= isset($params['bandwidth']) ? $params['bandwidth'] :'';
            $this->_deletehash= isset($params['deletehash']) ? $params['deletehash'] :'';
            $this->_name= isset($params['name']) ? $params['name'] :'';
            $this->_section= isset($params['section']) ? $params['section'] :'';
            $this->_link= isset($params['link']) ? $params['link'] :'';
            $this->_gifv= isset($params['gifv']) ? $params['gifv'] :'';
            $this->_mp4= isset($params['mp4']) ? $params['mp4'] :'';
            $this->_webm= isset($params['webm']) ? $params['webm'] :'';
            $this->_looping= isset($params['looping']) ? $params['looping'] :'';
            $this->_favorite= isset($params['favorite']) ? $params['favorite'] :'';
            $this->_nsfw= isset($params['nsfw']) ? $params['nsfw'] :'';
            $this->_vote= isset($params['vote']) ? $params['vote'] :'';
            $this->_account_url= isset($params['account_url']) ? $params['account_url'] :'';
            $this->_account_id= isset($params['account_id']) ? $params['account_id'] :'';
        }
    }
}