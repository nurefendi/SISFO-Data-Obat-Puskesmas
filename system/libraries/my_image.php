<?php
if (!defined('BASEPATH')) exit('No direct script access permitted.');

class My_image
{
	var $CI;
	function My_image()
	{
    //parent::CI_Image_lib();
  }  

	function resize_crop($config, $resize_width=200, $resize_height=200)
	{
    if ($config)
    {
      $CI =& get_instance();

      $CI->load->library('image_lib');

      $img_size = getimagesize($config['source_image']);

      $t_ratio = $resize_width/$resize_height;
      $o_width = $img_size[0];
      $o_height = $img_size[1];
      if ($t_ratio > $o_width/$o_height)
      {
        $config['width'] = $resize_width;
        $config['height'] = round( $resize_width * ($o_height / $o_width));
        $y_axis = round(($config['height']/2) - ($resize_height/2));
        $x_axis = 0;
      }
      else
      {
        $config['width'] = round( $resize_height * ($o_width / $o_height));
        $config['height'] = $resize_height;
        $y_axis = 0;
        $x_axis = round(($config['width']/2) - ($resize_width/2));
      }

      $source_img01 = $config['new_image'];

      $CI->image_lib->clear();
      $CI->image_lib->initialize($config);
      $CI->image_lib->resize();

      $config['image_library'] = 'gd2';
      $config['source_image'] = $source_img01;
      $config['create_thumb'] = false;
      $config['maintain_ratio'] = true;
      $config['width'] = $resize_width;
      $config['height'] = $resize_height;
      $config['y_axis'] = $y_axis ;
      $config['x_axis'] = $x_axis ;

      $CI->image_lib->clear();
      $CI->image_lib->initialize($config);
      $CI->image_lib->crop();

      return $config['new_image'];
    }
  }
}

?>