
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="regis.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <title>Responsive Regisration Form </title>
</head>
<style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
    *{
    
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url("C://Users//AISHU//OneDrive//Pictures//regs.jpg");
    }
    .container{
        position: relative;
        max-width: 900px;
        width: 100%;
        border-radius: 6px;
        padding: 30px;
        margin: 0 15px;
        background-color:white;
        box-shadow: 0 5px 10px rgba(246, 238, 238, 0.1);
    }
    .container header{
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #121111;
    }
    .container header::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: #f4930b;
    }
    .container form{
        position: relative;
        margin-top: 16px;
        min-height: 490px;
        background-color: #fff;
        overflow: hidden;
    }
    .container form .form{
        position: absolute;
        background-color: #fff;
        transition: 0.3s ease;
    }
    .container form .form.second{
        opacity: 0;
        pointer-events: none;
        transform: translateX(100%);
    }
    form.secActive .form.second{
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }
    form.secActive .form.first{
        opacity: 0;
        pointer-events: none;
        transform: translateX(-100%);
    }
    .container form .title{
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }
    .container form .fields{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    form .fields .input-field{
        display: flex;
        width: calc(100% / 3 - 15px);
        flex-direction: column;
        margin: 4px 0;
    }
    .input-field label{
        font-size: 12px;
        font-weight: 500;
        color: #2e2e2e;
    }
    .input-field input, select{
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }
    .input-field input :focus,
    .input-field select:focus{
        box-shadow: 0 3px 6px rgba(0,0,0,0.13);
    }
    .input-field select,
    .input-field input[type="date"]{
        color: #707070;
    }
    .input-field input[type="date"]:valid{
        color: #333;
    }
    .container form button, .backBtn{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #f57b10;
        transition: all 0.3s linear;
        cursor: pointer;
    }
    .container form .btnText{
        font-size: 14px;
        font-weight: 400;
    }
    form button:hover{
        background-color: #f70606;
    }
    form button i,
    form .backBtn i{
        margin: 0 6px;
    }
    form .backBtn i{
        transform: rotate(180deg);
    }
    form .buttons{
        display: flex;
        align-items: center;
    }
    form .buttons button , .backBtn{
        margin-right: 14px;
    }
    @media (max-width: 750px) {
        .container form{
            overflow-y: scroll;
        }
        .container form::-webkit-scrollbar{
           display: none;
        }
        form .fields .input-field{
            width: calc(100% / 2 - 15px);
        }
    }
    @media (max-width: 550px) {
        form .fields .input-field{
            width: 100%;
        }
    }</style>
      <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = $_POST["full_name"];
        $usn = $_POST["usn"];
        $branch = $_POST["branch"];
        $email = $_POST["email"];
        $mobile_number = $_POST["mobile_number"];
        $suggestion = $_POST["suggestion"];
		$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration(full_name, usn, branch, email, mobile_number, suggestion) VALUES (?, ?, ?, ?, ?, ?)");
    //$stmt->bind_param("sssssis", $firstName, $lastName, $gender, $email, $eventID, $age, $phoneNumber);

    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
    
       /* Prepare and execute the SQL statement to insert data into the "users" table
        $sql = "INSERT INTO users (full_name, usn, branch, email, mobile_number, suggestion)
                VALUES ('$full_name', '$usn', '$branch', '$email', '$mobile_number', '$suggestion')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }*/
    }
    ?>
	
<body>

    <div class="container">
        <header>Registration</header>
        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" required>
                        </div>
                        <div class="input-field">
                            <label>USN</label>
                            <input type="text" placeholder="Enter your USN" required>
                        </div>
                        <div class="input-field">
                            <label>Branch</label>
                            <select required>
                                <option disabled selected>Select Branch</option>
                                <option>CSE</option>
                                <option>ISE</option>
                                <option>ECE</option>
                                <option>EEE</option>
                                <option>ME</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" required>
                        </div>
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" placeholder="Enter mobile number" required>
                        </div>
                        <div class="input-field">
                            <label>Suggession</label>
                            <input type="text" placeholder="Suggest if any" required>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <div class="backBtn">
                        <i class="uil uil-navigator"></i>
                        <span class="btnText">Back</span>
                    </div>
                    
                    <button class="sumbit">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
    <script src="script.js"></script>
</body>
</html>