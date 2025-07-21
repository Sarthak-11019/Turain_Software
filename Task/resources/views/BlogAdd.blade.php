<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        form {
            width: 100%;
            max-width: 800px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px solid #e0e0e0;
        }

        td {
            padding: 15px;
            text-align: left;
        }

        tr:first-child td {
            padding-top: 0;
        }

        tr:last-child {
            border-bottom: none;
        }

        tr:last-child td {
            padding-bottom: 0;
            text-align: center;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #2575fc;
            box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.2);
            outline: none;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        button[type="submit"] {
            padding: 15px 30px;
            background: linear-gradient(to right, #2575fc, #6a11cb);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        button[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #777;
        }

        @media (max-width: 768px) {
            form {
                padding: 30px 20px;
            }
            
            td {
                display: block;
                width: 100%;
                padding: 10px 0;
            }
            
            tr {
                display: block;
                margin-bottom: 15px;
            }
            
            tr:last-child {
                margin-bottom: 0;
            }
        }
    </style>
</head>
<body>
    <form action="{{route('insert')}}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf
        <div class="form-header">
            <h2>Create New Blog Post</h2>
            <p>Share your thoughts and ideas with the community</p>
        </div>
        
        <table> 
            <tr>
                <td>Blog Image:</td>
                <td>
                    <input type="file" name="image" required>
                </td>
            </tr>    
            <tr>
                <td>Blog Title:</td>
                <td>
                    <input type="text" name="title" id="title" placeholder="Enter Blog Title" required onkeyup="title_valid()">
                    <span id="title_error" class="error"></span>
                </td>
            </tr>    
            <tr>
                <td>Blog Description:</td>
                <td>
                    <textarea name="desc" id="desc" placeholder="Enter Your Blog Details" onkeyup="desc_valid()"></textarea>
                    <span id="desc_error" class="error"></span>
                </td>
            </tr>    
            <tr>
                <td colspan="2">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>

    <script>
        function title_valid() {
            const titleField = document.getElementById("title");
            const title = titleField.value;
            const errorSpan = document.getElementById("title_error");

            const titleRegex = /^[A-Za-z ]{5,30}$/;

            if (title === "") {
                errorSpan.innerText = "Title field cannot be empty.";
                titleField.style.borderColor = "#e74c3c";
                return false;
            } else if (!titleRegex.test(title)) {
                errorSpan.innerText = "Title must be 5-30 alphabetic characters.";
                titleField.style.borderColor = "#e74c3c";
                return false;
            } else {
                errorSpan.innerText = "";
                titleField.style.borderColor = "#2ecc71";
                return true;
            }
        }

        function desc_valid() {
            const descField = document.getElementById("desc");
            const desc = descField.value;
            const errorSpan = document.getElementById("desc_error");

            if (desc === "") {
                errorSpan.innerText = "Description field cannot be empty.";
                descField.style.borderColor = "#e74c3c";
                return false;
            } else if (desc.length < 10) {
                errorSpan.innerText = "Description must be at least 10 characters.";
                descField.style.borderColor = "#e74c3c";
                return false;
            } else {
                errorSpan.innerText = "";
                descField.style.borderColor = "#2ecc71";
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