<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital MannageMent system</title>
</head>
<body>
    <?php
    $serverName = "localhost";
    $userName="root";
    $password = "";
    $dbname = "Hospital";

    $conn = mysqli_connect($serverName,$userName, $password, $dbname);

    if(!$conn){
        die ("Connection Failed :" .mysqli_connect_error());
    }else{
        // $sql = "INSERT INTO Doctor(DID, Dname, Specialist) VALUES
        //                           (101, 'Rajib Mehta','Surgery'),
        //                           (102, 'Ankush Dutaa', 'Medicine'),
        //                           (103, 'Priyanka Gupta', 'Medicine'),
        //                           (104, 'Shrikanto Das','Child'),
        //                           (105, 'Shivanshi Sen' , 'Cardiologist'),
        //                           (106, 'Dipankar Mishra' , 'Oncologist')
        //                           ";
        // $sql = "INSERT INTO Patient(PID, Pname, sex, age, phone) VALUES 
        //              (001, 'Ashis Das' , 'Male', 32, 98927443),
        //              (002,'Debraj Maiti', 'Male', 10, 8768765),
        //              (003, 'Piyali Saha', 'Female', 15, 9798526),
        //              (004, 'Akash Hazra', 'Male', 49, 7868764),
        //              (005, 'Malia Gon', 'Female', 56, 8617865),
        //              (006, 'Riya Dhara', 'Female', 25, 896984),
        //              (007, 'Aritra Das', 'Male', 36, 9879789),
        //              (008, 'Saikat Sadhuka' , 'Male', 34, 868544)
        //              ";
        // $sql = "INSERT INTO Treatment(DID, PID, Tdate, Diagnosis) VALUES
        //                         (101,004,'2023-07-12', 'Cancer'),
        //                         (101, 005, '2023-07-15', 'Kidney Damage'),
        //                         (104,002, '2023-08-10', 'Cough'),
        //                         (104,003, '2023-08-10', 'Fever'),
        //                         (102, 001, '2023-01-10', 'Asthama'),
        //                         (102, 006,'2023-01-10', 'Malaria'),
        //                         (103, 006, '2023-01-18', 'Fever'),
        //                         (105,007, '2023-04-13', 'Asthama'),
        //                         (106,008,'2023-02-17', 'Brain Cancer')
        //                         ";
        // $sql = "WITH new_table(Dname, DID, PID, Pname, Age) AS 
        // (SELECT Dname, DID, PID, Pname, Age FROM Doctor 
        // NATURAL JOIN 
        // patient 
        // NATURAL JOIN 
        // treatment 
        // WHERE doctor.Dname = 'Rajib Mehta' and doctor.DID = treatment.DID),
        //  Oldest(maximum_age) AS 
        //  (SELECT max(Age) FROM new_table) 
        //  SELECT Pname from new_table 
        //  NATURAL JOIN 
        //  Oldest 
        //  WHERE new_table.Age = Oldest.maximum_age);
        // ";
        // $sql="SELECT Pname FROM patient 
        //         WHERE Age =(SELECT MAX(Age) FROM patient 
        //                     WHERE PID IN(SELECT PID from treatment 
        //                                 WHERE DID=(SELECT DID FROM doctor 
        //                                             WHERE Dname='Rajib Mehta')))";
             
        // $sql="WITH new_table AS (
        //     SELECT Dname, DID, PID, Pname, Age 
        //     FROM Doctor 
        //     NATURAL JOIN patient 
        //     NATURAL JOIN treatment 
        //     WHERE Doctor.Dname = 'Rajib Mehta' AND Doctor.DID = treatment.DID
        // ),
        // Oldest AS (
        //     SELECT MAX(Age) AS maximum_age FROM new_table
        // ) 
        // SELECT Pname 
        // FROM new_table 
        // NATURAL JOIN Oldest 
        // WHERE new_table.Age = Oldest.maximum_age;
        // ";


            // $ritwika_sql="WITH doc_treate(Dname, Specailist, PID, Tdate) AS (SELECT Dname, Specialist, PID, Tdate FROM doctor NATURAL JOIN treatment WHERE doctor.Specialist = 'Medicine' and date(treatment.Tdate) = '2023-01-10'), patient_number(Dname, patient_count) AS (SELECT Dname,count(distinct PID) as patient_no FROM doc_treate GROUP BY Dname) SELECT distinct Dname FROM doc_treate NATURAL JOIN patient_number WHERE doc_treate.Dname = patient_number.Dname and patient_number.patient_count=2;
            // ";

        $amar_sql="SELECT Dname 
        FROM Doctor 
        WHERE Specialist = 'Medicine' 
        AND ( 
            SELECT COUNT(PID) 
            FROM Treatment 
            WHERE Treatment.DID = Doctor.DID 
            AND Tdate = '2023-01-10' ) >=2";


        $res = mysqli_query($conn, $amar_sql);

        if($res){
            echo "<h3 style='color:green;'>query ran successfully</h3>";
            if(mysqli_num_rows($res)>0){
                while($row= mysqli_fetch_assoc($res))
                echo "name=".$row["Dname"]."<br>";
            }else{
                echo"no rows found";
            }
        }else{
            echo "<h2 style='color:red;'>query didn't ran</h2>";
        }
    }
    ?>
</body>
</html>