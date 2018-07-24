<?php

/* This function is used to include the CSS and JS (Sanjay Yadav) */
if (!function_exists('add_includes')) {

    function add_includes($type, $files, $options = NULL, $prepend_base_url = TRUE) {
        $ci = &get_instance();
        $includes = array();
        if (is_array($files) and ! empty($files)) {
            foreach ($files as $file) {
                if ($prepend_base_url) {
                    $ci->load->helper('url');
                    $file = base_url() . $file;
                }

                $includes[$type][] = array(
                    'file' => $file,
                    'options' => $options
                );
            }
        } else {
            if ($prepend_base_url) {
                $ci->load->helper('url');
                $file = base_url() . $files;
            }

            $includes[$type][] = array(
                'file' => $file,
                'options' => $options
            );
        }

        return $includes;
    }

}

/* End Of function add_includes  */

if (!function_exists('getActiveMenu')) {

    function getActiveMenu($url) {
        $CI = &get_instance();
        $alias = $CI->uri->segment(2);
        $mfl = $CI->router->fetch_class();
        $mthd = $CI->router->fetch_method();
        if ($mfl == $url) {
            $class = "active";
        } else {
            $class = "";
        }
        return $class;
    }

}

if (!function_exists('check_auth')) {

    function check_auth() {
        $CI = &get_instance();
        $CI->load->module("users");
        //if (!$CI->users->_is_admin()) {
        if (!$CI->users->userdata()) {
            redirect('');
        }
    }

}

if (!function_exists('site_title')) {

    function site_title() {
        $CI = &get_instance();
        $CI->load->module("cms");
        $title = $CI->cms->getSitetitle();
        $title = @unserialize($title);
        return $title['c_title'];
    }

}
if (!function_exists('site_logo')) {

    function site_logo() {
        $CI = &get_instance();
        $CI->db->where('alias', 'logo');
        $query = $CI->db->get('cms');
        return $query->row()->content;
    }

}
if (!function_exists('state_name')) {

    function state_name($id) {
        $CI = &get_instance();
        $CI->db->where('id', $id);
        $query = $CI->db->get('state');
        if ($query->num_rows() > 0)
            return $query->row()->state_name;
    }

}
if (!function_exists('country_name')) {

    function country_name($id) {
        $CI = &get_instance();
        $CI->db->where('country_code', $id);
        $query = $CI->db->get('country');
        if ($query->num_rows() > 0)
            return $query->row()->country_name;
    }

}


if (!function_exists('getGoogleAnalyticCode')) {

    function getGoogleAnalyticCode($alias) {
        $CI = &get_instance();
        $CI->db->start_cache();
        $CI->db->where('alias', $alias);
        $query = $CI->db->get('cms');
        $CI->db->flush_cache();
        $qqq = $query->row();
        $yourCode = array();
        $yourCode['content'] = unserialize($qqq->content);
        return $yourCode['content']['description'];
    }

}

if (!function_exists('getPages')) {

    function getPages($slug = null) {
        $CI = &get_instance();
        $CI->db->start_cache();
        $con = array(
            'include_in' => $slug,
            'is_active' => '1',
            'is_deleted' => '0'
        );
        $CI->db->where($con);
        $query = $CI->db->get('pages');
        $CI->db->flush_cache();
        $qqq = $query->result();
        return $qqq;
    }

}

if (!function_exists('state_codes')) {

    function state_codes() {
        $CI = &get_instance();
        $query = $CI->db->get('state');
        $states = $query->result();
        $data = array();
        foreach ($states as $list) {
            $data[strtolower($list->state_name)] = $list->id;
        }
        return $data;
    }

}


if (!function_exists('site_limit')) {

    function site_limit() {
        $CI = &get_instance();
        $CI->load->module("cms");
        $title = $CI->cms->getSitetitle();
        $title = @unserialize($title);
        return $title['c_limit'];
    }

}

function admin_base_url($uri = '') {
    $CI = & get_instance();
    return $CI->config->base_url(ADMIN . '/' . $uri);
}

function admin_url($uri = '') {
    $CI = & get_instance();
    return $CI->config->site_url(ADMIN . '/' . $uri);
}

function admin_redirect($uri = '', $method = 'location', $http_response_code = 302) {
    if (!preg_match('#^https?://#i', $uri)) {
        $uri = admin_url($uri);
    }

    switch ($method) {
        case 'refresh' : header("Refresh:0;url=" . $uri);
            break;
        default : header("Location: " . $uri, TRUE, $http_response_code);
            break;
    }
    exit;
}

$seoURL = '';

function base_url_without_slash() {
    return substr(base_url(), 0, strlen(base_url()) - 1);
}

function getHref($menu_id) {
    global $seoURL;
    $seoURL = '';
    return gethyperlink($menu_id);
}

function gethyperlink($menu_id) {
    global $seoURL;
    $href = '';
    $hrefRw = '';

    $ci = & get_instance();
    $ci->load->database();

    if (is_int($menu_id) || $menu_id != '') {
        $query = $ci->db->query("SELECT * FROM menu WHERE menu_id = $menu_id AND menu_status = 'Active'");
        if ($query->num_rows() > 0) {
            $hrefRw = $query->row_array();
            if (strtolower($hrefRw['menu_name']) == 'home') {
                return $href = " href = '" . base_url() . "'";
            } else if ($hrefRw['menu_page_type'] == 'Page') {
                $seoURL = "/" . $hrefRw['menu_slug'] . $seoURL;
                gethyperlink($hrefRw['menu_parent_id']);
            } else {
                if (!strstr($hrefRw['menu_link'], "http://") && !strstr($hrefRw['menu_link'], "https://")) {
                    if (!strstr($hrefRw['menu_link'], "http://")) {
                        $href = " href = 'http://" . $hrefRw['menu_link'] . "'";
                    }
                } else {
                    $href = " href = '" . $hrefRw['menu_link'] . "'";
                }
                if ($hrefRw['menu_link_type'] == '_blank') {
                    $href .= " target = '_blank'";
                }
            }
        }
        if (isset($hrefRw['menu_page_type'])) {
            if ($hrefRw['menu_page_type'] == 'Page') {
                $href = " href = '" . base_url_without_slash() . $seoURL . ".html'";
            }
        }
        return $href;
    } else {
        return false;
    }
}

function set_pagination() {
    $CI = &get_instance();
    $CI->page_config['full_tag_open'] = '<div class="pagination pagination-small pagination-right"><ul class="pagination">';
    $CI->page_config['full_tag_close'] = '</ul></div>';
    $CI->page_config['first_link'] = true;
    $CI->page_config['last_link'] = true;
    $CI->page_config['first_tag_open'] = '<li>';
    $CI->page_config['first_tag_close'] = '</li>';
    $CI->page_config['prev_link'] = '&laquo';
    $CI->page_config['prev_tag_open'] = '<li class="prev">';
    $CI->page_config['prev_tag_close'] = '</li>';
    $CI->page_config['next_link'] = '&raquo';
    $CI->page_config['next_tag_open'] = '<li>';
    $CI->page_config['next_tag_close'] = '</li>';
    $CI->page_config['last_tag_open'] = '<li>';
    $CI->page_config['last_tag_close'] = '</li>';
    $CI->page_config['cur_tag_open'] = '<li class="active"><a href="#">';
    $CI->page_config['cur_tag_close'] = '</a></li>';
    $CI->page_config['num_tag_open'] = '<li>';
    $CI->page_config['num_tag_close'] = '</li>';
    return $CI->page_config;
}

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

/* Function to send the notification * /
 * 
 * 
 */
if (!function_exists('insertNotification')) {

    function insertNotification($data) {
        $CI = &get_instance();
        $CI->db->insert('notifications', $data);
    }

}

if (!function_exists('androidNotification')) {

    function androidNotification($deviceIDS, $data = '') {

        $CI = &get_instance();
        $getuser = $deviceIDS;
        foreach ($getuser as $val) {
            $register_send = $val;
            $value = $register_send['reg_id'];
            $get = json_decode($value);
            $message = $data['message'];
            $title = $data['title'];
            $notiType = $data['type'];

            $notificationUpdateData = array(
                'resource_id' => $data['resource_id'],
                'user_id' => $val['id'],
                'type' => $data['type'],
                'title' => $title,
                'message' => $message,
                'device_type' => 'android',
                'status' => '0'
            );

            insertNotification($notificationUpdateData);
            $api_key = 'AIzaSyAUuOPKADanekXAwpLUwiJuMbzQ5PVXX0A';

            if (empty($api_key) || count($get) < 0) {
                $result = array(
                    'success' => '0',
                    'message' => 'api or reg id not found',
                );
                echo json_encode($result);
                die;
            }
            $registrationIDs = $get;
            $url = 'https://android.googleapis.com/gcm/send';
            $fields = array(
                'registration_ids' => $registrationIDs,
                'data' => array("message" => $message, "title" => $title, "type" => $notiType, 'data' => $data['data']),
            );

            $headers = array(
                'Authorization: key=' . $api_key,
                'Content-Type: application/json');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);

            curl_close($ch);
            //print_r($result);
            //die;
        }
    }

}

// ios push notificatin apple mac 
if (!function_exists('iosNotification')) {

    function iosNotification($deviceIDS, $data = '') {
        $url = IMAGESPATH . 'ios-certified/LiveCert.pem';
        $CI = &get_instance();
        $getuser = $deviceIDS;
        $sound = 'default';
        $badge = '0';
        $content_aval = '1';
        $message = $data['message'];
        $title = $data['title'];
        foreach ($getuser as $valios) {
            //print_r($valios); 
            $register_send = $valios;
            $value = $register_send['reg_id'];
            $gets = json_decode($value);

            $notificationUpdateData = array(
                'resource_id' => $data['resource_id'],
                'user_id' => $valios['id'],
                'type' => $data['type'],
                'title' => $title,
                'message' => $data['message'],
                'device_type' => 'ios',
                'status' => '0'
            );

            insertNotification($notificationUpdateData);
            foreach ($gets as $get) {
                $dtoken = $get;
                $message = $message;
                // My device token here (without spaces):
                $deviceToken = $dtoken;
                // print_r($deviceToken); die;
                // My private key's passphrase here:
                $passphrase = 'BCG4pp$';

                // My alert message here:
                //$message = 'New Push Notification!';
                //badge
                $badge = 0;

                $ctx = stream_context_create();
                stream_context_set_option($ctx, 'ssl', 'local_cert', $url);
                stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

                // Open a connection to the APNS server
                $fp = stream_socket_client(
                        'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

                if (!$fp)
                    exit("Failed to connect: $err $errstr" . PHP_EOL);

                //echo 'Connected to APNS' . PHP_EOL;
                // Create the payload body
                $body['aps'] = array(
                    'alert' => $message,
                    'badge' => $badge,
                    'sound' => 'default'
                );
                $body['data'] = $data;

                // Encode the payload as JSON
                $payload = json_encode($body);

                // Build the binary notification
                $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

                // Send it to the server
                $result = fwrite($fp, $msg, strlen($msg));

                /* if (!$result)
                  echo 'Error, notification not sent' . PHP_EOL;
                  else
                  echo 'notification sent!' . PHP_EOL; */

                // Close the connection to the server

                fclose($fp);
            }
            //print_r($result);
            //die;
        }
    }

}
/*
 * To get The Non Action Based Notification details based Upon the Alias of that Notification.
 */

if (!function_exists('GetNonActionNotificationDetails')) {

    function GetNonActionNotificationDetails($alias) {
        $CI = &get_instance();
        $CI->db->where('name', $alias);
        $CI->db->select('title,message');
        $CI->db->from('custom_notification');
        $res = $CI->db->get();
        return $res->row();
    }

}

/* Function For Navigation Menus */


if (!function_exists('HunterMainNavigationClass')) {

    function HunterMainNavigationClass($class, $method = '') {
        $CI = &get_instance();
        $mfl = ucfirst($CI->router->fetch_class());
        $mthd = $CI->router->fetch_method();
        $methods = array('area_allocator', 'report', 'tracking', 'index', 'product', 'product_select');
        if ($mfl == $class || $mfl == 'Activity') {
            $class = "active";
        } else {
            $class = "";
        }
        return $class;
    }

}

if (!function_exists('HunterSubNavigationClass')) {

    function HunterSubNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $mfl = $CI->router->fetch_class();
        $mthd = $CI->router->fetch_method();
        echo $mthd;
        if ($mfl == $class || $method == 'performance') {
            $class = "active";
        } else {
            $class = "";
        }
        return $class;
    }

}

if (!function_exists('HeadNavigationClass')) {

    function HeadNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $mfl = ucfirst($CI->router->fetch_class());
        $mthd = $CI->router->fetch_method();
        if ($mfl == $class && $mthd == $method) {
            $class = "active";
        } else {
            $class = "";
        }
        return $class;
    }

}

if (!function_exists('HeadOtherNavigationClass')) {

    function HeadOtherNavigationClass($class = '') {
        $CI = &get_instance();
        $mfl = ucfirst($CI->router->fetch_class());
        if ($mfl != $class) {
            $class = "active";
        } else {
            $class = "";
        }
        return $class;
    }

}

if (!function_exists('RrmNavigationClass')) {

    function RrmNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $mfl = ucfirst($CI->router->fetch_class());
        $mthd = $CI->router->fetch_method();
        if ($mfl == $class && $mthd == $method) {
            $class = "active";
        } else {
            $class = "";
        }
        return $class;
    }

}
if (!function_exists('RrmOtherNavigationClass')) {

    function RrmOtherNavigationClass($class = '') {
        $CI = &get_instance();
        $mfl = ucfirst($CI->router->fetch_class());
        if ($mfl != $class && $class != 'Referrals' && $mfl != 'Sales') {
            $class = "active";
        } else {
            $class = "";
        }
        return $class;
    }

}


if (!function_exists('HunterNavigationClass')) {

    function HunterNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $mfl = ucfirst($CI->router->fetch_class());
        $mthd = $CI->router->fetch_method();
        if ($mfl == $class && $mthd == $method) {
            $class = "active";
        } else {
            $class = "";
        }
        return $class;
    }

}

if (!function_exists('HunterOthersNavigationClass')) {

    function HunterOthersNavigationClass($class, $method = '') {
        $CI = &get_instance();
        $mfl = ucfirst($CI->router->fetch_class());
        $mthd = $CI->router->fetch_method();
        $methods = array('area_allocator', 'report', 'tracking', 'index', 'product', 'product_select');
    }

}


if (!function_exists('HunterLeaderNavigationClass')) {

    function HunterLeaderNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $leadArray = array('Leads/add', 'Leads/allocation', 'Hunter/index', 'Leads/edit','Leads/index', 'Leads/profile', 'Activity/index', 'Referrals/tracking', 'Home/area_allocator');
        $controllerSegemnt = ucfirst($CI->router->fetch_class());

        $mthdSegment = $CI->router->fetch_method();
        $currentAction = $controllerSegemnt . '/' . $mthdSegment;
        
        if (in_array($currentAction, $leadArray)) {
            $leadclass = "active";
        } else {
            $leadclass = "";
        }
        return $leadclass;
    }

}

if (!function_exists('HunterLeaderPerformanceNavigationClass')) {

    function HunterLeaderPerformanceNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $performanceArray = array('Hunter/summary', 'Hunter/performance', 'Home/summary', 'Home/performance','Home/index');
        $performancecontrollerSegemnt = ucfirst($CI->router->fetch_class());
        $performancemthdSegment = $CI->router->fetch_method();
        $currentperformanceAction = $performancecontrollerSegemnt . '/' . $performancemthdSegment;
        if (in_array($currentperformanceAction, $performanceArray)) {
            $performanceclass = "active";
        } else {
            $performanceclass = "";
        }
        return $performanceclass;
    }

}

if (!function_exists('HunterLeaderOthersNavigationClass')) {

    function HunterLeaderOthersNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $othersArray = array('Home/area_allocator', 'Activity/report');
        $otherscontrollerSegemnt = ucfirst($CI->router->fetch_class());
        $othersMthdSegment = $CI->router->fetch_method();
        $currentOthersAction = $otherscontrollerSegemnt . '/' . $othersMthdSegment;
        if (in_array($currentOthersAction, $othersArray)) {
            $otherclass = "active";
        } else {
            $otherclass = "";
        }
        return $otherclass;
    }

}

if (!function_exists('HunterLeaderSalesNavigationClass')) {

    function HunterLeaderSalesNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $salesArray = array('Sales/bundle', 'Sales/product', 'Sales/product_select');
        $salescontrollerSegemnt = ucfirst($CI->router->fetch_class());
        $salesMthdSegment = $CI->router->fetch_method();
        $salesOthersAction = $salescontrollerSegemnt . '/' . $salesMthdSegment;
        if (in_array($salesOthersAction, $salesArray)) {
            $otherclass = "active";
        } else {
            $otherclass = "";
        }
        return $otherclass;
    }

}

if (!function_exists('HunterLeaderReferalsNavigationClass')) {

    function HunterLeaderReferalsNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $refArray = array('Referrals/index');
        $refcontrollerSegemnt = ucfirst($CI->router->fetch_class());
        $refMthdSegment = $CI->router->fetch_method();
        $refOthersAction = $refcontrollerSegemnt . '/' . $refMthdSegment;
        if (in_array($refOthersAction, $refArray)) {
            $otherclass = "active";
        } else {
            $otherclass = "";
        }
        return $otherclass;
    }

}


if (!function_exists('RroLeaderSalesNavigationClass')) {

    function RroLeaderSalesNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $rrosalesArray = array('Sales/bundle', 'Sales/product', 'Sales/product_select');
        $rrosalescontrollerSegemnt = ucfirst($CI->router->fetch_class());
        $rrosalesMthdSegment = $CI->router->fetch_method();
        $rrosalesOthersAction = $rrosalescontrollerSegemnt . '/' . $rrosalesMthdSegment;
        if (in_array($rrosalesOthersAction, $rrosalesArray)) {
            $rrootherclass = "active";
        } else {
            $rrootherclass = "";
        }
        return $rrootherclass;
    }

}

if (!function_exists('getUserInfo')) {

    function getUserInfo($id = '1') {
        $CI = &get_instance();
        $CI->db->where('id', $id);
        $CI->db->from('users');
        $res = $CI->db->get();
        return $res->row();
    }

}

if (!function_exists('getProfileId')) {

    function getProfileId($id = '1', $type = 'next') {
        $CI = &get_instance();
        $CI->db->select('lead_id');
        if ($type == 'pre') {
            $CI->db->where('lead_id <', $id);
            $CI->db->order_by('lead_id', 'DESC');
        } else {
            $CI->db->where('lead_id >', $id);
            $CI->db->order_by('lead_id', 'ASC');
        }
        $CI->db->limit(1);
        $CI->db->from('lead');
        $res = $CI->db->get();
        if ($res->num_rows() > 0){
            return $res->row()->lead_id;
        } else {
            return $id;
        }
    }

}


if (!function_exists('RroProfileNavigationClass')) {

    function RroProfileNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $rrosalesArray = array('Rrm/profile', 'Rrm/contest_casa', 'Rrm/contest_online','Rrm/contest_od');
        $rrosalescontrollerSegemnt = ucfirst($CI->router->fetch_class());
        $rrosalesMthdSegment = $CI->router->fetch_method();
        $rrosalesOthersAction = $rrosalescontrollerSegemnt . '/' . $rrosalesMthdSegment;
        if (in_array($rrosalesOthersAction, $rrosalesArray)) {
            $rrootherclass = "active";
        } else {
            $rrootherclass = "";
        }
        return $rrootherclass;
    }

}

if (!function_exists('RroleaderProfileNavigationClass')) {

	function RroleaderProfileNavigationClass($class = '', $method = '') {
		$CI = &get_instance();
		$rrosalesArray = array('Rroleader/profile', 'Rroleader/contest_casa', 'Rroleader/contest_online','Rroleader/contest_od');
		$rrosalescontrollerSegemnt = ucfirst($CI->router->fetch_class());
		$rrosalesMthdSegment = $CI->router->fetch_method();
		$rrosalesOthersAction = $rrosalescontrollerSegemnt . '/' . $rrosalesMthdSegment;
		if (in_array($rrosalesOthersAction, $rrosalesArray)) {
			$rrootherclass = "active";
		} else {
			$rrootherclass = "";
		}
		return $rrootherclass;
	

}
}

if (!function_exists('RroleaderPipelineNavigationClass')) {

	function RroleaderPipelineNavigationClass($class = '', $method = '') {
		$CI = &get_instance();
		$rrosalesArray = array('Rroleader/pipeline', 'Rroleader/report');
		$rrosalescontrollerSegemnt = ucfirst($CI->router->fetch_class());
		$rrosalesMthdSegment = $CI->router->fetch_method();
		$rrosalesOthersAction = $rrosalescontrollerSegemnt . '/' . $rrosalesMthdSegment;
		if (in_array($rrosalesOthersAction, $rrosalesArray)) {
			$rrootherclass = "active";
		} else {
			$rrootherclass = "";
		}
		return $rrootherclass;


	}
}

if (!function_exists('RroLeaderDashboardNavigationClass')) {

    function RroLeaderDashboardNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $dashArray = array('Rroleader/index', 'Rroleader/performance','Rroleader/process');
        $dashSegemnt = ucfirst($CI->router->fetch_class());
        $dashMthdSegment = $CI->router->fetch_method();
        $dashOthersAction = $dashSegemnt . '/' . $dashMthdSegment;
        if (in_array($dashOthersAction, $dashArray)) {
            $rdashclass = "active";
        } else {
            $rdashclass = "";
        }
        return $rdashclass;
    }

}

if (!function_exists('RroLeaderDashboardNavigationClass')) {

	function RroLeaderDashboardNavigationClass($class = '', $method = '') {
		$CI = &get_instance();
		$dashArray = array('Rroleader/index', 'Rroleader/performance');
		$dashSegemnt = ucfirst($CI->router->fetch_class());
		$dashMthdSegment = $CI->router->fetch_method();
		$dashOthersAction = $dashSegemnt . '/' . $dashMthdSegment;
		if (in_array($dashOthersAction, $dashArray)) {
			$rdashclass = "active";
		} else {
			$rdashclass = "";
		}
		return $rdashclass;
	}

}




if (!function_exists('HunterLeaderDirectoryNavigationClass')) {

    function HunterLeaderDirectoryNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $aleadArray = array('Leads/index', 'Leads/profile');
        $acontrollerSegemnt = ucfirst($CI->router->fetch_class());

        $amthdSegment = $CI->router->fetch_method();
        $acurrentAction = $acontrollerSegemnt . '/' . $amthdSegment;
        
        if (in_array($acurrentAction, $aleadArray)) {
            $leadclass = "active";
        } else {
            $leadclass = "";
        }
        return $leadclass;
    }

}

if (!function_exists('RroperformanceNavigationClass')) {

    function RroperformanceNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $rroleadArray = array('Rrm/financial','Rrm/process','Rrm/index');
        $rrocontrollerSegemnt = ucfirst($CI->router->fetch_class());

        $rromthdSegment = $CI->router->fetch_method();
        $rrocurrentAction = $rrocontrollerSegemnt . '/' . $rromthdSegment;
        
        if (in_array($rrocurrentAction, $rroleadArray)) {
            $rroleadclass = "active";
        } else {
            $rroleadclass = "";
        }
        return $rroleadclass;
    }

}

if (!function_exists('RroAccountNavigationClass')) {

    function RroAccountNavigationClass($class = '', $method = '') {
        $CI = &get_instance();
        $rroAccountleadArray = array('Rrm/pipeline','Rrm/report');
        $rroAccountcontrollerSegemnt = ucfirst($CI->router->fetch_class());

        $rroAccountmthdSegment = $CI->router->fetch_method();
        $rroAccountcurrentAction = $rroAccountcontrollerSegemnt . '/' . $rroAccountmthdSegment;
        
        if (in_array($rroAccountcurrentAction, $rroAccountleadArray)) {
            $rroAccountleadclass = "active";
        } else {
            $rroAccountleadclass = "";
        }
        return $rroAccountleadclass;
    }

}
?>