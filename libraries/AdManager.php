<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdManager {

  /**
   * [private description]
   * @var [type]
   */
  private $ci;

  function __construct() {
    $this->ci =& get_instance();
  }
  
  /**
   * [createAd description]
   * @param  [type] $name       [description]
   * @param  [type] $type       [description]
   * @param  [type] $expire     [description]
   * @param  [type] $image      [description]
   * @param  [type] $text       [description]
   * @param  [type] $link       [description]
   * @param  [type] $max_clicks [description]
   * @return [type]             [description]
   */
  function createAd($name, $type, $expire, $image=null, $text=null,
  $link=null, $max_clicks=null) {
    $data = array("name" => $name, "type" => $type);
    if ($expire == null && !$this->fullMatch("/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/", $expire))
    throw new Exception("Wrong DateTime Format, Please provide Date Time in Y-m-d H:i:s");
    $data["expire"] = $expire;
    if ($image != null) $data["image"] = $image;
    if ($text != null) $data["text"] = $text;
    if ($link != null) $data["link"] = $link;
    if ($max_clicks != null) $data["max_clicks"] = $max_clicks;
    return $this->ci->db->insert("ads", $data);
  }
  /**
   * [fullMatch description]
   * @param  [type] $subject [description]
   * @param  [type] $pattern [description]
   * @return [type]          [description]
   */
  private function fullMatch($subject, $pattern) {
    $matches = array();
    return preg_match($pattern, $subject, $matches) == 1 && strlen($matches[0]) == strlen($subject);
  }
}
?>
