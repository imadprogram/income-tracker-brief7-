<?php
include("connect.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>tracker</title>
</head>
<style type="text/tailwindcss">
    @theme {
        --color-clifford: #da373d;
      }

      @keyframes form-animation {
        from{
            opacity: 0;
            transform: translateY(-30px);
        }to{
            transform: translateY(0);
            opacity: 1;
        }
      }
    </style>

<body>

    <div class="form-bg    bg-[rgba(0,0,0,.1)] fixed back-sm w-full h-[100vh] flex justify-center items-center top-0">
        <form action="index.php" method="post" class="top-1/2 left-1/2  bg-white shadow-xl rounded-lg px-6 py-4 flex flex-col gap-1">
            <label>amount:</label>
            <input type="text" name="amount" placeholder="100.00" class="bg-gray-200 rounded-lg w-80 py-2 pl-3"><br><br>
            <label>description:</label>
            <input type="text" name="description" placeholder="from ?" class="bg-gray-200 rounded-lg w-80 py-2 pl-3"><br><br>
            <label>date:</label>
            <input type="date" name="date" class="bg-gray-200 rounded-lg w-80 py-2 pl-3"><br><br>
            <input type="submit" name="submit" class="bg-green-400 rounded-lg w-80 py-2 text-white">
        </form>
    </div>
</body>
<script src="script.js"></script>

</html>
<?php

if (isset($_POST["submit"])) {
    try {
        $amount = $_POST["amount"];
        $description = $_POST["description"];
        $date = $_POST["date"];
        $sql_insert = "INSERT INTO income (amount , description,  date) VALUES({$amount}, '{$description}', {$date})";
        mysqli_query($connect, $sql_insert);
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
} else {
    echo "";
}
$sum = "SELECT sum(amount) AS total_income FROM income";
$result_income = mysqli_query($connect,$sum);

if($result_income){
    $row = mysqli_fetch_assoc($result_income);
    $total = $row['total_income'];
    // var_dump($total);
    echo $total;
}
while($row = mysqli_fetch_assoc($result_income)){
    echo "amount: ". $row['amount'];
}

mysqli_close($connect);
?>