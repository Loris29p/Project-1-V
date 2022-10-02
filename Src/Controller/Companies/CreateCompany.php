<?php 
    require_once(__DIR__  . "../../../../Src/Controller/Companies/Company.class.php");
    // header("Location: ../../../system_admin.php#third_page");
    

    if (isset($_POST["name_company"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_FILES["logo_company"])) {
        $name_company = $_POST["name_company"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];

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
            $company = new Company($name_company, 0);
            $company->createCompany($name_company, 0, strtolower($name_company), $name_logo . "." . $imageFileType);
            $error = $company->createDtb($first_name, $last_name, $email);
            if ($error != true) {
                header("Location: ../../../system_admin.php?error=" . $error);
            } else {
                header("Location: ../../../system_admin.php#third_page");
            }
        }
    }