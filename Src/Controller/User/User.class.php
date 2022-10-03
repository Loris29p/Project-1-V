<?php 
    // require_once("../SGBD/SGBD.class.php");
    require_once(__DIR__  . "../../../../Src/Controller/SGBD/SGBD.class.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    // require '../../../vendor/autoload.php';
    require __DIR__  . "../../../../vendor/autoload.php";

    session_start();

    class User {
        private $id;
        private $first_name;
        private $last_name;
        private $email;
        private $password;
        private $role;
        private $sgbd;

        public function __construct() {
            $this->sgbd = new SGBD("localhost", null, null, "projectv_system");
        }
        
        public function getAllUsers() {
            $query = "SELECT * FROM users";
            $result = $this->sgbd->getWithParameters($query);
            return $result;
        }

        public function getById($id) {
            $query = "SELECT * FROM users WHERE id = $id";
            $result = $this->sgbd->getWithParameters($query);
            return $result;
        }

        public function getByEmail($email) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->sgbd->getWithParameters($query);
            return $result;
        }

        public function Create($first_name, $last_name, $email, $password, $role) {
            $query = "INSERT INTO users (first_name, last_name, email, password, role) VALUES ('$first_name', '$last_name', '$email', '$password', '$role')";
            $this->sgbd->insert($query);
            $id = $this->sgbd->lastInsertId();
            // insert into verified_users the id of the user and a random token
            $token = md5(uniqid(rand(), true));
            $query2 = "INSERT INTO verified_users (user_id, token) VALUES ($id, '$token')";
            $this->sgbd->insert($query2);
            
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'localhost';                       //Set the SMTP server to send through
                $mail->Port = 1025;
                $mail->CharSet = 'UTF-8';
                $mail->addAddress("pcacerloris@gmail.com");
                $mail->setFrom("pcacerloris@gmail.com");
                $mail->Subject = "Confirmation de votre compte";
                $mail->Body = "Bonjour $first_name $last_name, merci de confirmer votre compte en cliquant sur le lien suivant : http://localhost:8888/ProjectV/Src/Controller/User/Verify.php?token=$token";
                $mail->send();
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            return $id;
        }

        public function Update($id, $first_name, $last_name, $email, $password, $role) {
            $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password', role = '$role' WHERE id = $id";
            $result = $this->sgbd->insert($query);
            return $result;
        }

        public function Delete($id) {
            $query = "DELETE FROM users WHERE id = $id";
            $result = $this->sgbd->insert($query);
            return $result;
        }

        public function AccountExists($email) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->sgbd->get($query);
            if (count($result) > 0) {
                return true;
            } else {
                return false;
            }
        }

        // Function permettant de verifier si le mot de passe est correct
        public function CheckPassword($email, $password) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->sgbd->get($query);
            if (count($result) > 0) {
                if (password_verify($password, $result[0]["password"])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function Register($first_name, $last_name, $email, $password, $role) {
            $this->Create($first_name, $last_name, $email, $password, $role);
        }

        public function Login($email, $password, $company_data) {
            $error = "";
            if ($this->CheckPassword($email, $password)) {
                $query = "SELECT * FROM users WHERE email = '$email' AND verified = 1";
                $result = $this->sgbd->getWithParameters($query);
                if (count($result) > 0) {
                    $this->setId($result[0]['id']);
                    $this->setFirstName($result[0]['first_name']);
                    $this->setLastName($result[0]['last_name']);
                    $this->setEmail($result[0]['email']);
                    $this->setPassword($result[0]['password']);
                    $this->setRole($result[0]['role']);

                    $_SESSION['id'] = $this->getId();
                    $_SESSION['first_name'] = $this->getFirstName();
                    $_SESSION['last_name'] = $this->getLastName();
                    $_SESSION['email'] = $this->getEmail();
                    $_SESSION['password'] = $this->getPassword();
                    $_SESSION['role'] = $this->getRole();

                    if ($company_data != null) {
                        $_SESSION['company_id'] = $company_data[0]['id'];
                        $_SESSION['company_name'] = $company_data[0]['name'];
                        $_SESSION['company_dtb_name'] = $company_data[0]['name_dtb'];
                        $_SESSION['company_data'] = $company_data;
                    }

                    // get role of the user in the company
                    $sgbd_users = new SGBD("localhost", null, null, "projectv_users_" . $_SESSION['company_dtb_name']);

                    $query = "SELECT *
                    FROM users
                    INNER JOIN "."projectv_acl_" . $_SESSION['company_dtb_name'].".users
                    ON `users`.`id` = `"."projectv_acl_" . $_SESSION['company_dtb_name'].".users`.`id_user`";
                    $result = $sgbd_users->getWithParameters($query);
                    $_SESSION['role_company'] = $result[0]['permission'];
                    return "success";
                } else {
                    $error = "account_not_verified";
                    return $error;
                }
            } else {
                $error = "wrongpassword";
                return $error;
            }
        }

        public function getId() {
            return $this->id;
        }
        public function getFirstName() {
            return $this->first_name;
        }
        public function getLastName() {
            return $this->last_name;
        }
        public function getFullName() {
            return $this->first_name . " " . $this->last_name;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getRole() {
            return $this->role;
        }

        public function setId($id) {
            $this->id = $id;
        }
        public function setFirstName($first_name) {
            $this->first_name = $first_name;
        }
        public function setLastName($last_name) {
            $this->last_name = $last_name;
        }  
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        public function setRole($role) {
            $this->role = $role;
        }

        public function Logout() {
            session_destroy();
        }

        public function getByToken($token) {
            $query = "SELECT * FROM verified_users WHERE token = '$token'";
            $result = $this->sgbd->getWithParameters($query);
            return $result;
        }

        public function verify($token) {
            $result = $this->getByToken($token);
            if (count($result) > 0) {
                $date = new DateTime($result[0]['created_at']);
                $now = new DateTime();
                $interval = $date->diff($now);
                if ($interval->format('%h') < 24) {
                    $user_id = $result[0]['user_id'];
                    $query = "UPDATE users SET verified = 1 WHERE id = $user_id";
                    $this->sgbd->insert($query);
                    $query2 = "DELETE FROM verified_users WHERE token = '$token'";
                    $this->sgbd->insert($query2);
                    return "account_verified";
                } else {
                    $query2 = "DELETE FROM verified_users WHERE token = '$token'";
                    $this->sgbd->insert($query2);
                    return "token_expired";
                }
            } else {
                return "invalid_token";
            }
        }

        public function verifyById($id) {
            $query = "UPDATE users SET verified = 1 WHERE id = $id";
            $this->sgbd->insert($query);
        }

        public function changeFirstName($id, $first_name) {
            $query = "UPDATE users SET first_name = '$first_name', modified_at = NOW() WHERE id = $id";
            $result = $this->sgbd->insert($query);
            $_SESSION['first_name'] = $first_name;
            return $result;
        }

        public function changeLastName($id, $last_name) {
            $query = "UPDATE users SET last_name = '$last_name', modified_at = NOW() WHERE id = $id";
            $result = $this->sgbd->insert($query);
            $_SESSION['last_name'] = $last_name;
            return $result;
        }

        public function changeEmail($id, $email) {
            $query = "UPDATE users SET email = '$email', modified_at = NOW() WHERE id = $id";
            $result = $this->sgbd->insert($query);
            $_SESSION['email'] = $email;
            return $result;
        }

        public function deleteUser($id) {
            $query = "DELETE FROM users WHERE id = $id";
            $result = $this->sgbd->insert($query);
            return $result;
        }
    }