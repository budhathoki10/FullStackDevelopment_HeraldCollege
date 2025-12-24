<?php
function uploadPortfolioFile($file) {
    // print_r(file);
    try {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Upload error");
        }

        $allowed = ['pdf', 'jpg', 'png'];
        $maxSize = 2 * 1024 * 1024;

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            throw new Exception("Invalid file type");
        }

        if ($file['size'] > $maxSize) {
            throw new Exception("File too large");
        }

        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        $newName = "portfolio_" . time() . "." . $ext;
        $path = "uploads/" . $newName;

        move_uploaded_file($file['tmp_name'], $path);

        return $newName;

    } catch (Exception $e) {
        return false;
    }
}


$email= 'kushal@gmail.com';
function validateEmail($email) {
   return str_contains(strtolower($email),'@gmail.com');
}


function save_student($name,$email,$skills){
    if (!file_exists("student.txt")) {
            file_put_contents("student.txt", "[]");
        }

        $file = file_get_contents("student.txt");
        $users = json_decode($file, true);

        if (!is_array($users)) {
            $users = [];
        }



        $newdata = [
            "name" => $name,
            "email" => $email,
            "skills" => explode(",", $skills),
        ];

        $users[] = $newdata;

         file_put_contents("student.txt", json_encode($users, JSON_PRETTY_PRINT));
}

function clean_skills($std){
        echo "Skills <ul>";
    foreach ($std['skills'] as $st) {
        echo "<li>" . htmlspecialchars(trim($st)) . "</li>";
    }
    echo " </ul><br><hr>";
}


function formatname($std){
    echo "<h2>Name:" . htmlspecialchars($std["name"]) . "</h2>";
}
