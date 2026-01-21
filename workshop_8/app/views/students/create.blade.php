@extends('layouts.master')

@section('content')
<form method="POST" action="index.php?page=store">
    <label>Name:</label><input type="text" name="name"><br>
    <label>Email:</label><input type="email" name="email"><br>
    <label>Course:</label><input type="text" name="course"><br>
    <button type="submit">Add Student</button>
</form>
@endsection