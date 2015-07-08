<?php if(!defined ('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller
    {
//----------------------------------------------------------------------

        /*
        * Constructor
        */
        public function __construct()
        {

            parent::__construct ();
            $this->load->library ('encrypt');
            //$this->_user_id                 =  $this->session->userdata('user_id');
            $this->load->model ('home_model', 'home');

	DEFINE("FacebookAppID","1537187986495529");
	DEFINE("FacebookAppSecret",'41b16d06e17a8171ba44da9d7c480402');

        }

        public function nofbpw()
        {
                          redirect(base_url().'index.php/home/password');

        }
//----------------------------------------------------------------------
        /*
        * Home Page
        */
        
        public function loadview($viewname = 'index',$data) {
        
        					$data['divisions'] = $this->home->getDivisions();

        		$data['teams'] = $this->home->teams();
                $data['password'] = $this->home->check_fb_password();
     
     		 	if(isset($data['password']) && $this->session->userdata ('user_id') != null)
           
           		 {
                $password = base64_decode($data['password']->password);
                 if($password == 'null'){
                 
                 $this->load->view ('password', $data);

            
                }
             else {
         
            $this->load->view ($viewname, $data);
			
			}
	
	}
	else {
	
	 $this->load->view ($viewname, $data);
	}
    
        }
        
        
        public function index()
        {
    
			$data['divisions'] = $this->home->getDivisions();
			   $data['lastest_fixture'] = $this->home->latest_fixtures ();
            $data['lastest_journey'] = $this->home->latest_journey ();

			


		$this->loadview('index',$data);
          
        }
        
               public function viewclub()
        {
    
$data['teamdetail'] = $this->home->getTeam($_GET['id']);
		$this->loadview('viewclub',$data);
          
        }
        

        public function set_password(){
           $new_pass  = mysql_real_escape_string($this->input->post('new_pass'));
           $conf_pass =  mysql_real_escape_string($this->input->post('Conf_pass'));
           $team =  mysql_real_escape_string($this->input->post('team'));

           if($new_pass != $conf_pass){
                $this->session->set_flashdata ('login', 'Password no match');
                redirect(base_url().'index.php/home/password');
           }
           else{
               $this->home->update_fb_password(base64_encode($new_pass));
               $this->home->update_team($team);
               redirect(base_url());
            }
        }
//----------------------------------------------------------------------
        /*
        * Login To User
        */
        public function login()
        {
			$data['divisions'] = $this->home->getDivisions();
            //Get values from login form
            $user_email = mysql_real_escape_string ($this->input->post ('email'));
            $password = mysql_real_escape_string ($this->input->post ('password'));


            $encrypt_pass = base64_encode ($password);

            $check_login = $this->home->login_user ($user_email, $encrypt_pass);

            if(!empty($check_login))
            {
                redirect (base_url () . 'index.php/home/index');
                exit();
            } else
            {
                $this->session->set_flashdata ('login', 'Invalid Email and Password');
                redirect (base_url () . 'index.php/home/pg_login');
                exit();
            }
        }

        public function alljourneys()
        {
			$data['divisions'] = $this->home->getDivisions();
            $data['lastest_journey'] = $this->home->latest_journey ();
          	$this->loadview('all_journey',$data);
        }
//----------------------------------------------------------------------
        /*
        * Login To User
        */
        public function logout()
        {
			$data['divisions'] = $this->home->getDivisions();
            $this->session->all_userdata ();
            $array_items = array('user_id' => '');
            $this->session->unset_userdata ($array_items);
            redirect (base_url () . 'index.php/home/pg_login');
            exit();
        }
//----------------------------------------------------------------------
        /*
        * Insert User Record
        */
        public function registration()
        {
			$data['divisions'] = $this->home->getDivisions();
            $dt = new DateTime();
            $email = mysql_real_escape_string ($this->input->post ('email'));
            $password = mysql_real_escape_string ($this->input->post ('password'));
            $Confpass = mysql_real_escape_string ($this->input->post ('retype'));

            $check_email = $this->home->check_email ($email);

            if($password != $Confpass)
            {

                $this->session->set_flashdata ('login', 'Password not match');
                // After  registration redirect to login page
                redirect (base_url () . 'index.php/home/pg_reg');
            }

            $encrypt_pass = base64_encode($password);

            if($check_email != true)
            {
			
                $data = array(
                    'user_fname'    => mysql_real_escape_string ($this->input->post ('fname')),
                    'user_lname'    => mysql_real_escape_string ($this->input->post ('lname')),
                    'user_dob'      => mysql_real_escape_string ($this->input->post ('dob')),
                    'user_email'    => mysql_real_escape_string ($this->input->post ('email')),
                    'password'      => $encrypt_pass,
                    'isActive'      => '1',
                    'usertype_id'   => '2',
                    'team'			=> mysql_real_escape_string ($this->input->post ('team')),
                    'register_time' => $dt->format ('Y-m-d H:i:s')
                );

                // Insert user data into database
                $this->home->insert_user_detail ($data);
                // After Registration Success message
                $this->session->set_flashdata ('msg', 'Registration Successful, You can now Login');
                // After  registration redirect to login page
                redirect (base_url () . 'index.php/home/pg_login');
            } else
            {
                $this->session->set_flashdata ('login', 'Account Already Created');
                // After  registration redirect to login page
                redirect (base_url () . 'index.php/home/pg_reg');
            }
            exit();
        }

        public function fb_login()
        {
			$data['divisions'] = $this->home->getDivisions();
            //return url yaha ka dia hu\a ha
            //theek ha
            require 'application/src/facebook.php';

            $dt = new DateTime();
            $fb_config = array('appId' => FacebookAppID, 'secret' => FacebookAppSecret);

            $fb = new Facebook($fb_config);
            $user = $fb->getUser ();


            if($user)
            {
                try
                {
                    $user_profile = $fb->api ('/me');
                    $email = $user_profile['email'];
                    $check_email = $this->home->check_fb_email ($email);

                    if($check_email != 0)
                    {
                        $this->session->set_userdata ('user_id', $check_email);
                    } else
                    {
                        $fb_id = $user_profile['id']; // To Get Facebook ID
                        $fb_fname = $user_profile['first_name']; // To Get Facebook Username
                        $fb_lname = $user_profile['last_name']; // To Get Facebook Username
                        $fbfullname = $user_profile['name']; // To Get Facebook full name
                        $femail = $user_profile['email']; // To Get Facebook email ID

                        if(isset($user_profile['birthday']))
                        {
                            $fb_dob = $user_profile['birthday'];
                        } else
                        {
                            $fb_dob = 'null';
                        }

                        /* ---- Session Variables -----*/
                        $this->session->set_userdata ('FBID', $fb_id);
                        $this->session->set_userdata ('fname', $fb_fname);
                        $this->session->set_userdata ('lname', $fb_lname);
                        $this->session->set_userdata ('dob', $fb_dob);
                        $this->session->set_userdata ('FULLNAME', $fbfullname);
                        $this->session->set_userdata ('EMAIL', $femail);
                        $password = base64_encode('null');
                        $data = array(
                            'user_fname'    => $this->session->userdata ('fname'),
                            'user_lname'    => $this->session->userdata ('lname'),
                            'user_dob'      => $this->session->userdata ('dob'),
                            'user_email'    => $this->session->userdata ('EMAIL'),
                            'password'      => $password,
                            'isActive'      => '1',
                            'usertype_id'   => '2',
                            'register_time' => $dt->format ('Y-m-d H:i:s')
                        );

                        $this->home->add_fb_user ($data);
                    }


                    //       checkuser($fbid,$fbuname,$fbfullname,$femail);    // To update local DB
                } catch (FacebookApiException $e)
                {
                    error_log ($e);
                    $user = null;
                }
            }
            if($user)
            {
                redirect (base_url ());
                exit();
            } else
            {

                $fbURL = $fb->getLoginUrl (array('scope' => 'email,user_birthday', 'redirect_uri' => base_url () . 'index.php/home/fb_login'));
                //redirect(base_url().'index.php/home/pg_login');exit();
            }
        }

        public function pg_reg()
        {
			$data['divisions'] = $this->home->getDivisions();
			
        $data['teams'] = $this->home->teams();
            $this->loadview ('registration',$data);
        }
		
		public function viewteams()
        {
			$data['divisions'] = $this->home->getDivisions();
        $data['division'] = $this->home->getDivisionName($_GET['division']);
		$data['divteams'] = $this->home->getDivisionTeams($_GET['division']);
            $this->loadview ('viewteams',$data);
        }

        public function pg_login()
        {
	$data['divisions'] = $this->home->getDivisions();
            require 'application/src/facebook.php';

            $fb_config = array('appId' => FacebookAppID, 'secret' => FacebookAppSecret);

            $fb = new Facebook($fb_config);

            $fbURL = $fb->getLoginUrl (array('scope' => 'email,user_birthday', 'redirect_uri' => base_url () . 'index.php/home/fb_login'));
            $data['fbUrl'] = $fbURL;

            $this->loadview ('login', $data);
        }

        public function forget_password()
        {
			$data['divisions'] = $this->home->getDivisions();
            require "application/src/class.phpmailer.php";

            $email = mysql_real_escape_string ($this->input->post ('email'));

            $data = $this->home->user_detail ($email);
            $password = base64_decode ($data->password);


            $message = '<h1>Forget Password</h1>';
            $message .= 'You received a request for password Following are the detail of the your account.<br />';
            $message .= '<p>Email Address : ' . $data->user_email . '</p>';
            $message .= '<p>Password : ' . $password . '</p>';
            $message .= "Regards</br>AwayFromHome";

            $mail = new PHPMailer();
            $mail->IsSMTP ();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Username = "test@logobench.com";
            $mail->Password = "Test@123";

            $mail->From = $mail->Username;
            $mail->FromName = "'NoReplay@awayfromhome.com', 'Noreply'";
            $mail->AddAddress ($email, "Forgot Password");
            $mail->WordWrap = 100;
            $mail->IsHTML (true);
            $mail->Subject = html_entity_decode ("AwayFromHome - Forgot Password", ENT_QUOTES, 'UTF-8');
            $mail->Body = (html_entity_decode ($message, ENT_QUOTES, 'UTF-8'));
//        $mail->MsgHTML($html);

            $mail->Send ();

            $this->session->set_flashdata ('msg', 'Password is send to your Email.');
            redirect (base_url () . 'index.php/home/pg_login');
        }

        public function create_team()
        {
			$data['divisions'] = $this->home->getDivisions();
            $dt = new DateTime();

            $data = array(
                'name'        => mysql_real_escape_string ($this->input->post ('t_name')),
                'address'     => mysql_real_escape_string ($this->input->post ('t_address')),
                'postcode'    => mysql_real_escape_string ($this->input->post ('t_postcode')),
                'division'    => mysql_real_escape_string ($this->input->post ('t_division')),
                'create_time' => $dt->format ('Y-m-d H:i:s'),
                'user_id'     => $this->session->userdata ('user_id')
            );
            $this->home->insert_team ($data);

            $this->session->set_flashdata ('msg', 'Create Successfully');
            redirect (base_url () . 'index.php/home/team');
        }

        public function team()
        {
			$data['divisions'] = $this->home->getDivisions();
            $this->load->view ('teams');
        }

        public function fixture()
        {
			$data['divisions'] = $this->home->getDivisions();
            if($this->session->userdata ('user_id') != null)
            {
//        $data['fixture_detail'] = $this->home->fixture_detail();
                $data['fixture_detail'] = $this->home->fixture_all_detail ();

            } else
            {
                $data['fixture_detail'] = $this->home->fixture_all_detail ();

            }
            $this->load->view ('fixtures', $data);
        }

        public function fixture_insert()
        {

            $data = array(
                'hometeam_id'  => mysql_real_escape_string ($this->input->post ('home_team')),
                'awayteam_id'  => mysql_real_escape_string ($this->input->post ('away_team')),
                'date_created' => mysql_real_escape_string ($this->input->post ('date')),
                'isactive'     => '1',
                'user_id'      => $this->session->userdata ('user_id')
            );
            $this->home->fixture_insert ($data);
            $this->session->set_flashdata ('msg', "Fixtures is Created");

            redirect (base_url () . 'index.php/home/fixture');
        }

        public function post_journey()
        {
			$data['divisions'] = $this->home->getDivisions();
            $data['fixture_detail'] = $this->home->fixture_detail();
          
            $this->loadview ('post_journey', $data);
        }

        public function latest_journey()
        {
			$data['divisions'] = $this->home->getDivisions();
            $data['fixture_detail'] = $this->home->latest_journey_detail ();
            $this->loadview ('post_journey', $data);
        }

        public function latest_fixture()
        {
			$data['divisions'] = $this->home->getDivisions();
            $data['lastest_fixture'] = $this->home->latest_fixtures ();

            $this->loadview ('index', $data);
        }

        public function insert_journey()
        {
			$data['divisions'] = $this->home->getDivisions();
            $dt = new DateTime();
            $data = array(
                'postcode'    => mysql_real_escape_string ($this->input->post ('postcode')),
                'address'     => mysql_real_escape_string ($this->input->post ('address')),
                'leave_time'  => mysql_real_escape_string ($this->input->post ('leave_time')),
                'from'        => mysql_real_escape_string ($this->input->post ('from')),
                'to'          => mysql_real_escape_string ($this->input->post ('to')),
                'desc'        => mysql_real_escape_string ($this->input->post ('desc')),
                'arrive_time' => mysql_real_escape_string ($this->input->post ('arrive_time')),
                'team_id'     => mysql_real_escape_string ($this->input->post ('away_team')),
                'fixture_id'  => mysql_real_escape_string ($this->input->post ('fixtures')),
                'user_id'     => $this->session->userdata ('user_id'),
                'create_date' => $dt->format ('Y-m-d H:i:s')
            );

            $this->home->journey_insert ($data);
            $this->session->set_flashdata ('msg', "Journey is Created");
            redirect (base_url () . 'index.php/home/post_journey');
        }

        public function search()
        {
			$data['divisions'] = $this->home->getDivisions();
            $data['lastest_journey'] = $this->home->search_all_journey ();

            $this->loadview ('search', $data);
        }

        public function search_journey()
        {
			$data['divisions'] = $this->home->getDivisions();
            $dt = new DateTime();
            //$search = $this->input->post('keyword');
            $search_name = mysql_real_escape_string ($this->input->post ('search_name'));
            $search_date = mysql_real_escape_string ($this->input->post ('search_date'));

            if($search_date == null)
            {
                $search_date = $dt->format ('d-m-Y');
            }
            $replace = array();
            $name = str_replace ('`', '', $search_name);
            $name = str_replace ('/', '', $search_name);
            $name = str_replace ('-', '', $search_name);
            $name = str_replace ('_', '', $search_name);
            $name = str_replace (',', '', $search_name);
            $name = str_replace ('(', '', $search_name);
            $name = str_replace (']', '', $search_name);
            $name = str_replace ("'", '', $search_name);
            $name = str_replace ('"', '', $search_name);
            $name = str_replace (')', '', $search_name);
            $name = str_replace ('[', '', $search_name);

            $data['lastest_journey'] = $this->home->search_journey ($name, $search_date);

            $this->load->view ('search', $data);
            //exit();

        }

         public function journeyProcess(){
         
          if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                //////////////////////INSERT INTO DB///////////////////
                $dataArray = array(
                   'user_id' => $this->session->userdata('user_id'),
                   'postcode' => $teamPostcode,
                   'address' => $teamAdress,
                   'leave_time' => $post['leaveTime'],
                   'arrive_time' => $post['arriveTime'],
                   'team_id' => $userTeamId,
                   'fixture_id' => $post['fixtures'],
                   'desc' => $post['description'],
                   'From' => $fromAddr,
                   'to' => $toAddr,
                   'duration' => $duration,
                   'distance' => $distance,
                   'people' =>  $post['numberPeople'],
                   'totalCost' => $price,
                   'returning' => $ret,
                );

                $checkExistance = $this->db->get_where('journey', $dataArray);
                if($checkExistance->num_rows() === 0){
                    $this->db->insert('journey', $dataArray); 
                    
                            $this->load->view ('Thanks');
                   
                }
                
            }
            else {
         
              $this->output->set_header("Location:".base_url()); 
              
              }
         }

        public function dataProcess(){
            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                ////////////GET data from form
                $post = array();
                foreach ( $_POST as $key => $value ){
                    $post[$key] = $this->input->post($key);
                }
                $this->load->model('home_model');
                ////////////////////GET From address
                $fromAddr = $this->home_model->getAdressByPostCode($post['leavingFrom']);
                $toAddr = $this->home_model->getAdressByPostCode($post['leavingTo']);
                ///////////////////GET To address
                ///////////////////Format Post Codes
                $hometeamPostCode = $this->home_model->postalCodeFormatter($post['leavingFrom']);
                $awayteamPostCode = $this->home_model->postalCodeFormatter($post['leavingTo']);
              
                /////////////////////GET GOOGLE MAPS API DISTANCE AND DURATION
                $postcode1=$hometeamPostCode;
                $postcode2=$awayteamPostCode;
                $result = array();
                $url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=$postcode1&destinations=$postcode2&mode=driving&language=en-EN&sensor=false";
                $data = @file_get_contents($url);
                $result = json_decode($data, true);

                ////////////GET distance based on postal codes from fixture//////
                $METERS_TO_MILES = 0.000621371192;
                $metersDistance = $result['rows'][0]['elements'][0]['distance']['value'];
                $distance = round(( $metersDistance * $METERS_TO_MILES * 10 ) / 10);
              
                ///////////GET duration based on postal codes from fixture//////
                $duration = $result['rows'][0]['elements'][0]['duration']['value'];
                $duration = round($duration/60);
                
                //////////////////Verify if user got custom distance
             
                    $userDistance = '';
                
                     
                //////////////////Calculate user speculations on duration of journey
                $to_time = strtotime($post['arriveTime']);
                $from_time = strtotime($post['leaveTime']);
                $userDuration = round(abs($to_time - $from_time) / 60,2);
       
                //////////////////Get user team id
                $select = $this->db->get_where('user', array('user_id' => 60));
                foreach ($select->result() as $row) {
                    $userTeamId = $row->team;
                }

                /////////////////Get user team info
                $homeTeamName = $this->db->get_where('teams', array('id' => $userTeamId));
                foreach ($homeTeamName->result() as $row) {
                    $teamName = $row->name;
                    $teamAdress = $row->address;
                    $teamPostcode = $row->postcode;
                    $teamGroundName = $row->ground_name;
                }
                ////////////////Get current time
                $currentDate = date("Y-m-d H:i:s");

                //////////////////Returning
               if(isset($post['return'])){
                    $ret = 1;
               }    
               else{
                    $ret = 0;
               }
                
                /////////Calculate total price of journey
                $MPG = $post['MPG'];
                $price = $post['petrolPrice'];
                //$offset = $post['NODO'];
 				
 				$offset = 5;
                $this->load->model('home_model');

                if($userDistance != 0){
                    $priceDist = $userDistance;
                }
                else{
                    $priceDist = $distance;
                }
                
                $price = $this->home_model->calculateCost($priceDist,$MPG,$price,$offset);

			if ( $ret == 1 ) {
			
			$price = $price * 2;
			
			}
                //////////////////////INSERT INTO DB///////////////////
                $dataArray = array(
                   'user_id' => $this->session->userdata('user_id'),
                   'postcode' => $teamPostcode,
                   'address' => $teamAdress,
                   'leave_time' => $post['leaveTime'],
                   'arrive_time' => $post['arriveTime'],
                   'team_id' => $userTeamId,
                   'fixture_id' => $post['fixtures'],
                   'desc' => $post['description'],
                   'From' => $fromAddr,
                   'to' => $toAddr,
                   'duration' => $duration,
                   'distance' => $distance,
                   'people' =>  $post['numberPeople'],
                   'totalCost' => $price,
                   'returning' => $ret,
                );

//                $checkExistance = $this->db->get_where('journey', $dataArray);
//                if($checkExistance->num_rows() === 0){
//                    $this->db->insert('journey', $dataArray);
//                }
                
                $this->load->view ('mapView',array(
                    'dataProvider' => $post,
                    'HTcode' => $hometeamPostCode,
                    'ATcode' => $awayteamPostCode,
                    'duration' => $duration,
                    'distance' => $distance,
                    'price' => $price,
                    'dataArray' => $dataArray
                    ));
                //////////////////////END INSERT INTO DB///////////////
            }
            else{
                $this->output->set_header("Location:".base_url()); 
            } 
        }

        public function registerJourney(){
            $dataArray = array();
            foreach ( $_POST as $key => $value ){
                $dataArray[$key] = $this->input->post($key);
            }

            $leavetime = new DateTime($dataArray['leave_time']);
            $leavetime = $leavetime->format('H:i:s');

            $arriveTime = new DateTime($dataArray['arrive_time']);
            $arriveTime = $arriveTime->format('H:i:s');

            $checkExistance = $this->db->get_where('journey', array(
                'user_id' => intval($dataArray['user_id']),
                'postcode' => $dataArray['postcode'],
                'address' => $dataArray['address'],
                'leave_time' => $leavetime,
                'arrive_time' => $arriveTime,
                'team_id' => $dataArray['team_id'],
                'fixture_id' => $dataArray['fixture_id'],
                'desc' => $dataArray['desc'],
                'From' => $dataArray['From'],
                'to' => $dataArray['to'],
                'duration' => $dataArray['duration'],
                'distance' => $dataArray['distance'],
                'people' => $dataArray['people'],
                'totalCost' => $dataArray['totalCost'],
                'returning' => $dataArray['returning'],
            ));
            unset($dataArray['submit']);
            if($checkExistance->num_rows() == 0){
                $this->db->insert('journey', array(
                    'user_id' => intval($dataArray['user_id']),
                    'postcode' => $dataArray['postcode'],
                    'address' => $dataArray['address'],
                    'leave_time' => $leavetime,
                    'arrive_time' => $arriveTime,
                    'team_id' => $dataArray['team_id'],
                    'fixture_id' => $dataArray['fixture_id'],
                    'desc' => $dataArray['desc'],
                    'From' => $dataArray['From'],
                    'to' => $dataArray['to'],
                    'duration' => $dataArray['duration'],
                    'distance' => $dataArray['distance'],
                    'people' => $dataArray['people'],
                    'totalCost' => $dataArray['totalCost'],
                    'returning' => $dataArray['returning'],
                ));

//                var_dump($leavetime);
//                die();
            }

            $this->output->set_header("Location:".base_url());
        }
    }

?>