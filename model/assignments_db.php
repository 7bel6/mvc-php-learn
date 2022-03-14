<?php
    // create a database connection with specific table
    
    function get_assignments_by_course($course_id){
        // use global keyword to access the database variable
        global $db;
        if($course_id){
            // check if the course_id is valid
            // create the db query
            $query = "SELECT A.ID, A.Description, C.courseName FROM assingments A LEFT JOIN courses C ON A.courseID = C.courseID WHERE A.courseID = :course_id ORDER BY A.ID";
            // the query call the fields as A and C and we tell Mysql which table is A and Which table is C , join them and call them based on courseID
        }
        else{
            // if the course_id is not valid, get all the assignments
            $query = "SELECT A.ID, A.Description, C.courseName FROM assingments A LEFT JOIN courses C ON A.courseID = C.courseID ORDER BY C.courseID";
        }
        // prepare the query
        $statement = $db->prepare($query);
        // bind the course_id to the query
        $statement->bindValue(':course_id', $course_id);
        // execute the query
        $statement->execute();
        // return the result
        $assignments = $statement->fetchAll();
        $statement->closeCursor();
        return $assignments;
    }
?>