<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Form</title>
</head>
<body>
    <form action="{{route('insert')}}" method="post" enctype="multipart/form-data" align="center" onsubmit="return validateForm()">
        @csrf
        <table border="1px" align="center"> 
            <tr>
                <td>Blog_Image Upload:</td>
                <td><input type="file" name="image" required></td>
            </tr>    
            <tr>
                <td>Blog_Title:</td>
                <td>
                    <input type="text" name="title" id="title" placeholder="Enter Blog Title" required onkeyup="title_valid()">
                    <br><span id="title_error" style="color:red;"></span>
                </td>
            </tr>    
            <tr>
                <td>Blog_Description:</td>
                <td>
                    <textarea name="desc" id="desc" placeholder="Enter Your Blog Details" onkeyup="desc_valid()"></textarea>
                    <br><span id="desc_error" style="color:red;"></span>
                </td>
            </tr>    
            <tr>
                <td colspan="2"><button type="submit">Submit</button></td>
            </tr>
        </table>
    </form>

    <!-- Use forward slashes here -->
    <script>
        function title_valid() {
    const titleField = document.getElementById("title");
    const title = titleField.value;
    const errorSpan = document.getElementById("title_error");

    const titleRegex = /^[A-Za-z ]{5,30}$/;

    if (title === "") {
        errorSpan.innerText = "Title field cannot be empty.";
        titleField.style.backgroundColor = "red";
        return false;
    } else if (!titleRegex.test(title)) {
        errorSpan.innerText = "Title must be 5-30 alphabetic characters.";
        titleField.style.backgroundColor = "red";
        return false;
    } else {
        errorSpan.innerText = "";
        titleField.style.backgroundColor = "white";
        return true;
    }
}

function desc_valid() {
    const descField = document.getElementById("desc");
    const desc = descField.value;
    const errorSpan = document.getElementById("desc_error");

    if (desc === "") {
        errorSpan.innerText = "Description field cannot be empty.";
        descField.style.backgroundColor = "red";
        return false;
    } else if (desc.length < 10) {
        errorSpan.innerText = "Description must be at least 10 characters.";
        descField.style.backgroundColor = "red";
        return false;
    } else {
        errorSpan.innerText = "";
        descField.style.backgroundColor = "white";
        return true;
    }
}


function validateForm() {
    const isTitleValid = title_valid();
    const isDescValid = desc_valid();
    return isTitleValid && isDescValid;
}

    </script>
</body>
</html>
