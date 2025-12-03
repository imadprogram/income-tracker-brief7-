<?php
include("connect.php");
?>
<?php

if (isset($_POST["income-submit"])) {
    try {
        $amount = mysqli_real_escape_string($connect, $_POST["income-amount"]);
        $description = mysqli_real_escape_string($connect, $_POST["income-description"]);
        $date = empty($_POST["income-date"]) ? date('y-m-d') : mysqli_real_escape_string($connect, $_POST["income-date"]);
        $sql_insert = "INSERT INTO income (amount , description,  date) VALUES({$amount}, '{$description}', '{$date}')";
        mysqli_query($connect, $sql_insert);
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}
if (isset($_POST["expense-submit"])) {
    try {
        $amount = mysqli_real_escape_string($connect, $_POST["expense-amount"]);
        $description = mysqli_real_escape_string($connect, $_POST["expense-description"]);
        $date = empty($_POST["expense-date"]) ? date('y-m-d') : mysqli_real_escape_string($connect, $_POST["expense-date"]);
        $sql_insert = "INSERT INTO expense (amount , description,  date) VALUES({$amount}, '{$description}', '{$date}')";
        mysqli_query($connect, $sql_insert);
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}
// income total amount
$income_sum = "SELECT sum(amount) AS total_income FROM income";

$result_income = mysqli_query($connect, $income_sum);
$income_total = 0;
if ($result_income) {
    $row = mysqli_fetch_assoc($result_income);
    $income_total = $row['total_income'];
}
// expense total amount
$expense_sum = "SELECT sum(amount) AS total_expense FROM expense";

$result_expense = mysqli_query($connect, $expense_sum);
$expense_total = 0;
if ($result_expense) {
    $row = mysqli_fetch_assoc($result_expense);
    $expense_total = $row['total_expense'];
}

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

    <header class="bg-gray-900 text-3xl font-bold pl-9 py-3 text-white">Smart Wallet</header>
    <section class="pt-3 bg-black pb-10 flex flex-col gap-8 px-12">
        <div class="flex  justify-between">
            <h1 class="text-4xl font-bold text-white">Dashboard<br><span class="text-sm font-sans text-gray-500">manage you spends in one page.</span></h1>
            <div>
                <button id="income-btn" class="cursor-pointer px-6 py-2 rounded-full text-white bg-[linear-gradient(to_top,#52c234,#061700)]">Add income</button>
                <button id="expense-btn" class="cursor-pointer px-6 py-2 rounded-full border-2 text-white border-green-700">Add expense</button>
            </div>
        </div>
        <!-- cards -->
        <div class="flex gap-30 px-24 pt-4">
            <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 grow">
                <div
                    class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p
                        class="mb-2 text-md font-medium text-gray-600 dark:text-gray-400">
                        income balance
                    </p>
                    <p
                        class="text-2xl font-bold text-gray-700 dark:text-gray-200">
                        $ <?php echo $income_total + 0 ?>
                    </p>
                </div>
            </div>
            <!-- card -->
            <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 grow">
                <div
                    class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p
                        class="mb-2 text-md font-medium text-gray-600 dark:text-gray-400">
                        expense balance
                    </p>
                    <p
                        class="text-2xl font-bold text-gray-700 dark:text-gray-200">
                        $ <?php echo $expense_total + 0 ?>
                    </p>
                </div>
            </div>
            <!-- card -->
            <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 grow">
                <div
                    class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p
                        class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        both balance
                    </p>
                    <p
                        class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        $ 0,00
                    </p>
                </div>
            </div>
        </div>
        <!-- lists section -->
        <div class="flex gap-30">
            <!-- New Table -->
            <div class="w-full overflow-y-scroll [scrollbar-width:none] rounded-lg shadow-xs h-80 bg-gray-700 text-white relative">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php
                            $incomes = "SELECT * FROM income";
                            $the_result = mysqli_query($connect, $incomes);
                            if (mysqli_num_rows($the_result) > 0) {
                                while ($row = mysqli_fetch_assoc($the_result)) {
                                    echo "
                                        <tr class='text-white'>
                                            <td class='px-4 py-3 text-sm'>
                                                $ " . $row['amount'] . "
                                            </td>
                                            <td class='px-4 py-3 text-sm'> 
                                                " . $row['date'] . "
                                            </td>
                                            </tr>
                                    ";
                                }
                            }else{
                                echo "<h2 class='absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] text-gray-300 text-lg'>there is nothing to show</h2>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs h-80 bg-gray-700 text-white relative">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php
                            $expenses = "SELECT * FROM expense";
                            $the_result = mysqli_query($connect, $expenses);
                            if (mysqli_num_rows($the_result) > 0) {
                                while ($row = mysqli_fetch_assoc($the_result)) {
                                    echo "
                                        <tr class='text-white'>
                                            <td class='px-4 py-3 text-sm'>
                                                $ " . $row['amount'] . "
                                            </td>
                                            <td class='px-4 py-3 text-sm'> 
                                                " . $row['date'] . "
                                            </td>
                                            </tr>
                                    ";
                                }
                            }else{
                                echo "<h2 class='absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] text-gray-300 text-lg'>there is nothing to show</h2>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section>
    </section>
    <!-- income form -->
    <div class="income-form-bg  hidden  bg-[rgba(0,0,0,.1)] fixed backdrop-blur-sm w-full h-[100vh] flex justify-center items-center top-0">
        <form action="index.php" method="post" class="top-1/2 left-1/2  bg-white shadow-xl rounded-lg px-6 py-4 flex flex-col gap-1">
            <label>amount:</label>
            <input type="text" name="income-amount" placeholder="100.00" class="bg-gray-200 rounded-lg w-80 py-2 pl-3"><br><br>
            <label>description:</label>
            <input type="text" name="income-description" placeholder="from ?" class="bg-gray-200 rounded-lg w-80 py-2 pl-3"><br><br>
            <label>date:</label>
            <input type="date" name="income-date" class="bg-gray-200 rounded-lg w-80 py-2 pl-3"><br><br>
            <input type="submit" name="income-submit" class="bg-green-400 rounded-lg w-80 py-2 text-white">
        </form>
    </div>
    <!-- expense form -->
    <div class="expense-form-bg  hidden  bg-[rgba(0,0,0,.1)] fixed backdrop-blur-sm w-full h-[100vh] flex justify-center items-center top-0">
        <form action="index.php" method="post" class="top-1/2 left-1/2  bg-white shadow-xl rounded-lg px-6 py-4 flex flex-col gap-1">
            <label>amount:</label>
            <input type="text" name="expense-amount" placeholder="100.00" class="bg-gray-200 rounded-lg w-80 py-2 pl-3"><br><br>
            <label>description:</label>
            <input type="text" name="expense-description" placeholder="from ?" class="bg-gray-200 rounded-lg w-80 py-2 pl-3"><br><br>
            <label>date:</label>
            <input type="date" name="expense-date" class="bg-gray-200 rounded-lg w-80 py-2 pl-3"><br><br>
            <input type="submit" name="expense-submit" class="bg-green-400 rounded-lg w-80 py-2 text-white">
        </form>
    </div>
</body>
<script src="script.js"></script>

</html>
<?php
mysqli_close($connect);
?>