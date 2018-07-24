<?php

/**
 * Created by PhpStorm.
 * User: Sanjay Yadav <yadav.sanjay@orangemantra.in>
 * Date: 15/01/2016
 * Time: 11:28 AM
 */
class User_model extends CI_Model {

    var $user_table = "app_users";

    function __construct() {
        parent::__construct();
    }

    /**
     * @param null $ID
     * @return mixed data
     * @date : 04/12/2015
     * @description : Get User data
     */
    public function getAllUsers($ID = null) {
        if ($ID != null) {
            $this->db->where('emp_id', $ID);
        }
        $this->db->select('*');
        $this->db->from($this->user_table);
        $result = $this->db->get();
        return $result->result();
    }

    public function get_details_result($user_id) {
        $this->db->where('care_id', $user_id);
        $this->db->select('id,user_pic');
        $this->db->from($this->user_table);
        $result = $this->db->get();
        return $result->result();
    }

    /**
     * @method : Add User
     * @param $data
     * @return bool
     * @date : 04/12/2015
     * @description : Add new User in the User table
     */
    public function create($data) {
        try {
            $this->load->library('form_validation');
            $config = array(
                array('field' => 'user_email', 'label' => 'Email', 'rules' => 'trim|required|is_unique[users.user_email]'),
                array('field' => 'user_mobile', 'label' => 'Mobile', 'rules' => 'trim|required|numeric')
            );

            $this->form_validation->set_rules($config);
            $this->form_validation->set_message('is_unique', 'You are already a registered member. Please Sign-in or click on forgot password.');
            if ($this->form_validation->run() == false) {
                $errors_array = '';
                foreach ($config as $row) {
                    $field = $row['field'];
                    $error = strip_tags(form_error($field));
                    if ($error)
                        $errors_array .= $error . ', ';
                }
                $message = array(
                    'status' => false,
                    'response_code' => '0',
                    'message' => rtrim($errors_array, ', ')
                );
            } else {
                $this->db->set('registered_date', 'NOW()', false);
                $this->db->set('user_modification_date', 'NOW()', false);
                $this->db->insert($this->user_table, $data);
                $this->load->library('email');
                $this->email->from(SITE_EMAIL, SITE_TITLE);
                $this->email->to($data['user_email']);
                $this->email->subject('New Registration');
                $this->email->message('Thank you for registering !');
                $this->email->send();
                $message = array(
                    'status' => true,
                    'response_code' => '1',
                    'message' => "User Added Successfully"
                );
            }
        } catch (Exception $ex) {
            $message = array(
                'status' => false,
                'response_code' => '0',
                'message' => $ex->getMessage(),
            );
        }
        return $message;
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     * @date : 20/01/2016
     * @method : Update User
     * @description : To update User
     */
    public function update($id, $data) {
        try {
            $update_data = $data;
            $this->db->set('user_modification_date', 'NOW()', FALSE);
            $this->db->where('id', $id);
            $query = $this->db->update($this->user_table, $update_data);
            if ($query) {
                $message = array(
                    'status' => true,
                    'response_code' => '1',
                    'message' => "Success"
                );
            } else {
                $message = array(
                    'status' => false,
                    'response_code' => '0',
                    'message' => 'Something Went wrong!'
                );
            }
        } catch (Exception $ex) {
            $message = array(
                'status' => false,
                'response_code' => '0',
                'message' => $ex->getMessage(),
            );
        }
        return $message;
    }

    /**
     * @param $id
     * @return bool
     * @date : 19/01/2016
     * @method :  Upload Profile Pic
     * @description : To Upload Profile Pic
     */
    protected function upload_profile_pic() {
        $config = array();
        ini_set('upload_max_filesize', '200M');
        ini_set('post_max_size', '200M');
        ini_set('max_input_time', 3000);
        ini_set('max_execution_time', 3000);
        $config['upload_path'] = IMAGESPATH . 'users/profile/';
        $config['allowed_types'] = '*'; //'mp3|wav';
        $config['file_name'] = md5(uniqid(rand(), true));
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('photo_id')) {
            $info = $this->upload->data();
            return $info;
        }
    }

    /**
     * @param $id
     * @return bool
     * @date : 04/12/15
     * @method :  Delete User
     * @description : To delete User from User table
     */
    public function delete($id) {
        if (isset($id) && $id != '') {
            $this->db->where('id', $id);
            $query = $this->db->delete($this->user_table);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function validate($mobile, $password) {
        $cond = array(
            'user_mobile' => $mobile,
            'user_pass' => $password,
        );
        $this->db->where($cond);
        $query = $this->db->get($this->user_table);
        if ($query->num_rows() === 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    function CheckCareDevice($deviceId, $userId, $deviceType) {
        $this->db->where(array('device_id' => $deviceId, 'user_id' => $userId, 'device_type' => $deviceType));
        $res = $this->db->get($this->device_table);
        return $res->num_rows();
    }

    function CheckDevice($deviceId, $deviceType) {
        $this->db->where(array('device_id' => $deviceId, 'device_type' => $deviceType));
        $res = $this->db->get($this->device_table);
        return $res->num_rows();
    }

    public function updateDeviceId($deviceId, $careId, $regId) {
        $data = array(
            'reg_id' => $regId
        );
        $this->db->where(array('device_id' => $deviceId, 'user_id' => $careId));
        $res = $this->db->update($this->device_table, $data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function InsertDeviceId($deviceId, $userId, $regId, $deviceType) {
        $data = array(
            'device_id' => $deviceId,
            'user_id' => $userId,
            'reg_id' => $regId,
            'device_type' => $deviceType,
        );
        $res = $this->db->insert($this->device_table, $data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    function DeleteDeviceUser($deviceId) {
        $this->db->where(array('device_id' => $deviceId));
        $res = $this->db->delete($this->device_table);
    }

    function valid_current_pass($id, $current_pass) {
        $cond = array(
            'id' => $id,
            'user_pass' => $current_pass,
        );
        $this->db->where($cond);
        $query = $this->db->get($this->user_table);
        if ($query->num_rows() === 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    // reset new password
    function updatepassword($table, $user_id, $new_pass) {
        $user_email = $this->db
                        ->select('email_id')
                        ->where('care_id', $user_id)
                        ->limit(1)
                        ->get('users')
                        ->result_array()[0]['email_id'];
        $useremail = $user_email;
        $this->load->library('email');
        $this->email->from('info@crxlife.com', 'CRX Life');
        $this->email->to($useremail);
        $this->email->subject('change Password');
        $this->email->message('Hi Your password has been changed: New Password is: ' . $new_pass);
        $this->email->send();
        $post = $this->input->post();
        $ins = array();
        $ins['password'] = md5($new_pass);
        $this->db->where('care_id', $user_id);
        $this->db->update($table, $ins);
    }

    public function validate_password($data) {
        try {
            $this->load->library('form_validation');
            $config = array(
                array('field' => 'mobile', 'label' => 'User Mobile', 'rules' => 'trim|required')
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $errors_array = '';
                foreach ($config as $row) {
                    $field = $row['field'];
                    $error = strip_tags(form_error($field));
                    if ($error)
                        $errors_array .= $error . ', ';
                }
                $message = array(
                    'status' => false,
                    'response_code' => '0',
                    'message' => rtrim($errors_array, ', ')
                );
            } else {
                $pass = $this->generateStrongPassword('9');
                $this->load->library('email');
                $this->email->from('info@crxlife.com', 'CRX Life');
                $this->email->to($data['email_id']);
                $this->email->subject('Forgot Password');
                $this->email->message('Hi Your password has been changed: New Password is: ' . $pass);
                $this->email->send();
                $user_email = $data['email_id'];
                $user_mobile = $data['mobile'];
                $updtate = array(
                    'password' => md5($pass)
                );
                $cond = array(
                    'mobile' => $user_mobile,
                );
                $this->db->where($cond);
                $query = $this->db->update($this->user_table, $updtate);
                $message = array(
                    'status' => true,
                    'response_code' => '1',
                    'password' => $pass,
                    'message' => 'Password has been changed succeessfully.Please Check you mail.Thank You!'
                );
            }
        } catch (Exception $ex) {
            $message = array(
                'status' => false,
                'response_code' => '0',
                'message' => $ex->getMessage(),
            );
        }
        return $message;
    }

    function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds') {
        $sets = array();
        if (strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if (strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if (strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if (strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';
        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);
        if (!$add_dashes)
            return $password;
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while (strlen($password) > $dash_len) {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }

    public function updateprofile($id) {
        $file = $this->upload_profile_pic();
        if ($file['file_name'] != '') {
            $data = array(
                'photo_id' => $file['file_name']
            );
            $this->db->where('care_id', $id);
            $query = $this->db->update($this->user_table, $data);
            if ($query) {
                $filepath = base_url() . 'uploads/users/profile/' . $file['file_name'];
                return $filepath;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function checkUser($data) {
        $userid = $data['user_id'];
        $this->db->where('id', $userid);
        $res = $this->db->get($this->user_table);
        if ($res->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function CheckUserCredentials($data) {
        $cond = array(
            'user_mobile' => $data['user_mobile'],
        );
        $this->db->where($cond);
        $res = $this->db->get($this->user_table);
        if ($res->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* reg_id check  android */

    function checkreg_id($table, $user_id) {
        $this->db->select('android_device_id');
        $this->db->where('mobile', $user_id);
        $query = $this->db->get($table);
        return $query->row();
    }

    /* Update reg_id for android */

    function updateregid($table, $mobile, $reg_id) {
        $data = array();
        $data['android_device_id'] = json_encode($reg_id);

        $this->db->where('mobile', $mobile);
        $this->db->update($table, $data);
    }

    /*  Logout For Device  */

    function updaterlogout($table, $user_id, $reg_id) {

        $getuser = $this->db->select('reg_id')->where('care_id', $user_id)->limit(1)->get('users')->result_array()[0]['reg_id'];
        $reg_user_id = json_decode($getuser);
        $key = array_search($reg_id, $reg_user_id); // $key = 2;
        unset($reg_user_id[$key]);
        if (count($reg_user_id) > 0) {
            $data = array();
            foreach ($reg_user_id as $k => $v) {

                $reg_ids[] = $v;
                $data['reg_id'] = json_encode($reg_ids);
            }
        } else {
            $data = array();
            $data['reg_id'] = '';
        }
        $this->db->where('user_id', $user_id);
        $this->db->update($table, $data);
    }

    public function GetUpdateddata($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->user_table);
        return $query->row();
    }

    function Deviceupdaterlogout($table, $careId, $deviceId) {
        $this->db->where(array('device_id' => $deviceId, 'user_id' => $careId));
        $this->db->delete($table);
    }

    function androidnotification($careID, $action = 'default', $deviceID = '') {
        $this->db->select('reg_id');
        $this->db->where('user_id', $careID);
        $this->db->where('device_id', $deviceID);
        $this->db->where('device_type', 'android');
        $query = $this->db->get($this->device_table);
        $getuser = $query->result_array();
        foreach ($getuser as $val) {
            $register_send = $val;
            $value = $register_send['reg_id'];
            $get = json_decode($value);
            $notification = GetNonActionNotificationDetails($action);
            $message = $notification->message;
            $api_key = 'AIzaSyBxFRHbCn2sxHRgu2rdmDZn0Q-RIC46J8Y';

            if (empty($api_key) || count($get) < 0) {
                $result = array(
                    'success' => '0',
                    'message' => 'api or reg id not found',
                );
                echo json_encode($result);
                die;
            }
            $registrationIDs = $get;

            // $message = "congratulations";
            $url = 'https://android.googleapis.com/gcm/send';
            $resultData = array(
                'type' => 'activity',
                'title' => $notification->title
            );
            $fields = array(
                'registration_ids' => $registrationIDs,
                'data' => array("message" => $message, "title" => $notification->title, "type" => 'Signin', 'data' => json_encode($resultData)),
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
        }
    }

    function iosNotification($careID, $action = 'default', $deviceID = '') {
        $this->db->select('reg_id');
        $this->db->where('user_id', $careID);
        $this->db->where('device_id', $deviceID);
        $this->db->where('device_type', 'ios');
        $query = $this->db->get($this->device_table);
        $getuser = $query->result_array();
        $url = IMAGESPATH . 'ios-certified/LiveCert.pem';
        $CI = &get_instance();
        $sound = 'default';
        $badge = '0';
        $content_aval = '1';
        $notification = GetNonActionNotificationDetails($action);
        $message = $notification->message;
        $message = $notification->message;
        $title = $notification->title;
        print_r($getuser);
        die;
        foreach ($getuser as $valios) {
            //print_r($valios); 
            $register_send = $valios;
            $value = $register_send['reg_id'];
            $gets = json_decode($value);
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

?>