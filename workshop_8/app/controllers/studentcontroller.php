<?php
// app/controllers/StudentController.php
require_once __DIR__ . '/../models/Student.php';

class StudentController {
    protected $blade;

    public function __construct($blade) {
        $this->blade = $blade;
    }

    public function index() {
        $students = Student::all();
        echo $this->blade->render("students.index", ['students' => $students]);
    }

    public function create() {
        echo $this->blade->render("students.create");
    }

    public function store() {
        Student::create($_POST['name'], $_POST['email'], $_POST['course']);
        header("Location: index.php?page=index");
    }

    public function edit($id) {
        $student = Student::find($id);
        echo $this->blade->render("students.edit", ['student' => $student]);
    }

    public function update($id) {
        Student::update($id, $_POST['name'], $_POST['email'], $_POST['course']);
        header("Location: index.php?page=index");
    }

    public function delete($id) {
        Student::delete($id);
        header("Location: index.php?page=index");
    }
}
?>