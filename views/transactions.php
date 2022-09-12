<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <? foreach($csv_list as $line) { ?>
                <tr>
                    <td><?=$line[0]?></td>
                    <td><?=$line[1]?></td>
                    <td><?=$line[2]?></td>
                    <td><?=$line[3]?></td>
                </tr>
                <? } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><? echo getIncome($csv_list) . "$" ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><? echo getExpense($csv_list) . "$" ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><? echo getNetTotal($csv_list) . "$" ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
