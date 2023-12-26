<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .formGroup {
            margin-bottom: 15px;
        }

        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }

        label[for="pdfFile"] {
            display: inline-block;
            margin-bottom: 8px;
        }

        .file-name {
            margin-top: 10px;
            color: #333;
        }

        form::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
<body>
    <form action="demo.php" method="post" enctype="multipart/form-data">
    <label for="select1">Select State</label>
    <select name="State" id="select1">
        <option value="" disabled selected>Select</option>
        <option value="maharashtra">Maharashtra</option>
    </select>

    <label for="District">Select District</label>
    <select name="District" id="District">
        <option value="" disabled selected>Select</option>
        <option value="Nagpur">Pune</option>
    </select>

    <label for="select2">Select Language</label>
    <select name="Language" id="select2">
        <option value="" disabled selected>Select</option>
        <option value="English">English</option>
        <option value="Regional">Regional</option>
    </select>

    <div class="formGroup">
        <label for="pdfFile">Select Pdf File</label>
        <input type="file" name="pdfFile" class="form-control-action" id="pdfFile">
    </div>
    <button type="submit" name="submit">Submit</button>
</form> 
</body>
</html>

