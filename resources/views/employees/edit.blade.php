<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Form</title>
</head>

<body>
    <h1>Create Employee</h1>
    <form action="{{ route('employee_update') }}">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name', @$first_name) }}">
        <label for="last_name">First Name</label>
        <input type="text" name="last_name" value="{{ old('last_name', @$last_name) }}">
        <label for="willing_to_work">willing_to_work</label>
        <select name="willing_to_work" id="">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <label for="Languages">Languages</label>
        <select name="Languages" id="">
            @foreach (@$lanaguages as $lang)
                <option value="">{{ $lang['language_name'] }}</option>
            @endforeach
        </select>
        <button type="submit"></button>
    </form>
</body>

</html>
