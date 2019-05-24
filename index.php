<?php
function my_cron_schedules($schedules){
    if(!isset($schedules["1min"])){
        $schedules["1min"] = array(
            'interval' => 1*60,
            'display' => __('Once every minute'));
    }
    if(!isset($schedules["30min"])){
        $schedules["30min"] = array(
            'interval' => 30*60,
            'display' => __('Once every 30 minutes'));
    }
    return $schedules;
}
add_filter('cron_schedules','my_cron_schedules');

if (!wp_next_scheduled('my_task_hook')) {
	wp_schedule_event( time(), '1min', 'my_task_hook' );
}
add_action ( 'my_task_hook', 'my_task_function', 10, 0 );

function my_task_function() {
    
   mail('ik.aics@gmail.com', 'Subject', 'Message');
    
   echo 'I have been called to action. I will do the same next week';
}