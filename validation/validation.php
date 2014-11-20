<?php

/**
 * @author Femi
 * 2014-11-16 11:29PM
 */


class Validate {

    //defined constant, a regexp that checks againts student number
    const ID_REGULAREXPRESSION = "^n[0-9]{9}$";
    
    //defined constant, a regexp that  checks againts name
    const NAME_REGULAR_EXPRESSION = "/^[a-zA-Z ]+$/";
    
    
    const DESCRIPTION_DEFAULT_LENGTH = 10;
    
    const LOCATION_LENGTH = 4;

        

    //private property that olds validation message if need be
    private $validTextReport;
    
    
     public function __construct(){
         $this->validTextReport = array();
     }
    
    

    //getter that helps to reach the prvate property "$invalidTextReport"
    public function getValidText() {
        return $this->validTextReport;
    }
    
    

    //checks if an email is properly formed or empty
    public function validEmail($param) {
        //returns true of false if empty or not
        $status = self::isEmptyCheck($param);
        
        if (!$status) {
            $this->validTextReport['email'] = "Email is required";
            return FALSE;
        } else {
            if (!filter_var($param, FILTER_VALIDATE_EMAIL)) {
                $this->validTextReport['email'] = "Invalid email format";
                return FALSE;
            }  else {
                return TRUE;                
            }
        }
    }

    //checks if student number is properly formed or empty
    public function validIdNumber($param) {

        $status = self::isEmptyCheck($param);

        if (!$status) {
            $this->validTextReport['studentID'] = "Student ID is required";
            return FALSE;
        } else {
            
            
            if (!preg_match(self::ID_REGULAREXPRESSION, $param)) {
                $this->validTextReport['studentID'] = "Invalid student ID";
                return FALSE;
            }  else {
                return TRUE;
                
            }
        }
    }

    //checks if name is valid or empty
    public function isNameValid($param) {

        $status = self::isEmptyCheck($param);

        if (!$status) {
            $this->validTextReport['name'] = "Student name required";
            return FALSE;
        } else {
            
            $nameMatchStatus = preg_match(self::NAME_REGULAR_EXPRESSION, $param);
            
            if (!$nameMatchStatus) {
                $this->validTextReport['name'] = "Only alphabet and space required";
                return FALSE;
            }  else {
                return TRUE;
                
            }
        }
    }
    //checks item description is empty and lenght
    public function isDescriptionValid($param) {

       //calls a method checking if null or empty
        $status = self::isEmptyCheck($param);

        if (!$status) {
            $this->validTextReport['description'] = "Description is required";
            return FALSE;
        } else {
            
            $descriptionLength = strlen($param);
            
            //$descriptionMatchStatus = preg_match(self::DESCRIPTION_REGEXP, $param);
            
            if ($descriptionLength < self::DESCRIPTION_DEFAULT_LENGTH) {
                $this->validTextReport['description'] = "Description should be at least 10 characters";
                return FALSE;
            }  else {
                return TRUE;
                
            }
        }
    }
    
    public function  isLocationValid($param){
       $status = self::isEmptyCheck($param);
       
       if (!$status) {
            $this->validTextReport['location'] = "Location is required";
            return FALSE;
        } else {
            return TRUE;
        }
       
    }

    
    public static function isEmptyCheck($param) {
        if (empty($param) || $param == "") {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
