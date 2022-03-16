<?php
    // the controller
    require_once('model/database.php');
    require_once('model/course_db.php');
    require_once('model/assignments_db.php');

    // get the action
    $assignments_id = filter_input(INPUT_POST, 'assignments_id', FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);
    $course_name = filter_input(INPUT_POST, 'course_name', FILTER_UNSAFE_RAW);
    $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
    if(!$course_id) {
        $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
    }

    $action = filter_input(INPUT_POST, 'course_name', FILTER_UNSAFE_RAW);

    if (!$action){
        $action = filter_input(INPUT_GET, 'course_name', FILTER_UNSAFE_RAW);
        if(!$action) {
            $action = 'list_assignments';
        }
    }
    
    switch($action){
        default:
            $course_name = get_course_name($course_id);
            $courses = get_courses();
            $assignments = get_assignments_by_course($course_id);
            include('view/assignments_list.php');
    }
?>