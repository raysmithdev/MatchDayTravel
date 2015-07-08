<?php if(!defined ('BASEPATH')) exit('No direct script access allowed');

    class Home_model extends CI_Model
    {

        /*
        * Properties
        */
        private $_table_users;
        private $_table_teams;
        private $_table_fixtures;
        private $_table_journey;

//----------------------------------------------------------------------

        function __construct(){
            parent::__construct ();
            //Load Table Names from Config
            $this->_table_users = $this->config->item ('table_users');
            $this->_table_teams = $this->config->item ('table_teams');
            $this->_table_fixtures = $this->config->item ('table_fixtures');
            $this->_table_journey = $this->config->item ('table_journey');
			$this->_table_divisions= $this->config->item ('table_divisions');
        }

//----------------------------------------------------------------------

        function insert_user_detail($data){
            $this->db->insert ($this->_table_users, $data);
            return true;
        }

//----------------------------------------------------------------------

        function login_user($user_email, $password)
        {
            //Login Query
            $this->db->where ('user_email', $user_email);
            $this->db->where ('password', trim ($password));
            $this->db->where ('isActive', '1');
            $query = $this->db->get ($this->_table_users);

            //Check if Result is Greater Than Zero
            if($query->num_rows () > 0)
            {
                $this->session->set_userdata ('user_id', $query->row ()->user_id);
                $this->session->set_userdata ('user_fname', $query->row ()->user_fname);
				$this->session->set_userdata ('user_team',$query->row()->team);
                return $query->row ();
            }
        }
		
		function getDivisions() {
		  $query = $this->db->query("SELECT * from divisions ORDER BY division_id ASC");
			 if($query->num_rows () > 0)
            {
			return $query->result ();
			}
		}
		
		function getDivisionName($d){
            $query = $this->db->query("SELECT * from divisions where division_id = '".mysql_real_escape_string($d)."'");
			if($query->num_rows () > 0){
			     return $query->row()->division_name;
			}
			else {
			     return "Division does not exist";
			}	
        }
		
	
        
		
		function getDivisionTeams($d) {
		
		   $this->db->where('division',mysql_real_escape_string($d));
		   $query = $this->db->get ($this->_table_teams);
		   if($query->num_rows () > 0){
		      return $query->result ();
		   }	
		}
		
			
		function getTeam($t) {
		
		   $this->db->where('id',mysql_real_escape_string($t));
		   $query = $this->db->get ($this->_table_teams);
		   if($query->num_rows () > 0){
		      return $query->result ();
		   }	
		}

        function check_email($email){
            //Login Query
            $this->db->where ('user_email', $email);
            $query = $this->db->get ($this->_table_users);

            //Check if Result is Greater Than Zero
            if($query->num_rows () > 0){
                return true;
            } 
            else{
                return false;
            }
        }

        function check_fb_email($email){
            //Login Query
            $this->db->where ('user_email', $email);
            $query = $this->db->get ($this->_table_users);

            //Check if Result is Greater Than Zero
            if($query->num_rows () > 0){
                return $query->row ()->user_id;   
            } 
            else{
                return 0;
            }
        }

//----------------------------------------------------------------------
        function user_detail($user_email){
            //Login Query
            $this->db->where ('user_email', $user_email);
            $query = $this->db->get ($this->_table_users);

            //Check if Result is Greater Than Zero
            if($query->num_rows () > 0){
                return $query->row ();
            }
        }
        function current_user_detail(){
            //Login Query
            $this->db->where ('user_id', $this->session->userdata('user_id'));
            $query = $this->db->get ($this->_table_users);

            //Check if Result is Greater Than Zero
            if($query->num_rows () > 0){
                return $query->row ();
            }
        }

        function insert_team($data){
            $this->db->insert ($this->_table_teams, $data);
            return true;
        }

        function fixture_insert($data){
            $this->db->insert ($this->_table_fixtures, $data);
            return true;
        }

        function fixture_detail(){  
          $t =  $this->session->userdata('user_team');
          if(empty($t)) {
            $t = 0;
          }
          $q = "SELECT home.name AS Home, away.name AS Away, fix.id FROM fixtures fix
                INNER JOIN teams away on away.id = fix.awayteam_id
                INNER JOIN teams home on home.id = fix.hometeam_id WHERE fix.hometeam_id = '".$t."' or fix.awayteam_id = '".$t."'";
                    
          $query = $this->db->query($q);
            
          //Check if Result is Greater Than Zero
          if($query->num_rows () > 0){
            return $query->result ();
          }
        }

        function fixture_all_detail(){
            $this->db->select ('*');
            $query = $this->db->get ($this->_table_teams);

            //Check if Result is Greater Than Zero
            if($query->num_rows () > 0){
                return $query->result ();
            }
        }

        function teams(){
            $this->db->select ('*');
            $query = $this->db->get ($this->_table_teams);

            //Check if Result is Greater Than Zero
            if($query->num_rows () > 0){
                return $query->result ();
            }
        }
        
        function team_detail(){
            $sql = 'SELECT f.`id`,t.`name` as "teamA",l.`name` as "teamB",`t`.`id` as "hometeam_id",l.`id`as "awayteam_id" FROM `fixtures` f
                INNER JOIN `teams` t ON  f.`hometeam_id` = t.`id`
                INNER JOIN `teams` l  ON  f.`awayteam_id` = l.`id`
                AND f.`isactive` = 1 WHERE f.`date_created` < CURRENT_TIME
                ORDER BY f.`date_created` ASC;';
            $query = $this->db->query ($sql);
            if($query->num_rows () > 0){
                return $query->result ();
            }
        }


        function latest_fixtures(){
            $sql = 'SELECT f.`date_created`,t.`address`,t.`name` as "hometeam",l.`name` as "awayteam" FROM `fixtures` f INNER JOIN `teams` t
                ON f.`hometeam_id` = t.`id`
                INNER JOIN teams l  ON f.`awayteam_id` = l.`id`
                WHERE f.`date_created` < CURRENT_DATE
                ORDER BY  t.`id` DESC;';

            $query = $this->db->query ($sql);
            if($query->num_rows () > 0){
                return $query->result ();
            }
        }


        function search_journey($search_name, $search_date){
            $sql = "SELECT * FROM journey INNER JOIN teams ON journey.team_id = teams.id WHERE name LIKE '%" . $search_name . "%' OR `journey`.`arrive_time` >=  '" . $search_date . "' ORDER BY `journey`.`arrive_time` DESC";
            $query = $this->db->query ($sql);

            if($query->num_rows () > 0){
                return $query->result ();
            }
        }

        function search_all_journey(){
            $sql = "SELECT * FROM journey INNER JOIN teams ON journey.team_id = teams.id ";
            $query = $this->db->query ($sql);

            if($query->num_rows () > 0){
                return $query->result ();
            }
        }

        function journey_insert($data){
            $this->db->insert ($this->_table_journey, $data);
            return true;
        }

        function latest_journey(){
            $sql = 'SELECT u.`user_fname`,
                j.`From`,
                j.`to`,
                j.`arrive_time`,
                j.`create_date`,
                j.`desc`
                FROM
                `journey` j INNER JOIN `user` u
                ON j.`user_id` = u.`user_id`
                ORDER BY j.`id` DESC';

            $query = $this->db->query ($sql);

            if($query->num_rows () > 0){
                return $query->result ();
            }
        }

        function add_fb_user($data){
            $this->db->insert ($this->_table_users, $data);
            $user_id = $this->db->insert_id ();
            $this->session->set_userdata ('user_id', $user_id);
        $this->load->view("password");
        }

        function check_fb_password(){
            $this->db->select('password');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $query = $this->db->get($this->_table_users);

            if($query->num_rows () > 0)
            {
                return $query->row();
            }
        }

        function update_fb_password($password){
            $data = array(
                'password' =>$password
            );

            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->update($this->_table_users, $data);
        }
        function update_team($team){
            $data = array(
                'team' =>$team
            );

            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->update($this->_table_users, $data);
        }

        function postalCodeFormatter($string){
            $words = explode(' ', $string);
            $returnstring = $words[0].''.$words[1];

            return $returnstring;
        }

        function calculateCost($distance,$mpg,$price,$offset){
            $distance = $offset / 100 * $distance + $distance;

            $distanceMiles = $distance;
            $distanceKms = $distance / 0.621371192237;

            $MPG = $mpg;
            $KML = 2.824809363 / $mpg;

            $liters = ($KML * $distanceKms) / 100;
            
            $totalPrice = round($price * $liters ,2);

            return $totalPrice;
        }

        function getAdressByPostCode($postcode){

            $search_code = urlencode($postcode);
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . $search_code . '&sensor=false';
            $json = json_decode(file_get_contents($url));

            $lat = $json->results[0]->geometry->location->lat;
            $lng = $json->results[0]->geometry->location->lng;

            // Get Address
            $address_url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&sensor=false';
            $address_json = json_decode(file_get_contents($address_url));
            $address_data = $address_json->results[0]->address_components;

            $street = str_replace('Dr', 'Drive', $address_data[1]->long_name);
            $town = $address_data[2]->long_name;
            $county = $address_data[3]->long_name;

            $addressArray = array('street' => $street, 'town' => $town, 'county' => $county);

            return $street.','.$town;
        }

    }

?>