<?php 
    require_once(__DIR__  . "../../../../Src/Controller/Companies/Company.class.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $company = new Company("", $id);

        if (isset($_POST['name_company'])) {
            $name_company = $_POST['name_company'];
            $error = $company->setName($name_company, true);
            if ($error == false) {
                header("Location: ../../../system_admin.php?error=company_already_exists");
                return false;
            }
        }

        if (isset($_POST['auto_company'])) {
            $auto_company = $_POST['auto_company'];
            if ($auto_company == "0") {
                $auto_company = 0;
            } else if ($auto_company == "1") {
                $auto_company = 1;
            } else {
                header("Location: ../../../system_admin.php?error=auto_company_not_valid");
                return false;
            }
            $company->setAuto($auto_company, true);
        }

        if (isset($_FILES['logo_company'])) {
            echo "image";
            // generate a random string of length 10
            $name_logo = bin2hex(random_bytes(10));

            $target_dir = __DIR__  . "../../../../Src/assets/img/companies/";
            $target_file = $target_dir . basename($_FILES["logo_company"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["logo_company"]["tmp_name"]);

            if ($check[0] != 96 && $check[1] != 96) {
                header("Location: ../../../system_admin.php?error=logo_too_big");
                return;
            }
            
            if ($check !== false) {
                if (file_exists($target_file)) {
                    header("Location: ../../../system_admin.php?error=logo_already_exists");
                    $uploadOk = 0;
                } else {
                    if ($_FILES["logo_company"]["size"] > 500000) {
                        header("Location: ../../../system_admin.php?error=logo_too_large");
                        $uploadOk = 0;
                    } else {
                        if ($imageFileType != "png") {
                            header("Location: ../../../system_admin.php?error=logo_not_allowed");
                            $uploadOk = 0;
                        } else {
                            if (move_uploaded_file($_FILES["logo_company"]["tmp_name"], $target_file)) {
                                rename($target_file, $target_dir . $name_logo . "." . $imageFileType);
                                $uploadOk = 1;
                            } else {
                                header("Location: ../../../system_admin.php?error=logo_upload_error");
                            }
                        }
                    }
                }
            } else {
                header("Location: ../../../system_admin.php?error=logo_not_image");
                $uploadOk = 0;
            }

            if ($uploadOk == 1) {
                echo $name_logo;
                $company->setImage($name_logo, true);
                header("Location: ../../../system_admin.php");
            }
        } else {
            echo "no image";
        }

        return true;
    }