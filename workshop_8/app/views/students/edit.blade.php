@extends('layouts.master')

@section('content')
<form method="POST" action="index.php?page=update&id={{ $student['id'] }}">
    <label>Name:</label><input type="text" name="name" value="{{ $student['name'] }}"><br>
    <label>Email:</label><input type="email" name="email" value="{{ $student['email'] }}"><br>
    <label>Course:</label><input type="text" name="course" value="{{ $student['course'] }}"><br>
    <button type="submit">Update Student</button>
</form>
@endsection