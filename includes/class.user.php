<?php
class User {
    public $db;    
     /* Construct Function */
    public function __construct() {
        //$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $this->db = new mysqli('localhost', 'root', '', 'capstone');
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }
    
    /*** User Logout ***/
    public function user_logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

     /*** login process ***/
    public function check_login($email, $password, $hospital) {
        $hospitalname = '';
        if($hospital != 0){
            $hospitalname = $this->getHospitalName($hospital);
        }

        $password = md5($password);
        $sql = "SELECT * from users WHERE email='$email' and password='$password' and hospital='$hospitalname'";
        //checking if the username is available in the table
        $result = mysqli_query($this->db, $sql);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;
        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['users_id']; 
            $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
            header("location:login.php");
            return true;
        } else {
            return false;
        }
    } 
    
    /*** login process ***/
    /* public function check_login($username, $password) {
        //$password = md5($password);
        $sql = "SELECT patient_id,userName,password from patient WHERE userName='$username' and password='$password'";
        //checking if the username is available in the table
        $result = mysqli_query($this->db, $sql);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;
        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['patient_id'];          
            $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 30 minutes from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
            header("location:login.php");
            return true;
        } else {
            return false;
        }
    } */
    
     /*** Register User ***/
    public function reg_user() {
        $amNY = new DateTime('America/New_York');
        $added_time = $amNY->format('Y-m-d H:i:s');                        
        $ip = $_SERVER['REMOTE_ADDR'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];        
        $emergency_contact = $_POST['emergency_contact'];
        $home_phone = $_POST['home_phone'];
        $work_phone = $_POST['work_phone'];
        $blood_group = $_POST['blood_group'];
        $race = $_POST['race'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $marital_status = $_POST['marital_status'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $zipcode = $_POST['zipcode'];
        $insurance = $_POST['insurance'];
        $past_history = $_POST['past_history'];
        $allergies = $_POST['allergies'];
        $smoker_drinker = $_POST['smoker_drinker'];
    
        if (isset($_FILES['support_images']['name'])) {
            $file_name_all = "";

            for ($i = 0; $i < count($_FILES['support_images']['name']); $i++) {
                $tmpFilePath = $_FILES['support_images']['tmp_name'][$i];
                if ($tmpFilePath != "") {
                    $path = "../images/userimages/";
                    $name = $_FILES['support_images']['name'][$i];
                    $size = $_FILES['support_images']['size'][$i];
                    list($txt, $ext) = explode(".", $name);
                    $file = time() . substr(str_replace(" ", "_", $txt), 0);
                    $info = pathinfo($file);
                    $filename = $file . "." . $ext;
                    if (move_uploaded_file($_FILES['support_images']['tmp_name'][$i], $path . $filename)) {
                        date_default_timezone_set("Canada/Central");
                        $currentdate = date("d M Y");
                        $file_name_all .= $filename . "*";
                    }
                }
            }
            $filepath = rtrim($file_name_all, '*'); //imagepath if it is present
            //echo $filepath;
        } else {
            $filepath = "";
        }
        $sql = "SELECT * FROM patient WHERE userName='$username' OR email='$email'";
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;
        
        //if the username is not in db then insert to the table
        if ($count_row == 0) {
            $sql = "INSERT INTO patient SET
                    userName='$username',
                    password='$password',
                    firstname='$firstname',
                    lastname='$lastname',
                    email='$email',
                    emergency_contact ='$emergency_contact',
                    home_phone='$home_phone',                        
                    work_phone='$work_phone',
                    blood_group='$blood_group',
                    race = '$race',
                    gender = '$gender',   
                    dob = '$dob',
                    marital_status ='$marital_status',
                    address1 ='$address1',
                    address2 ='$address2',
                    city ='$city',
                    state = '$state',
                    country ='$country',
                    zipcode ='$zipcode',
                    insurance ='$insurance',
                    past_history = '$past_history',
                    allergies = '$allergies',
                    smoker_drinker ='$smoker_drinker',                            
                    image = '" . addslashes('../images/userimages/' . $filepath) . "',                  
                    active = '1',
                    ip = '$ip',
                    added_time = '$added_time'";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;
        } else {
            return false;
        }
    }
    
    /*** Register User ***/
    public function signup() {        
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];   
        $password = $_POST['password'];
        $password = md5($password);  
        $hospital = $this->getHospitalName($_POST['signuphospital']);  

        $sql = "SELECT * FROM users WHERE fullname='$fullname' OR email='$email'";
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;
        
        //if the username is not in db then insert to the table
        if ($count_row == 0) {
            $sql = "INSERT INTO users SET
                    fullname='$fullname',
                    password='$password',                    
                    email='$email',                               
                    active = '1',
                    hospital = '$hospital'";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;
        } else {
            return false;
        }
    }
    
    /*** Add Patients ***/
    public function addPatient() {
        $patientno = mt_rand(100000000, 999999999);
        $amNY = new DateTime('America/New_York');
        $added_time = $amNY->format('Y-m-d H:i:s');                        
        $ip = $_SERVER['REMOTE_ADDR'];        
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $emergency_name = $_POST['emergencyname'];
        $emergency_number = $_POST['emergencynumber'];
        $emergency_relation = $_POST['emergencyrelation'];
        $blood_group = $_POST['bloodgroup'];
        $race = $_POST['race'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $marital_status = $_POST['maritalstatus'];
        $address = $_POST['address'];
        $home_phone = $_POST['homephone'];
        $work_phone = $_POST['workphone'];        
        $email = $_POST['email'];        
        $insurance_provider = $_POST['insuranceprovider'];
        $insurance_type = $_POST['insurancetype'];
        $insurance_cardno = $_POST['insurancecardno'];
        $insurance_phone = $_POST['insurancephone'];
        
        $sql = "INSERT INTO patients SET    
                    patientno='$patientno',                
                    firstName='$firstname',
                    middleName = '$middlename',    
                    lastName='$lastname',
                    emergencyName='$emergency_name',
                    emergencyPhone='$emergency_number',
                    emergencyRelation='$emergency_relation',
                    blood_group='$blood_group',
                    race = '$race',
                    gender = '$gender',   
                    dob = '$dob',
                    marital_status ='$marital_status',
                    address ='$address',
                    home_phone='$home_phone',                        
                    work_phone='$work_phone',            
                    email='$email',                    
                    insuranceProvider ='$insurance_provider',
                    insuranceType ='$insurance_type',
                    insuranceCardNo='$insurance_cardno',
                    insurancePhone='$insurance_phone',                   
                    ip = '$ip',
                    added_time = '$added_time'";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;       
    }
    
    // public function get_patient($id) {
    //     $sql = "SELECT * FROM patient WHERE patient_id='$id'";
    //     $result = mysqli_query($this->db, $sql);
    //     $rows = mysqli_fetch_assoc($result);
        
    //     $id = $rows['patient_id'];
    //     $userName = $rows ['userName'];
    //     $firstName = $rows['firstName'];
    //     $lastName = $rows['lastName'];
    //     $email = $rows['email'];
    //     $emergency_contact = $rows['emergency_contact'];
    //     $home_phone = $rows['home_phone'];
    //     $work_phone = $rows['work_phone'];
    //     $blood_group = $rows['blood_group'];
    //     $race = $rows['race'];
    //     $gender = $rows['gender'];
    //     $dob = $rows['dob'];
    //     $marital_status = $rows['marital_status'];
    //     $address1 = $rows['address1'];
    //     $address2 = $rows['address2'];
    //     $city = $rows['city'];
    //     $state = $rows['state'];
    //     $country = $rows['country'];
    //     $zipcode = $rows['zipcode'];
    //     $insurance = $rows['insurance'];
    //     $past_history = $rows['past_history'];
    //     $allergies = $rows['allergies'];
    //     $smoker_drinker = $rows['smoker_drinker'];
    //     $image = $rows['image'];

    //     $arr = array('patient_id'=> $id , 'userName' => $userName, 'firstName' => $firstName, 'lastName' => $lastName, 'email' => $email,
    //         'emergency_contact' => $emergency_contact, 'home_phone' => $home_phone, 'work_phone' => $work_phone,
    //         'blood_group' => $blood_group, 'race' => $race, 'gender' => $gender, 'dob' => $dob, 'marital_status' => $marital_status,
    //         'address1' => $address1, 'address2' => $address2, 'city' => $city, 'state' => $state, 'country' => $country
    //         , 'zipcode' => $zipcode, 'insurance' => $insurance, 'past_history' => $past_history,
    //         'allergies' => $allergies, 'smoker_drinker' => $smoker_drinker, 'image' => $image);
    //     return $arr;
    // }


    public function get_patient($id) {        
        $sql = "SELECT * FROM patients WHERE patient_id='$id'";
        $result = mysqli_query($this->db, $sql);
        $rows = mysqli_fetch_assoc($result);
        
        $id = $rows['patient_id'];   
        $patientno = $rows['patientno'];     
        $firstName = $rows['firstName'];
        $middleName = $rows['middleName'];
        $lastName = $rows['lastName'];
        $emergencyName =$rows['emergencyName'];
        $emergencyPhone =$rows['emergencyPhone'];
        $emergencyRelation =$rows['emergencyRelation'];
        $blood_group = $rows['blood_group'];
        $race = $rows['race'];
        $gender = $rows['gender'];
        $dob = $rows['dob'];
        $marital_status = $rows['marital_status'];
        $address = $rows['address'];
        $home_phone = $rows['home_phone'];
        $work_phone = $rows['work_phone'];        
        $email = $rows['email'];
        $insuranceProvider =$rows['insuranceProvider'];
        $insuranceType = $rows['insuranceType'];
        $insuranceCardNo =$rows['insuranceCardNo'];
        $insurancePhone =$rows['insurancePhone'];    

        $arr = array('patient_id'=> $id , 'patientno'=> $patientno , 'firstName' => $firstName, 'middleName' => $middleName, 'lastName' => $lastName, 
            'emergencyName' => $emergencyName, 'emergencyPhone' => $emergencyPhone, 'emergencyRelation' => $emergencyRelation,
            'blood_group' => $blood_group, 'race' => $race, 'gender' => $gender, 'dob' => $dob, 'marital_status' => $marital_status,
            'address' => $address, 'home_phone' => $home_phone, 'work_phone' => $work_phone, 'email' => $email,
             'insuranceProvider' => $insuranceProvider, 'insuranceType' => $insuranceType, 'insuranceCardNo' => $insuranceCardNo, 'insurancePhone' => $insurancePhone);
        return $arr;
    }

    public function updatePatient($id){                                           
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $emergency_name = $_POST['emergencyname'];
        $emergency_number = $_POST['emergencynumber'];
        $emergency_relation = $_POST['emergencyrelation'];
        $blood_group = $_POST['bloodgroup'];
        $race = $_POST['race'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $marital_status = $_POST['maritalstatus'];
        $address = $_POST['address'];
        $home_phone = $_POST['homephone'];
        $work_phone = $_POST['workphone'];        
        $email = $_POST['email'];        
        $insurance_provider = $_POST['insuranceprovider'];
        $insurance_type = $_POST['insurancetype'];
        $insurance_cardno = $_POST['insurancecardno'];
        $insurance_phone = $_POST['insurancephone'];
        
        $sql = "UPDATE patients SET                    
                    firstName='$firstname',
                    middleName = '$middlename',    
                    lastName='$lastname',
                    emergencyName='$emergency_name',
                    emergencyPhone='$emergency_number',
                    emergencyRelation='$emergency_relation',
                    blood_group='$blood_group',
                    race = '$race',
                    gender = '$gender',   
                    dob = '$dob',
                    marital_status ='$marital_status',
                    address ='$address',
                    home_phone='$home_phone',                        
                    work_phone='$work_phone',            
                    email='$email',                    
                    insuranceProvider ='$insurance_provider',
                    insuranceType ='$insurance_type',
                    insuranceCardNo='$insurance_cardno',
                    insurancePhone='$insurance_phone' WHERE patient_id = '$id'  ";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;       
    }

    /* 5/7/2016 by me*/
     public function delpatiente($id) {        
        $sql = "DELETE FROM visit_reason where patient_id = '$id'";
        $sql = "DELETE FROM visit_details where patient_id = '$id'";
        $sql = "DELETE FROM medication_details where patient_id = '$id'"; 
        $sql = "DELETE FROM patients where patient_id = '$id'";       
        echo $sql;
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot deleted");
        return $result;
    }
    
    /* 5/7/2016 by me*/
    public function get_visitreason($id) {        
        $sql = "SELECT * FROM visit_reason WHERE visit_reason_id='$id'";
        $result = mysqli_query($this->db, $sql);
        $rows = mysqli_fetch_assoc($result);
        
        $id = $rows['visit_reason_id'];
        $hospital_id = $rows['hospital_id'];
        $reason = $rows['reason'];
        $symptoms = $rows['symptoms'];
        $conditions = $rows['conditions'];
        $visittype = $rows['visittype'];
        $precautions_taken_prior_to_visit = $rows['precautions_taken_prior_to_visit'];
        $visiting_doctor = $rows['visiting_doctor'];
       
        $arr = array('visit_reason_id'=> $id , 'hospital_id'=> $hospital_id , 'reason' => $reason, 'symptoms' => $symptoms, 'conditions' => $conditions, 'visittype' => $visittype,
            'precautions_taken_prior_to_visit' => $precautions_taken_prior_to_visit, 'visiting_doctor' => $visiting_doctor);
        return $arr;
    }

    public function get_medication_details($id) {        
        $sql = "SELECT * FROM medication_details WHERE med_det_id='$id'";
        $result = mysqli_query($this->db, $sql);
        $rows = mysqli_fetch_assoc($result);
        
        $med_det_id = $rows['med_det_id'];
        $patient_id = $rows['patient_id'];
        $medicines = $rows['medicines'];
        $quantity = $rows['quantity'];
        $direction = $rows['direction'];
        $current = $rows['current'];
       
        $arr = array('med_det_id'=> $med_det_id , 'patient_id' => $patient_id, 'medicines' => $medicines, 'quantity' => $quantity, 'direction' => $direction,
            'current' => $current);
        return $arr;
    }
    
    /*** Add updateVisitReason ***/
    /* 5/7/2016 by me*/
    public function updateVisitReason($id){ 
        $reason = $_POST['reason'];
        $symptoms = $_POST['symptoms'];
        $conditions = $_POST['condition'];
        $visittype = $_POST['visittype'];
        $precautions_taken_prior_to_visit = $_POST['precautions_taken_prior_to_visit'];
        $visiting_doctor = $this->getDoctorName($_POST['visiting_doctor']);
        
        $sql = "UPDATE visit_reason SET                    
                    reason='$reason',
                    symptoms = '$symptoms',    
                    conditions='$conditions',
                    visittype='$visittype',
                    precautions_taken_prior_to_visit='$precautions_taken_prior_to_visit',
                    visiting_doctor='$visiting_doctor' WHERE visit_reason_id = '$id'";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;       
    }

    public function updateMedicationDetails($id){ 
        $medicine = $_POST['medicine'];        
        $quantity = $_POST['quantity'];
        $direction = $_POST['direction'];
        
        $sql = "UPDATE medication_details SET                    
                    medicines='$medicine',
                    quantity = '$quantity',    
                    direction='$direction' WHERE med_det_id = '$id'";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;       
    }
    
     /*** Delete delVisitReason ***/
    /* 5/7/2016 by me*/
    public function delVisitReason($id) {
        $sql = "DELETE FROM visit_reason where visit_reason_id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot deleted");
        return $result;
    }

    public function delMedication($id) {
        $sql = "UPDATE medication_details SET current='0' where med_det_id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot deleted");
        return $result;
    }

    public function delmedicaltest($id) {
        $sql = "UPDATE testsreports SET recent='0' where id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot deleted");
        return $result;
    }

    public function delmedicaltestAllTime($id) {
        $sql = "DELETE FROM testsreports where id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot deleted");
        return $result;
    }

    public function deldoctor($id) {
        $sql = "DELETE FROM doctors where doctor_id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot deleted");
        return $result;
    }

    public function delMedicationAllTime($id) {
        $sql = "DELETE FROM medication_details where med_det_id = '$id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot deleted");
        return $result;
    }
    


    public function getDoctorName($id){
        $sql = "SELECT * FROM doctors WHERE doctor_id='$id'";
        $result = mysqli_query($this->db, $sql);
        $rows = mysqli_fetch_assoc($result);

        $firstname = $rows['firstName'];
        $lastname = $rows['lastName'];
        $doctorname = "Dr. ". $firstname ." ". $lastname;
        return $doctorname;
    }

    public function getHospitalName($id){
        $sql = "SELECT * FROM hospitals WHERE hospital_id='$id'";
        $result = mysqli_query($this->db, $sql);
        $rows = mysqli_fetch_assoc($result);

        $hospitalname = $rows['hospital_name'];
        return $hospitalname;
    }

    public function getHospitalNamefromUsers($id){
        //$hospitalid = $this->getHospitalName($id);
        $sql = "SELECT * FROM users WHERE users_id='$id'";
        $result = mysqli_query($this->db, $sql);
        $rows = mysqli_fetch_assoc($result);

        $hospitalname = $rows['hospital'];
        return $hospitalname;
    }

    public function getHospitalIdfromHospitals($name){
        $sql = "SELECT * FROM hospitals WHERE hospital_name='$name'";
        $result = mysqli_query($this->db, $sql);
        $rows = mysqli_fetch_assoc($result);

        $hospitalid = $rows['hospital_id'];
        return $hospitalid;
    }

    
     public function visit_details($id) {
        $sql = "SELECT * FROM visit_details WHERE patient_id='$id'";
        $result = mysqli_query($this->db, $sql);
        $rows = mysqli_fetch_assoc($result);       
        
        $visit_details_id = $rows['visit_details_id'];
        $patient_id = $rows ['patient_id'];
        $doc_det_id = $rows['doc_det_id'];
        $date = $rows['date'];
        $hospital_name = $rows['hospital_name'];
        $hospital_address = $rows['hospital_address'];
        $doctor_name = $rows['doctor_name'];
        $visit_reason = $rows['visit_reason'];
        $added_by = $rows['added_by'];
        $last_added_by = $rows['last_added_by'];
        $added_time = $rows['added_time'];
        $updated_time = $rows['updated_time'];
        $updated_by_last_ip = $rows['updated_by_last_ip'];

        $arr = array('visit_details_id' => $visit_details_id, 'patient_id' => $patient_id,  'doc_det_id' => $doc_det_id , 'date' => $date, 
                'hospital_name' => $hospital_name, 'hospital_address' => $hospital_address, 'doctor_name' => $doctor_name,
                'visit_reason' => $visit_reason, 'added_by' => $added_by, 'last_added_by' => $last_added_by, 
                'added_time' => $added_time,'updated_time' => $updated_time, 'updated_by_last_ip' => $updated_by_last_ip);
        return $arr;
    }
    
    /*** Add Doctors ***/
    public function addDoctor() {
        $amNY = new DateTime('America/New_York');
        $added_time = $amNY->format('Y-m-d H:i:s');                        
        $ip = $_SERVER['REMOTE_ADDR'];        
        $firstname = $_POST['firstname'];        
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $medicalspeciality = $_POST['medicalspeciality'];      
        $hospital = $_POST['hospital']; 
        $type = $_POST['type'];  
                               
        $sql = "INSERT INTO doctors SET                    
                    firstName='$firstname',                        
                    lastName='$lastname',
                    phone='$phone',
                    email='$email',
                    address='$address',
                    city='$city',
                    state = '$state',
                    zipcode = '$zipcode',
                    medicalspeciality = '$medicalspeciality',   
                    hospital = '$hospital',
                    type ='$type',                                     
                    ip = '$ip',
                    added_time = '$added_time'";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;       
    }
    
    /*** Add Reason For Visit ***/
    /* 5/7/2016 by me*/
    public function addReasonForVisit() {
        $amNY = new DateTime('America/New_York');
        $added_time = $amNY->format('Y-m-d H:i:s');                        
        $ip = $_SERVER['REMOTE_ADDR'];
        $p_id = $_POST['p_id'];
        $reason = $_POST['reason'];        
        $symptoms = $_POST['symptoms'];
        $condition = $_POST['condition'];
        $visittype = $_POST['visittype'];      
        $precautions_taken_prior_to_visit = $_POST['precautions_taken_prior_to_visit'];
        $visiting_doctor = $this->getDoctorName($_POST['visiting_doctor']);
        $hospital_name = $this->getHospitalNamefromUsers($_SESSION['id']);       
        $hospital_id = $this->getHospitalIdfromHospitals($hospital_name);
                              
        //$doctorName = getDoctorName($visiting_doctor);
        $sql = "INSERT INTO  visit_reason SET
                    patient_id = '$p_id',
                    hospital_id = '$hospital_id',
                    reason='$reason',                        
                    symptoms='$symptoms',
                    conditions='$condition',
                    visittype='$visittype',
                    precautions_taken_prior_to_visit='$precautions_taken_prior_to_visit',
                    visiting_doctor='$visiting_doctor',                                           
                    ip = '$ip',
                    added_time = '$added_time'";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            $lastid = $this->db->insert_id;
            $this->insertLastVisitIdinPatients($lastid, $p_id);
            return $result;       
    }
    
    /*** Insert last visit id into patients table ***/
    public function insertLastVisitIdinPatients($lastid, $p_id){
        $sql = "UPDATE patients SET lastvisit_id = '$lastid' WHERE patient_id = '$p_id'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot updated");
    }

    public function getLastVisitIdfromPatients($p_id){
        $sql = "SELECT * FROM patients WHERE patient_id='$p_id'";
        $result = mysqli_query($this->db, $sql);
        $rows = mysqli_fetch_assoc($result);

        $lastid = $rows['lastvisit_id'];
        return $lastid;
    }

    /*** Add Tests ***/
    public function addTest(){
        $amNY = new DateTime('America/New_York');
        $date = $amNY->format('Y-m-d H:i:s'); 
        $p_id = $_POST['p_id'];
        $test = $_POST['test'];
        $visit = $this->getLastVisitIdfromPatients($p_id);
        $precautions = $_POST['precautions'];
        $consulting_doctor = $_POST['consulting_doctor'];

        $sql = "INSERT INTO  testsreports SET                    
                    test='$test',                        
                    datetime='$date',
                    visit_id='$visit',
                    precautions='$precautions',                                                            
                    doctor_id = '$consulting_doctor',
                    patient_id='$p_id',
                    recent='1'";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;
    }

    /*** Add Medication ***/
    /* 5/7/2016 by me*/
    public function addMedication() {
        $amNY = new DateTime('America/New_York');
        $added_time = $amNY->format('Y-m-d H:i:s');                        
        $ip = $_SERVER['REMOTE_ADDR'];   
        $p_id = $_POST['p_id'];
        $medicines = $_POST['medicine'];        
        $quantity = $_POST['quantity'];
        $direction = $_POST['ditections'];                     
                              
        $sql = "INSERT INTO  medication_details SET 
                    patient_id = '$p_id',
                    medicines='$medicines',                        
                    quantity='$quantity',
                    direction='$direction',                                                            
                    ip = '$ip',
                    current = '1',
                    added_time = '$added_time'";
            //echo $sql;
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
            return $result;       
    }

    public function getDoctorsList(){
        $sql = "SELECT * FROM doctors ORDER BY doctor_id ASC";
        $result = mysqli_query($this->db, $sql);
        //$rows = mysqli_fetch_assoc($result);       

        //$get=mysql_query("SELECT * FROM doctors ORDER BY doctor_id ASC");
        $option = '';
        while($row = mysqli_fetch_assoc($result))
        {
            $option .= '<option value = "'.$row['doctor_id'].'">Dr. '.$row['firstName'].' '.$row['lastName'].' - '.$row['medicalspeciality'].'</option>';
        }
        return $option;
                                        
    }
    
}