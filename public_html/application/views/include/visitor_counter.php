<?php 
class VisitorCounter{ 
        var $storage_file;
        var $counter_cookie = 'MYSITE_VISITOR_NUMBER';
        var $cookie_lifetime = 86400;

        function __construct($filename, $cookie_name = null, $cookie_lifetime = null) {
          $this->storage_file = $filename;
          if($cookie_name) {
              $this->counter_cookie = $cookie_name;
          }
          if($cookie_lifetime) {
              $this->cookie_lifetime = $cookie_lifetime;
          }
        }

        function get_visitor_number() {
          $current_number = 0;
          if(count($_COOKIE)>2) {
              setcookie("testcookie","",time()-3600);
              setcookie("mysite.com_visitor","",time()-3600);
              $current_number = $this->read_and_increment_counter_file();
          }
          else if(count($_COOKIE)==2){
            $current_number = $this->write();
            setcookie($this->counter_cookie, "cookie", (int)time() + $this->cookie_lifetime);
          }
          return $current_number;
      }

      function write(){
        if(!file_exists($this->storage_file)) {
          return 0;
        }
        $fp = fopen($this->storage_file, "r+");
        flock($fp, LOCK_EX);
        $num_string = fread($fp, 1024);
        $last_number = intval($num_string);
        if($last_number < 1) {
            $last_number = 0;
        }
        $current_number = $last_number + 1;
        rewind($fp);
        fwrite($fp, (string) $current_number);
        flock($fp, LOCK_UN);
        fclose($fp);
        return intval($num_string);
      }
      function read_and_increment_counter_file() {
        if(!file_exists($this->storage_file)) {
            return 0;
        }
        $fp = fopen($this->storage_file, "r");
        flock($fp, LOCK_EX);
        $num_string = fread($fp, 1024);
        rewind($fp);
        flock($fp, LOCK_UN);
        fclose($fp);
        return intval($num_string);
    }
  }
?>