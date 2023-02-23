<?php


class Queries
{
    public $conn;
    function __construct($conn)
    {

        $this->conn = $conn;
    }

    public function query1()
    {

        $sql = 'SELECT employee_details_table.employee_first_name      FROM employee_salary_table      INNER JOIN employee_details_table ON employee_salary_table.employee_id = employee_details_table.employee_id      WHERE employee_salary_table.employee_salary = "60K"';
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>first name</th><</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['employee_first_name'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "empty result";
        }

    }
    public function query2()
    {
        $sql = 'SELECT employee_last_name
        FROM employee_details_table
        WHERE graduation_percentile > 70';
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Last name</th><</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['employee_last_name'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "empty result";
        }
    }
    public function query3()
    {
        $sql = 'SELECT employee_code_name
        FROM employee_details_table
        INNER JOIN employee_code_table ON employee_details_table.employee_id = employee_code_table.employee_code
        WHERE graduation_percentile < 70';
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Employee Code Name</th><</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['employee_code_name'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "empty result";
        }
    }
    public function query4()
    {
        $sql = 'SELECT CONCAT(employee_first_name, " ", employee_last_name) AS full_name
        FROM employee_details_table
        INNER JOIN employee_code_table ON employee_details_table.employee_id = employee_code_table.employee_code
        WHERE employee_domain <> "Java"';
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Full Name</th><</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['full_name'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "empty result";
        }
    }
    public function query5()
    {
        $sql = 'SELECT employee_domain, SUM(employee_salary) AS total_salary   
        FROM employee_salary_table
        INNER JOIN employee_code_table ON employee_salary_table.employee_code = employee_code_table.employee_code
        GROUP BY employee_domain;';
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Employee Domain</th><th>Sum</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['employee_domain'] . "</td><td>" . $row['sum'] . "</tr>";
            }
            echo "</table>";
        } else {
            echo "empty result";
        }
    }
    public function query6()
    {

        $sql = 'SELECT employee_id
        FROM employee_salary_table
        WHERE employee_code IS NULL;';
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Employee Id</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['employee_id'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "empty result";
        }
    }
}
?>