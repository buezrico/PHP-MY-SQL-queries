<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>DB QUERIES</title>
</head>

<body>
    <div class="container inner">
        <div class="title text-center text-success mb-5">
            <h3 class='text-success pt-3'><strong>SQL QUERY WEB APP</strong></h3>
            <p>
                <strong>THIS IS A FRONTEND APPLICATION THAT DISPLAYS THE RESULT OF THE SQL QUERIES RUNNING
                    ON THE DATABASE</strong>
            </p>
        </div>
        <div class="queries">
            <div class="count">
                <!-- <h5 class='mb-5'>QUERY FUNCTION</h5> -->
                <div class="content">
                    <div class="query mb-3">
                        <h6>--Query:</h6>
                        
                    </div>
                    
                    <form method='POST' class='row mb-5'>
                        <div class="custom-group">
                            <p class='statement text-danger'>SELECT </p>
                            <select class="form-select text-primary" name='select'>
                                <option selected>Select Attribute</option>
                                <option>COUNT(*)</option>
                                <option>SUM</option>
                                <option>MAX</option>
                                <option>MIN</option>
                                <option>AVG</option>
                            </select>
                        </div>
                        <div class="custom-group">
                            <p class='statement text-danger'>FROM </p>
                            <select class="form-select text-primary" name='from'>
                                <option selected>Select Table</option>
                                <option>Employee</option>
                                <option>Branch</option>
                                <option>Client</option>
                                <option>Branch_Supplier</option>
                                <option>Works_With</option>
                            </select>
                        </div>
                        <div class="custom-group where">
                            <p class='statement text-danger'>WHERE </p>
                            <div class="where-input ">
                                <input type="text" class='form-control'>

                                <select name="comparison" class='form-select text-primary'>
                                    <option selected>=</option>
                                    <option>></option>
                                    <option><</option>
                                    <option>>=</option>
                                    <option><=</option>
                                    <option>!=</option>
                                
                                </select>

                                <input type="text" class='form-control'>
                            </div>
                        </div>
                        <div class="custom-group">
                            <p class='statement text-danger'>GROUP BY </p>
                            <select class="form-select text-primary">
                                <option selected>Select Attribute</option>
                                <option>sex</option>
                                <option>branch_id</option>
                            </select>
                        </div>
                        <div class="custom-group">
                            <p class='statement text-danger'>ORDER BY </p>
                            <select class="form-select text-primary">
                                <option selected>Select Attribute</option>
                                <option>emp_id</option>
                                <option>first_name</option>
                                <option>last_name</option>
                                <option>birth_date</option>
                                <option>sex</option>
                                <option>salary</option>
                                <option>salary</option>
                                <option>branch_id</option>
                            </select>
                        </div>
                        <div class="query-btn mt-3 d-flex justify-content-center">
                            <button class="btn-info btn  w-25" type='submit'>QUERY</button>
                        </div>
                    </form>

                    <div class="result">
                        <h6>--Result:</h6>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "Company";

                        $select = $_POST['select'];
                        $from = $_POST['from'];

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // $sql = "SELECT COUNT(*), AVG(salary) FROM Employee GROUP BY branch_id"; 
                        $sql = "SELECT $select FROM $from";
                        $result = $conn->query($sql);


                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo "
                                <table class='table'>
                                    <thead>
                                        <tr class='text-primary'>
                                            <th>" .$select. "</th>
                                            <th>AVG(salary)</th>
                                        </tr>
                                    </thead>";
                            echo "
                                    <tbody>
                                        <tr>
                                            <td>" .$row['COUNT(*)']. "</td>
                                            <td>" .$row['AVG(salary)']. "</td>
                                        </tr>
                                    </tbody>";
                            }
                            echo "</table>";
                        } else {
                            echo "Null";
                        }

                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>