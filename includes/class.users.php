<?php
/**
 * Users
 *
 * @author Shrikant Yadav
 */
class Users {  

    /*
     * Function User Signin 
     */
    public function signin($post) {

        global $connection;  

        $email = trim($post['user_email']);   
        $userpassword = trim($post['user_password']);

        // Check if all required value given
        if(($email!='') && ($userpassword!='') ) {  

    //     Encryption/Encode - MD5 - Hash key  
           $md5pass =  md5($userpassword);   

            // User Exists Check    
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                 $sql = "SELECT id, first_name, last_name, role, status FROM users WHERE email='$email' AND password='$md5pass'";  
            }  

            $result = mysqli_query($connection, $sql);

            if($result) { 
            $num_rows = mysqli_num_rows($result);
                if($num_rows>0) {
 
                    $row = mysqli_fetch_assoc($result);

                    $status = $row['status'];  
                    if($status==1) { 
                        
                        $_SESSION['user_id'] = $row['id'];  
                        $_SESSION['user_role'] = $row['role'];   
                        $_SESSION['first_name'] = $row['first_name'];   
                        $_SESSION['last_name'] = $row['last_name'];   
                        $_SESSION['full_name'] = $row['first_name'].' '.$row['last_name'];  

                        return 1; 

                    } else {

                        return 2; 

                    }


                } else {

                    return 0; 

                }
            } 

        }  

    } 
     
    
    /*
    * User Roles
    */
    public function get_roles() {

        $roles['administrator'] = 'Administrator';
        $roles['staff']         = 'Staff';

        return $roles; 
    } 
    
    /*
    * Change Password
    */
    public function change_password($user_id, $old_password, $new_password, $confirm_password) {

       global $connection; 

       $sql = "SELECT password FROM users WHERE id='$user_id'";
       $result = mysqli_query($connection, $sql);
       if($result) {
           $num_rows = mysqli_num_rows($result);
           if($num_rows>0) {
              $row = mysqli_fetch_assoc($result);
              $db_password = $row['password'];
           }
       }

       // Check Password
       if($db_password===$old_password) {
           // Update Password
           $sql = "UPDATE users
                   SET password='$confirm_password'
                   WHERE id='$user_id'"; 
           $result = mysqli_query($connection, $sql);
           // It return 1 or 0;  
           if($result) { 
               echo "Password updated successfully."; 
           } else {
               echo "Password not updated. Please try again."; 
           } 

       } else { 
           echo "Old Password incorrect.";  
       }

    }
    
    /*
    * Admin Change Password
    */
    public function admin_change_password($user_id, $new_password, $confirm_password) { 

       global $connection; 

       if(($new_password!='') && ($confirm_password!='')) {

           $sql = "SELECT password FROM users WHERE id='$user_id'";
           $result = mysqli_query($connection, $sql);
           if($result) {
               $num_rows = mysqli_num_rows($result); 
               if($num_rows>0) {     
                        
                        // Password 
                        $en_password = md5($confirm_password);     

                        // Update Password
                        echo $sql = "UPDATE users
                                SET password='$en_password'
                                WHERE id='$user_id'"; 
                        
                        $result = mysqli_query($connection, $sql);
                         
                        // It return 1 or 0;  
                        if($result) {  
                            echo "<div class='alert alert-success'>Password updated successfully.</div>"; 
                        } else {
                            echo "<div class='alert alert-danger'>Password not updated. Please try again.</div>"; 
                        } 
               }
           } 

       } 

    }

    /*
    * Function For Retrive All Users Information
    */
    public function get_users() {

        global $connection; 
        $rows = array();

        $sql = 'SELECT * FROM users ORDER BY id DESC'; 
        $result = mysqli_query($connection, $sql); 

        if($result) {
            $num_rows = mysqli_num_rows($result);
            if($num_rows>0) {
                 for($r=1;$r<=$num_rows;$r++) {
                      $row = mysqli_fetch_assoc($result);
                      $rows[] = $row;
                 }
            }
        }

        return $rows; 
    }

    /*
    * Function For Retrive All Users Information
    */
    public function get_staff() { 

        global $connection; 
        $rows = array(); 

        $sql = 'SELECT * FROM users WHERE role="staff"';
        $result = mysqli_query($connection, $sql); 

        if($result) {
            $num_rows = mysqli_num_rows($result);
            if($num_rows>0) {
                 for($r=1;$r<=$num_rows;$r++) {
                      $row = mysqli_fetch_assoc($result);
                      $rows[] = $row;
                 }
            }
        }

        return $rows; 
    }

  

    /*
    * Get User By ID
    */
    public function get_by_id($user_id){

        global $connection;  

        $sql = "SELECT first_name, last_name, email, phone, role, address, emailsign, team, registered FROM users WHERE id='$user_id'"; 
        
        $result = mysqli_query($connection, $sql); 
        
        if($result) {
            $row = mysqli_fetch_assoc($result);
        }

        return $row; 

    }
    
        /*
    * Get User By ID
    */
    public function get_by_email($email){ 

        global $connection; 

        $sql = "SELECT * FROM users WHERE email='$email'";  
        $result = mysqli_query($connection, $sql); 

        if($result) {
            $row = mysqli_fetch_assoc($result);
        }

        return $row; 

    }  
    
    /*
    * Get User Name
    */
    public function get_name($user_id){

        global $connection;  

        $sql = "SELECT first_name, last_name FROM users WHERE id='$user_id'"; 
        
        $result = mysqli_query($connection, $sql); 
        
        if($result) {
            $row = mysqli_fetch_assoc($result); 
            $name = $row['first_name'].' '.$row['last_name']; 
        }

        return $name; 
    }
 
    
    /*
     * Delete User 
     */
    public function delete($user_id) {
        global $connection; 
        $output = 0; 
        if($user_id) {
            $sql = "DELETE FROM users WHERE id='$user_id'";       
            $result = mysqli_query($connection, $sql);

            if($result) {
                $output = $result;  
            } 
        } 

        return $output;

    }      
    
    
    /*
     * Delete All User 
     */
    public function delete_all() {
        global $connection; 

    //        $sql = "DELETE FROM users";       
            $sql = "DELETE FROM users WHERE role NOT IN ( 'Administrator' )";         
            $result = mysqli_query($connection, $sql);

            if($result) {
                $output = $result;  
            } 

        return $output;

    }
    

    /*
     * Update User  
     */
    public function update($post) { 
        global $connection; 

        $user_id = $post['user_id'];  

        $first_name = ucwords(trim($post['first_name']));  
        $last_name = trim($post['last_name']); 
        $email = trim($post['email']); 
        $phone = trim($post['contact_number']);  
        $role = trim($post['user_role']);   
        $address = trim($post['user_address']);   
        $emailsign = trim($post['user_email_sign']);
        $s_team_leader = trim($post['s_team_leader']);    
        $r_team_leader = trim($post['r_team_leader']);    
 
        // Update User Profile 
        $sql = "UPDATE users
                SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', role='$role' , address='$address' , emailsign='$emailsign'  
                WHERE id='$user_id'"; 
 
        $result = mysqli_query($connection, $sql); 

        // It return 1 or 0;     
        if($result) {  
            echo "<div class='alert alert-success'>User Profile Updated.</div>"; 
            
                // Inserting Teams for team leads
                if(($role=='lead_sales_manager') || ($role=='lead_staff')) { 

                    if($role=='lead_sales_manager') {
                        $team_type = 'Sales';
                    }

                    if($role=='lead_staff') {
                        $team_type = 'Recruiting';
                    }   

                    $team_name = $first_name." ".$last_name; 
                    $team = new Teams();  
                    $team->insert($team_name, $user_id, $team_type);  

                } else {   
                    if($s_team_leader!='') { 
                        $this->set_members_team_id($user_id, $s_team_leader);    
                    }  
                    if($r_team_leader!='') { 
                        $this->set_members_team_id($user_id, $r_team_leader);   
                    }  
                } 
            
        } else { 
            echo "<div class='alert alert-danger'>User Profile not updated. Please try again.</div>"; 
        } 

    }

    /*
     * Function Register New User
     */ 
    public function insert($post) { 

        global $connection;  

        $first_name     = ucwords(trim($post['first_name']));  
        $last_name      = ucwords(trim($post['last_name']));  
        $contact        = trim($post['contact_number']);  
        $address        = trim($post['address']); 
        $country        = trim($post['country']); 
        $state          = trim($post['state']); 
        $city           = trim($post['city']); 
        $email          = trim($post['email']); 
        $zip_code       = trim($post['zip_code']); 
        $phone          = trim($post['phone']); 
        $pan            = trim($post['pan']); 
        $email          = trim($post['email']);   
        $role           = 'agent';   
        $npassword      = trim($post['password']);    
    
        // Check if all required value given
        if(($first_name!='') && ($last_name!='') && ($email!='') && ($role!='') && ($npassword!='')) {

            // Check Duplicate Entry 
            $sql = "SELECT id FROM users WHERE email='$email'";  
            $result = mysqli_query($connection, $sql);
            if($result) {
            $num_rows = mysqli_num_rows($result);
            if($num_rows==0) {  

                    // Generate Activation Key
                     $activation_key = md5($email);     

                    // Password 
                    $en_password = md5($npassword);   

                    $sql2 = "INSERT INTO users  
                            (`id`, `first_name`, `last_name`, `email`, `phone`, `gender`, `country`, `state`, `city`, `address`, `zip_code`, `pan_number`, `role`, `designation`, `password`, `activation_key`, `status`, `registered`)
                            VALUES 
                            (NULL, '$first_name', '$last_name', '$email', '$phone', '', '$country', '$state', '$city', '$address', '$zip_code', '$pan', '$role', '', '$en_password', '', '1', '0', CURRENT_TIMESTAMP)";

                    $result2 = mysqli_query($connection, $sql2);
                    $user_id = mysqli_insert_id($connection);
                    if($result2){  
                        
                        echo "<div class='alert alert-success'>New user account created.</div>";
                        
                        $this->account_created_mail($first_name, $email, $npassword);     
                        
                        // Inserting Teams for team leads
                        if(($role=='lead_sales_manager') || ($role=='lead_staff')) { 
                            
                            if($role=='lead_sales_manager') {
                                $team_type = 'Sales';
                            }

                            if($role=='lead_staff') {
                                $team_type = 'Recruiting';
                            }   
                            
                            $team_name = $first_name." ".$last_name; 
                            $team = new Teams();  
                            $team->insert($team_name, $user_id, $team_type);  
                            
                        } else {   
                            if($s_team_leader!='') { 
                                $this->set_members_team_id($user_id, $s_team_leader);    
                            }  
                            if($r_team_leader!='') { 
                                $this->set_members_team_id($user_id, $r_team_leader);   
                            }  
                        }       
                        
                    } else {
                        echo "<div class='alert alert-danger'> Sorry, There is some error. Please try again. <a href='add-user.php'>Register Again</a></div>"; 
                    }

            }  else { 
                echo "<div class='alert alert-warning'>User already exists with given email id. </div>" ;   
            }   
            } else { 
                echo "<div class='alert alert-warning'>User already exists with given email id. </div>" ;   
            }   

        } 

    } 
    
    /*
    * Check User and Access
    */ 
    public function check_access() {   
        $access = 0;

        $login = $this->check_login(); 
        if($login) {  
            if(array_key_exists($_SESSION['user_role'], $this->get_roles())) {    
               $access = 1;   
            }
        }  
        return $access;  
    } 


    /*
     * Check User Login
     */ 
    public function check_login() {  
        $access = 0;
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) { 
            $access = 1;
        }
        return $access;  
    }
 
    
    /*
     * Sign Out 
     */
    public function signout() {

        // Delete Session Variables 
        unset($_SESSION['user_id']);
        unset($_SESSION['user_role']); 

        // Session Destroy
        session_destroy();    

        // Redirect to Login Page
        $loginurl = site_url();    
        header("Location:$loginurl"); 

    } 
    
    /*
     * Set User Activation Key
     */
    public function set_activation_key($user_id, $key) {

        global $connection; 

        $sql = "UPDATE users
                SET activation_key='$key' 
                WHERE id='$user_id'";  

        $result = mysqli_query($connection, $sql);
        
        if($result) {
            return 1;
        } else {
            return 0;
        }
        
    }
    
 
   
    /*
     * Set User Activation Key
     */
    public function set_password($key, $password) {

        global $connection; 

        $newpassword = md5($password);
        
        $sql = "SELECT id FROM users WHERE activation_key='$key'";   
        $result = mysqli_query($connection, $sql);
        if($result) { 
            $num_rows = mysqli_num_rows($result);
            if($num_rows>0) {
                
                $udata = mysqli_fetch_assoc($result); 
                $user_id = $udata['id'];  
                
                $sql = "UPDATE users
                        SET password='$newpassword', activation_key = ''    
                        WHERE id='$user_id'";     

                $result = mysqli_query($connection, $sql); 

                return 1;
                
            } else {
                    return 0;
            }
        }
    }
    
    /*
     * Reset Password Mail
     */
    public function account_created_mail($firstname, $to, $password) { 
        
        $from = ADMINEMAIL;    
        $fromName = 'Holistic Partners';
        $subject = 'Your account has been created.'; 

        $siteurl = site_url(); 
    
        $htmlContent = '<!DOCTYPE html><html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Holistic Partners</title></head>
        <body style="background-color: #ffffff;"><div style="background:#eeeeee; box-sizing:border-box;font-family:arial; height:auto; width:100%; margin:0 auto; max-width:700px; padding:20px 40px;"><h2 style="text-align: center; border-bottom: 10px solid #30c0d3; padding: 0 20px 20px 0;">Holistic Partners</h2><br /> 
        Hello '.$firstname.', <br /><br />     
        <table>
        <tr><td>Your account has been created.</td></tr>
        <tr><td>Use following email and password to login your account.</td></tr>
        <tr><td>Email:</td><td>'.$to.'</td></tr> 
        <tr><td>Password:</td><td>'.$password.'</td></tr> 
        </table>
        <p><br />--<br /><b>Regards,</b><br /><b>Team Holistic Partners</b><br /><a href="'.$siteurl.'">'.$siteurl.'</a></p>  
        </div>
        </body></html>'; 

        $mail = send_mail($to, $from, $fromName, $subject ,$htmlContent, '', '');   

        if($mail) {  
            return 1; 
        } else {
            return 0; 
        } 
        
    }
    /*
     * Reset Password Mail
     */
    public function reset_password_mail($post) {
        
        global $connection;   

        $email = trim($post['user_email']); 

        if($email!='') {  
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                
                $sql = "SELECT id, first_name, email FROM users WHERE email='$email'";  
                $result = mysqli_query($connection, $sql);
                if($result) { 
                    
                    $num_rows = mysqli_num_rows($result);
                    
                    if($num_rows>0) { 
                        
                            $udata = mysqli_fetch_assoc($result); 
                           
                                $uid = $udata['id'];
                                $to = $udata['email'];
                                $firstname = $udata['first_name'];
                                $from = ADMINEMAIL;       
                                $fromName = 'Holistic Partners';
                                $subject = 'Reset Password Link.'; 
                                
                                $activation_key = substr(md5(time()),0,8); 
                                $siteurl = site_url(); 
                                $this->set_activation_key($uid, $activation_key); 
                                $reset_password_link = $siteurl.'/reset-password.php?reset_key='.$activation_key;   
                                
                                $htmlContent = '<!DOCTYPE html><html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Holistic Partners</title></head>
                                <body style="background-color: #ffffff;"><div style="background:#eeeeee; box-sizing:border-box;font-family:arial; height:auto; width:100%; margin:0 auto; max-width:700px; padding:20px 40px;"><h2 style="text-align: center; border-bottom: 10px solid #30c0d3; padding: 0 20px 20px 0;">Holistic Partners</h2><br /> 
                                Hello '.$firstname.', <br /><br />     
                                <table>
                                <tr><td>Please click on following link to change password of your account. </td></tr>
                                <tr><td><a href="'.$reset_password_link.'">Reset Account Password</a></td></tr>
                                <tr><td>Ignore this mail you did not sent any change password request.</td></tr>
                                </table>
                                <p><br />--<br /><b>Regards,</b><br /><b>Team Holistic Partners</b><br /><a href="'.$siteurl.'">'.$siteurl.'</a></p>  
                                </div>
                                </body></html>';  
                            
                                $mail = send_mail($to, $from, $fromName, $subject ,$htmlContent, $file = '');  
                               
                                if($mail) {   
                                    return 1; 
                                } else {
                                    return 2; 
                                } 
                    } else {
                        return 0; 
                    }
                }    
            }  
        }
    }
        
} 
$user = new Users();  
