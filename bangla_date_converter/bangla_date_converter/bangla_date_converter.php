<?php
/*
* Plugin Name: Bangla date Converter
* Plugin URI: https://isdbstudents.com/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Imran/ISDB-49
* Author URI: https://isdbstudents.com/
*/
$english = array ( 
    "0", "1", "2", "3", "4", "5", "6", "7","8", "9",
    "Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
    "Sat", "sun", "Mon", "Tue", "Red", "Thu", "Fri",
    "am", "pm", "st", "nd", "rd", "th",
    "January", "Februay", "March", "April", "May", "June", "July", "August", "September", "October", "November" , "December",
    "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep" , "Oct", "Nov", "Dec",
    "Edit", "EDIT", "Comment", "Comments", "Log out", "Logged in as");
    
    $bangla = array ( 
    "০", "১", "২", "৩", "৪", "৫", "৬", "৭","৮", "৯",
    "শনিবার", "রোববার", "সোমবার", "মঙ্গলবার", "বুধবার", "বৃহস্পতিবার", "শুক্রবার",
    "শনি", "রবি", "সোম", "মঙ্গল", "বুধ", "বৃহস্পতি", "শুক্র",
    "পূর্বাহ্ণ", "অপরাহ্ন", "প্রথম", "দ্বিতীয়", "তৃতীয়", "",
    "জানুয়ারি", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর" , "ডিসেম্বর",
    "জানু", "ফেব্রু", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলা", "আগ", "সেপ্টে", "অক্টো", "নভে" , "ডিসে",
    "সম্পাদন", "এডিট", "মন্তব্য", "মন্তব্য সমূহ", "লগ আউট", "লগ ইন আছেন");
function bangla_converter($data) {

    global $english,$bangla;
    
    $converted = str_replace($english,$bangla,$data);
    return $converted;
    }
	function english_converter($data) {

    global $english,$bangla;
    
    $converted = str_replace($bangla,$english,$data);
    return $converted;
    }
    
    // add_filter ("the_title", "english_converter");
    add_filter ("get_the_date", "bangla_converter"); 
    add_filter ("the_time", "bangla_converter");
    add_filter ("the_date", "bangla_converter"); 
    add_filter ("get_current_time", "bangla_converter");  
    add_filter ("current_time", "bangla_converter");  
    add_filter ("the_views", "bangla_converter");  
    add_filter ("get_the_views", "bangla_converter"); 
    add_filter ("page_number", "bangla_converter"); 
    add_filter ("get_page_number", "bangla_converter"); 
    add_filter ("comments_number", "bangla_converter");
    add_filter ("comments_number", "bangla_converter");
    add_filter ("gmdate", "bangla_converter");
    add_filter ("date_i18n", "bangla_converter");
    add_filter ("edit_post_link", "bangla_converter");
    
// ================    