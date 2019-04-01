<?php
/**
 * Users
 *
 * @author Shrikant Yadav
 */
class Reports { 

    /*
    * Function For Retrive All Users Information
    */
    public function get_candidates() {

        global $connection; 
        $rows = array();

        $sql = 'SELECT * FROM candidates';
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

        $sql = "SELECT name, email, phone, role FROM candidates WHERE id='$user_id'";  
        $result = mysqli_query($connection, $sql); 

        if($result) {
            $row = mysqli_fetch_assoc($result);
        }

        return $row; 

    }
    
    /*
     * Delete User 
     */
    public function delete($user_id) {
        global $connection; 
        $output = 0; 
        if($user_id) {
            $sql = "DELETE FROM candidates WHERE id='$user_id'";       
            $result = mysqli_query($connection, $sql);

            if($result) {
                $output = $result;  
            } 
        }  

        return $output;

    }    
     

    /*
     * Update User  
     */
    public function update($post) { 
        global $connection; 

        $user_id = $post['user_id'];  

        $name = ucwords(trim($post['full_name']));  
        $email = trim($post['user_email']); 
        $email = trim($post['user_email']); 
        $phone = trim($post['user_phone']);  
        $role = trim($post['user_role']);  

        // Update User Profile 
        $sql = "UPDATE candidates
                SET name='$name', email='$email', phone='$phone', role='$role' 
                WHERE id='$user_id'"; 

        $result = mysqli_query($connection, $sql);

        // It return 1 or 0;  
        if($result) {  
            echo "<div class='alert alert-success'>User Profile Updated. <a href='user-list.php'>View Users List</a></div>"; 
        } else { 
            echo "<div class='alert alert-danger'>User Profile not updated. Please try again.</div>"; 
        } 

    }

    /*
     * Function Insert Candidate
     */ 
    public function insert($post) { 

        global $connection;  

        $full_name = ucwords(trim($post['full_name']));  
        $skills = trim($post['skills']); 
        $visa = trim($post['visa']);  
        $location = trim($post['location']); 
        $contact_number = trim($post['contact_number']);
        $acontact_number = trim($post['acontact_number']);
        $email = trim($post['email']);
        $skype_id = trim($post['skype_id']);
        $availability_to_join = trim($post['availability_to_join']);
        $candidatetype = trim($post['candidatetype']);
        $addtolist = trim($post['addtolist']);
        $ssn = trim($post['ssn']);
        $linkedin_link = trim($post['linkedin_link']);

            // Check if all required value given  
            if(($full_name!='') && ($skills!='') && ($visa!='') && ($location!='') && ($contact_number!='')) {

                // Check Duplicate Entry 
                $sql = "SELECT id FROM candidates WHERE email='$email'";  
                $result = mysqli_query($connection, $sql);
                if($result) {
                $num_rows = mysqli_num_rows($result);
                if($num_rows==0) {    
                        $sql2 = "INSERT INTO candidates  
                                (`id`, `full_name`, `skills`, `specialized`, `experience`, `rexperience`, `education_details`, `rate`, `visa`, `location`, `relocation`, `contact_no`, `acontact_no`, `email`, `skype`, `availability_to_join`, `type`, `ssn`, `linkedin`, `resume`, `status`, `registered`)
                                VALUES 
                                (NULL, '$full_name', '$skills', '', '', '', '', '', '$visa', '$location', '', '$contact_number', '$acontact_number', '$email', '$skype_id', '$availability_to_join', '$candidatetype', '$ssn', '$linkedin_link', '', '', CURRENT_TIMESTAMP)";

                        $result2 = mysqli_query($connection, $sql2);
                        if ($result2){  
                            echo "<div class='alert alert-success'>1 user has been added.</div>";
                        } else {
                            echo "<div class='alert alert-danger'> Sorry, There is some error. Please try again. <a href='add-user.php'>Register Again</a></div>"; 
                        }

                } else { 

                }    

            } 

        } 
    }
        
}

$candidatesobj = new Candidates();  
