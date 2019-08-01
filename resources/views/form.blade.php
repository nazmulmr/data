<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Registration Form</title>
</head>
<body>
<!-- Default form contact -->
<form class="text-center border border-light p-5" action="{{route('add-process')}}" method="post">
    @csrf

    <p class="h4 mb-4">Registration</p>

    <!-- Name -->
    <input type="text" name="name" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">

    <!-- Mobile -->
    <input type="text" name="mobile" id="defaultContactFormMobile" class="form-control mb-4" placeholder="Mobile">

    <!-- Address -->
    <div class="form-group">
        <textarea name="address" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Address"></textarea>
    </div>

    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <!-- Submit button -->
    <button class="btn btn-info btn-block" type="submit">Submit</button>

</form>
</body>
</html>