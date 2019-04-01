<?php
/**
 * Activities
 *
 * @author Shrikant Yadav
 */
class Activities { 

    /*
    * Function For Retrive All Activities
    */
    public function get_activities() {  

        global $connection;  
        $rows = array();

        $sql = 'SELECT * FROM activities ORDER BY id DESC Limit 0,10';
        $result = mysqli_query($connection, $sql); 

        if($result) {
            $num_rows = mysqli_num_rows($result);
            if($num_rows>0) {
                for($r=1; $r<=$num_rows; $r++) {
                    $row = mysqli_fetch_assoc($result);
                    $rows[] = $row;
                }
            }
        }
        return $rows; 
    }

    /*
    * Get Activity By ID
    */
    public function get_by_id($activity_id){

        global $connection; 
        $sql = "SELECT * FROM activities WHERE id='$activity_id'"; 
        $result = mysqli_query($connection, $sql); 
        if($result) {
            $row = mysqli_fetch_assoc($result);
        }
        return $row; 
    }
    
    /*
     * Delete Activity 
     */
    public function delete($activity_id) {
        global $connection; 
        $output = 0; 
        if($activity_id) {
            $sql = "DELETE FROM activities WHERE id='$activity_id'";       
            $result = mysqli_query($connection, $sql);
            if($result) {
                $output = $result;  
            } 
        } 
        return $output;
    }    
    
    /*
     * Update Activity  
     */
    public function update($post) { 
        global $connection; 

        $activity_id        = $post['activity_id'];  
        $activity_by        = trim($post['activity_by']); 
        $activity_details   = $post['activity_details'];  
      
        // Update Activity Profile 
        $sql = "UPDATE activities
                SET activity_by='$activity_by', activity_details='$activity_details' 
                WHERE id='$activity_id'";  

        $result = mysqli_query($connection, $sql);

        // It return 1 or 0;  
        if($result) {  
            echo "<div class='alert alert-success'>Activity Profile Updated. <a href='activity-list.php'>View Activities List</a></div>"; 
        } else { 
            echo "<div class='alert alert-danger'>Activity Profile not updated. Please try again.</div>"; 
        } 

    }

    /*
     * Function Register New Activity
     */ 
    public function insert($activity_by, $activity_details) { 

        global $connection;  

        $activity_by        = trim($activity_by); 
        $activity_details   = trim($activity_details);  

        // Check if all required value given
        if(($activity_by!='') && ($activity_details!='')) { 

            $sql2 = "INSERT INTO activities  
                    (`id`, `activity_by`, `activity_details`, `activity_status`, `registered`)
                    VALUES 
                    (NULL, '$activity_by', '$activity_details', '1' ,CURRENT_TIMESTAMP)";   

            $result2 = mysqli_query($connection, $sql2);
        }   

    }      
}

